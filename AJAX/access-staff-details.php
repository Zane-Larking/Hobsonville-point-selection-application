<?php
    include "../DataBase/database-connect.php";
    $id = $_REQUEST['id'];

    if ($id !== "") {
        $query = "SELECT `first_name`, `last_name`, `kamar_code`, `email`, `has_hub`, `privileges` FROM staff WHERE `id` = " . $id;
        $result = mysqli_query($dbconnect, $query);
        $cDetails = mysqli_fetch_array($result);

        //delimiter separated values
        echo $cDetails['first_name']."<BREAK>".
        $cDetails['last_name']."<BREAK>".
        $cDetails['kamar_code']."<BREAK>".
        $cDetails['email']."<BREAK>".
        $cDetails['has_hub']."<BREAK>".
        $cDetails['privileges']."<BREAK>";

        mysqli_close($dbconnect);

    }
?>