<?php

include("../DataBase/database-connect.php");
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['gmail'];
$privileges = $_POST['privileges'];
$kamarcode = $_POST['kamar_code'];
$hashub = $_POST['has_hub'] || FALSE;


$query = "INSERT INTO `teachers` (`FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PRIVILEGES`, `KAMAR_CODE`, `HAS_HUB`) VALUES ('".$firstname."','".$lastname."','".$email."','".$privileges."','".$kamarcode."','".$hashub."')";
$result = mysqli_query($dbconnect, $query);

header('Location: ../admin-tool.php');

?>