<?php
    require_once "config.php";
    
    if (isset($_SESSION['access_token'])) {
        header('Location: StudentsHomepage.php');
        exit();
    } else if (!isset($_SESSION['access_token'])) {
        header('Location: login.php');
        exit();
    }
?>