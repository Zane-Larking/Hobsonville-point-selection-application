<?php
//connect to database
$error = "Problem connecting";

$USER = 'selections_selec'; #username variable
$PSWD = 'hpss2014edge2018'; #password variable
$HOST = 'localhost'; #hostname 
$NAME = 'hpss_classes'; #table in database name

$dbconnect = mysqli_connect("$HOST", "$USER", "$PSWD", "$NAME"); #function storing all the credentials required to connect to the server, which connects to the database

if (!$dbconnect) { #if connection doesnt work
    die('fail');
}



?>
