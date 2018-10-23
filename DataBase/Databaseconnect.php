<?php
//connect to database
$error = "Problem connecting";

$USER = 'select_insert';
$PSWD = 'hpss2014edge2018';
$HOST = 'localhost';
$NAME = 'hpss_classes';

$dbconnect = mysqli_connect("$HOST", "$USER", "$PSWD", "$NAME");

if (!$dbconnect) {
    die('fail');
}



?>
