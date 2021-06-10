<?php
 require '../db/login.php';
 require '../vendor/autoload.php';
 require '../scripts/PushNotificationHelper.php';

 date_default_timezone_set('Europe/Paris');
 $dateenvoi = date("H:i:s");

 if (!$conn->connect_errno) {
 $list = $conn -> query("SELECT endpointARN, message FROM chb_apptel WHERE endpointARN IS NOT NULL");
 $list -> data_seek(0);
 while ($entry = $list -> fetch_assoc()) {
    if(empty($entry['message'])) $entry['message'] = "💖 Heartbeat @ $dateenvoi";
    PushNotificationHelper::setup();
    PushNotificationHelper::sendMessage($entry['message'], $entry['endpointARN']);
 }
} else {
   echo mysqli_error($conn);
}
 echo "💖 done @ $dateenvoi";
