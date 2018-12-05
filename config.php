<?php
    session_start();
    require_once "GoogleAPI/vendor/autoload.php";
    $gClient = new Google_Client();
    $gClient->setClientId("391375283842-4t257b0v5bjhkeb8s3cuhnfglqqsth18.apps.googleusercontent.com");
    $gClient->setClientSecret("UOB-Q_dYB1YkOvi7lHeGTNP_");
    $gClient->setApplicationName("hpss classes login");
    $gClient->setRedirectUri("http://localhost/GitHub/Hobsonville-point-selection-application/g-callback.php");
    $gClient->addScope("https://www.googleapis.com/auth/userinfo.email");
?>
