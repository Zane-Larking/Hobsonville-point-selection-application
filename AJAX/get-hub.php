<?php
include("../DataBase/database-connect.php");
$coachId = $_POST['id'];
$query = "SELECT * FROM `students` WHERE 'coach_id' = ".$coachId;
$result = mysqli_query($dbconnect, $query);

if ($result == TRUE){
    while ($row = mysqli_fetch_array($result)){
        //delimiter separated values
        echo $row['first_name']."<BREAK>";
    }
} else {

};

?>