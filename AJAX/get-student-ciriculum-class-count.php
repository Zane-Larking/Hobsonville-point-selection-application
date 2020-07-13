<?php
    include "../DataBase/database-connect.php";
    $year_level = $_REQUEST['year_level'];
    $query = "SELECT SUM(count * choices) classes FROM class_template WHERE year_level = $year_level AND curriculum = 1";
    $result = mysqli_query($dbconnect, $query);
    $cDetails = mysqli_fetch_array($result);

    $count =  (int) $cDetails["classes"];

    echo json_encode($count);

    mysqli_close($dbconnect);

?>