<?php
include("../DataBase/database-connect.php");
$id = $_POST['id'];
$query = "DELETE FROM `teachers` WHERE `ID` = ".$id;

if (mysqli_query($dbconnect, $query)){
} else {
};


// $result = mysqli_query($dbconnect, $query);

// if ($result == TRUE){
// 	header('Location: ../admin-tool.php');
// } else {

// };

// 

?>