<?php

include("../DataBase/database-connect.php");
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$coach_id = $_POST['coach_id'];
$email = $_POST['gmail'];
$year_level = $_POST['year_level'];
$hpss_num = $_POST['hpss_num'];


$query = "INSERT INTO `students` (`coach_id`, `first_name`, `last_name`, `email`, `year_level`, `hpss_num` VALUES ('coach_id',$firstname','$lastname','$email','$year_level','$hpss_num')";
$result = mysqli_query($dbconnect, $query);

header('Location: ../admin-tool.php');

?>