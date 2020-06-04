<?php
    include "../DataBase/database-connect.php";
    $q = $_REQUEST['q'];

    if ($q !== "") {
        $query = "SELECT `ID`, CONCAT(`FIRST_NAME`, `LAST_NAME`) AS `NAME`, `EMAIL`, `YEAR_LEVEL`, `HPSS_NUM`, `COACH` FROM students";
        $result = mysqli_query($dbconnect, $query);
        $cDetails = mysqli_fetch_array($result);

        //delimiter separated values
        echo $cDetails['ID']."<BREAK>".
        $cDetails['EMAIL']."<BREAK>".
        $cDetails['YEAR_LEVEL']."<BREAK>".
        $cDetails['HPSS_NUM']."<BREAK>".
        $cDetails['COACH']."<BREAK>".
        $cDetails['NAME']."<BREAK>";

        mysqli_close($dbconnect);

    }
?>