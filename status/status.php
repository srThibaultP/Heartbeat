<?php
$defaulterror   = "Une erreur est survenue.\n";
$defaultsuccess = "La demande est pris en compte !\n";
$defaultlink    = "../index.php"; //Accueilpage

function error($msg, $link) {
    session_start();
    global $defaulterror, $defaultlink;
    $_SESSION['error'] = $defaulterror . $msg;

    if(empty($link or $link == NULL)) {
        $_SESSION['link'] = $defaultlink;
    } else {
        $_SESSION['link'] = $link;
    }
    
    header("Refresh: 0; url = /heartbeat/status/error.php");
}

function success($msg, $link) {
    session_start();
    global $defaultsuccess, $defaultlink;

    if(empty($msg)) {
        $_SESSION['success'] = $defaultsuccess;
    } else {
        $_SESSION['success'] = $msg;
    }

    if(empty($link or $link == NULL)) {
        $_SESSION['link'] = $defaultlink;
    } else {
        $_SESSION['link'] = $link;
    }
    
    header("Refresh: 0; url = /heartbeat/status/success.php");
}
?>
