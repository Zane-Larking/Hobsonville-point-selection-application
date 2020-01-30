<?php
    include "../DataBase/database-connect.php";
    $q = $_REQUEST['q'];

    if ($q !== "") {
        $query = "SELECT coach_id, CONCAT(`first_name`, `last_name`) AS `name`, `email`, `year_level`, `hpss_num`, `coach_id` FROM students";
        $result = mysqli_query($dbconnect, $query);
        $cDetails = mysqli_fetch_array($result);

        //delimiter separated values
        echo $cDetails['id']."<BREAK>".
        $cDetails['email']."<BREAK>".
        $cDetails['year_level']."<BREAK>".
        $cDetails['hpss_num']."<BREAK>".
        $cDetails['coach_id']."<BREAK>".
        $cDetails['name']."<BREAK>";

        mysqli_close($dbconnect);

    }
?>