<?php
    include "../DataBase/database-connect.php";
    $q = $_REQUEST['q'];

    if ($q !== "") {
        $query = "SELECT `ID`, `CODE`, `NAME`, `TYPE`, `SUBJECT1`, `SUBJECT2`, `TEACHER1`, `TEACHER2`, `DESCRIPTION` FROM classes WHERE CODE = '".$q."';";
        $result = mysqli_query($dbconnect, $query);
        $cDetails = mysqli_fetch_array($result);

        //Trying to create a xml format (didn't work)
        /*
        echo "<?xml version='1.0' encoding='UTF-8'?>";
        echo "<classDetails>";
            echo "<ID>".$cDetails['ID']."</ID>";
            echo "<CODE>".$cDetails['CODE']."</CODE>";
            echo "<NAME>".$cDetails['NAME']."</NAME>";
            echo "<QUAL>".$cDetails['QUAL']."</QUAL>";
            echo "<TYPE>".$cDetails['TYPE']."</TYPE>";
            echo "<SUBJECT1>".$cDetails['SUBJECT1']."</SUBJECT1>";
            echo "<SUBJECT2>".$cDetails['SUBJECT2']."</SUBJECT2>";
            echo "<TEACHER1>".$cDetails['TEACHER1']."</TEACHER1>";
            echo "<TEACHER2>".$cDetails['TEACHER2']."</TEACHER2>";
            echo "<DESCRIPTION>".$cDetails['DESCRIPTION']."</DESCRIPTION>";
        echo "</classDetails>";
        */

        //delimiter separated values
        echo $cDetails['ID']."<BREAK>".
        $cDetails['CODE']."<BREAK>".
        $cDetails['NAME']."<BREAK>".
        $cDetails['TYPE']."<BREAK>".
        $cDetails['SUBJECT1']."<BREAK>".
        $cDetails['SUBJECT2']."<BREAK>".
        $cDetails['TEACHER1']."<BREAK>".
        $cDetails['TEACHER2']."<BREAK>".
        $cDetails['DESCRIPTION'];

        mysqli_close($dbconnect);

    }
?>