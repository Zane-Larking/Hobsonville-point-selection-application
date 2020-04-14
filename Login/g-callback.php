<?php
    require_once "config.php";

    if (isset($_SESSION['access_token']))
        $gClient->setAccessToken($_SESSION['access_token']);
    else if (isset($_GET['code'])) {
        $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['access_token'] = $token;
    } else {
        header('Location: login.php');
        exit();
    }

      $oAuth = new Google_Service_Oauth2($gClient);
      $userData = $oAuth->userinfo_v2_me->get();

      var_dump($userData);

      $_SESSION['email'] = $userData['email'];
      $_SESSION['picture'] = $userData['picture'];


        header('Location: ../index.php');
        exit();

 ?>
