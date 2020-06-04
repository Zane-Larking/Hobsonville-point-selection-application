<?php
    include "../DataBase/database-connect.php";
    $id = $_REQUEST['id'];

    if ($id !== "") {
        $query = "SELECT `FIRST_NAME`, `LAST_NAME`, `KAMAR_CODE`, `EMAIL`, `HAS_HUB`, `PRIVILEGES` FROM teachers WHERE `ID` = " . $id;
        $result = mysqli_query($dbconnect, $query);
        $cDetails = mysqli_fetch_array($result);

        //delimiter separated values
        echo $cDetails['FIRST_NAME']."<BREAK>".
        $cDetails['LAST_NAME']."<BREAK>".
        $cDetails['KAMAR_CODE']."<BREAK>".
        $cDetails['EMAIL']."<BREAK>".
        $cDetails['HAS_HUB']."<BREAK>".
        $cDetails['PRIVILEGES']."<BREAK>";

        mysqli_close($dbconnect);

    }
?>