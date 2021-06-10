<?php
//https://packagist.org/packages/peppeocchi/php-cron-scheduler
//Il faut lancer ce script cron toutes les minutes
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../scripts/PushNotificationHelper.php';
require __DIR__ . '/../db/login.php';


use GO\Scheduler;

// Create a new scheduler
$scheduler = new Scheduler();
date_default_timezone_set('Europe/Paris');

// ... configure the scheduled jobs (see below) ...
if (!$conn->connect_errno) {
    $list = $conn->query("SELECT endpointARN, cron, message FROM chb_apptel WHERE endpointARN IS NOT NULL");
    $list->data_seek(0);
    while ($entry = $list->fetch_assoc()) {
        $scheduler->call(
            function ($arn, $msg) {
                $dateenvoi = date("H:i:s");
                PushNotificationHelper::setup();
                if (empty($msg)) PushNotificationHelper::sendMessage("❤️ Heartbeat @ $dateenvoi", $arn);
                else PushNotificationHelper::sendMessage($msg, $arn);
            },
            [
                $entry['endpointARN'],
                $entry['message']
            ],
            'cronNotifier'
        )->at($entry['cron']);
    }
} else {
    echo mysqli_error($conn);
}

// Let the scheduler execute jobs which are due.
$scheduler->run(); //replace "work" with "run". From doc : "You can simulate a cronjob by starting a worker."
