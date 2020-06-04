<?php
include("../DataBase/database-connect.php");
$id = $_POST['id'];
$query = "DELETE FROM `students` WHERE `ID` = ".$id;

if (mysqli_query($dbconnect, $query)){
} else {
};

?>