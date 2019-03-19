<?php
    session_start();
    require_once "GoogleAPI/vendor/autoload.php";
    $gClient = new Google_Client();
    $gClient->setClientId("827179744666-3ic4ico6v9hamitnsr1qkh5gq1fm39bo.apps.googleusercontent.com");
    $gClient->setClientSecret("mBZ0IY0YfcDH2rBpmUQ8wXmF");
    $gClient->setApplicationName("HPSS Class Selection Application");
    $gClient->setRedirectUri("http://localhost/GitHub/Hobsonville-point-selection-application/g-callback.php");
    $gClient->addScope("https://www.googleapis.com/auth/userinfo.email");
?>
