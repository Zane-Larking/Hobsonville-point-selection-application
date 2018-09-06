<?php

//ob
ob_start();

//session
session_start();

//connect to database
$error = "Problem connecting";
mysql_connect('server','username','password') or die($error);
mysql_select_db('phpacade_emailactivation') or die($error);

?>
