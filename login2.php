<?php
    require_once "config.php";

      $_SESSION['email'] = "rhombi.gd@gmail.com"; //$userData['email'];
      $_SESSION['picture'] = "/Users/jackfreeth/Desktop/IMG_5350.JPG"; //$userData['picture'];

      $_SESSION['access_token'] =TRUE;
        header('Location: index.php');
        exit();

 ?>
