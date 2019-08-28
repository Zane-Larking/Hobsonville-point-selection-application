<?php
    include "../DataBase/database-connect.php";
    $id = str_replace ("'" , "''" , $_REQUEST['id']);
    $code = str_replace ("'" , "''" , $_REQUEST['fname']);
    $name = str_replace ("'" , "''" , $_REQUEST['lname']);
    $type = str_replace ("'" , "''" , $_REQUEST['type']);
    $teacher1 = str_replace ("'" , "''" , $_REQUEST['teacher1']);
    $teacher2 = str_replace ("'" , "''" , $_REQUEST['teacher2']);
    $subject1 = str_replace ("'" , "''" , $_REQUEST['subject1']);
    $subject2 = str_replace ("'" , "''" , $_REQUEST['subject2']);
    $description = str_replace ("'" , "''" , $_REQUEST['description']);

    $query = "UPDATE `classes` SET `FIRST_NAME`= '$fname',`LAST_NAME`= '$lname',`KAMAR_CODE`='$type',`EMAIL`='$subject1',`HAS_HUB`='$subject2',`PRIVILEGES`='$teacher1' WHERE `id` = $id";
    if (mysqli_query($dbconnect, $query)) {
        echo "true";
    } else {
        echo "false";
    }
    
    mysqli_close($dbconnect);
?>