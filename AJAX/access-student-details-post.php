<?php
    include "../DataBase/database-connect.php";
    $id = $_REQUEST['id'];

    if ($id !== "") {
        $query = "SELECT `coach_id`, `first_name`, `last_name`, `email`, `year_level`, `hpss_num` FROM students WHERE `ID` = " . $id;
        $result = mysqli_query($dbconnect, $query);



        $cDetails = mysqli_fetch_array($result);

        //delimiter separated values
        echo $cDetails['id']."<BREAK>".
        $cDetails['email']."<BREAK>".
        $cDetails['year_level']."<BREAK>".
        $cDetails['hpss_num']."<BREAK>".
        $cDetails['coach_id']."<BREAK>".
        $cDetails['first_name']."<BREAK>".
        $cDetails['last_name'];

        mysqli_close($dbconnect);

    }
?>