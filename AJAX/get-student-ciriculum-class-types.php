<?php
    include "../DataBase/database-connect.php";
    $year_level = $_REQUEST['year_level'];
    $query = "SELECT class_type, count FROM class_template WHERE year_level = $year_level AND curriculum = 1 GROUP BY class_type";
    $result = mysqli_query($dbconnect, $query);
    $cDetails = mysqli_fetch_array($result);

    $count =  [$cDetails["type"], (int) $cDetails["count"]];

    echo json_encode($count);

    mysqli_close($dbconnect);

?>