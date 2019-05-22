<?php
    require_once "config.php";
    unset($_SESSION[access_token]);
    $gClient->revokeToken();
    session_destroy();
    header('Location: login.php');
    exit();

    //Use to test if out of internet coverage
    // unset($_SESSION[access_token]);
    // session_destroy();
    // header('Location: login.php');
    // exit();
    ?>
