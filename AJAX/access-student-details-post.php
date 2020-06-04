<?php
    include "../DataBase/database-connect.php";
    $id = $_REQUEST['id'];

    if ($id !== "") {
        $query = "SELECT `ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `YEAR_LEVEL`, `HPSS_NUM`, `COACH` FROM students WHERE `ID` = " . $id;
        $result = mysqli_query($dbconnect, $query);



        $cDetails = mysqli_fetch_array($result);

        //delimiter separated values
        echo $cDetails['ID']."<BREAK>".
        $cDetails['EMAIL']."<BREAK>".
        $cDetails['YEAR_LEVEL']."<BREAK>".
        $cDetails['HPSS_NUM']."<BREAK>".
        $cDetails['COACH']."<BREAK>".
        $cDetails['FIRST_NAME']."<BREAK>".
        $cDetails['LAST_NAME'];

        mysqli_close($dbconnect);

    }
?>