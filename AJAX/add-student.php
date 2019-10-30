<?php

include("../DataBase/database-connect.php");
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$yearlevel = $_POST['year'];
$email = $_POST['gmail'];
$kamarcode = $_POST['kamar_code'];
$hubcoach = $_POST['has_hub'] || FALSE;


$query = "INSERT INTO `students` (`FIRST_NAME`, `LAST_NAME`, `EMAIL`, `YEAR_LEVEL`, `KAMAR_CODE`, `HAS_HUB`) VALUES ('".$firstname."','".$lastname."','".$yearlevel."','".$email."','".$kamarcode."','".$hubcoach."')";
$result = mysqli_query($dbconnect, $query);

header('Location: ../admin-tool.php');

?>