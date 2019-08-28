<?php
    include "../DataBase/database-connect.php";
    $q = $_REQUEST['q'];

    if ($q !== "") {
        $query = "SELECT `ID`, CONCAT(`FIRST_NAME`, `LAST_NAME`) AS `NAME` FROM teachers";
        $result = mysqli_query($dbconnect, $query);
        $cDetails = mysqli_fetch_array($result);

        //delimiter separated values
        echo $cDetails['ID']."<BREAK>".
        $cDetails['NAME']."<BREAK>".
        $cDetails['KAMAR_CODE']."<BREAK>".
        $cDetails['EMAIL']."<BREAK>".
        $cDetails['HAS_HUB']."<BREAK>".
        $cDetails['PRIVILEGES']."<BREAK>";

        mysqli_close($dbconnect);

    }
?>