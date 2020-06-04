<?php
include("../DataBase/database-connect.php");
$id = $_POST['id'];
$query = "SELECT * FROM `students` WHERE 'COACH' = ".$id;
$result = mysqli_query($dbconnect, $query);

if ($result == TRUE){
    echo "true";
} else {

};

?>