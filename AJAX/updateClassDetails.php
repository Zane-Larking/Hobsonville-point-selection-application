<?php
    include "../DataBase/Databaseconnect.php";
    $id = str_replace ("'" , "''" , $_REQUEST['id']);
    $code = str_replace ("'" , "''" , $_REQUEST['code']);
    $name = str_replace ("'" , "''" , $_REQUEST['name']);
    $type = str_replace ("'" , "''" , $_REQUEST['type']);
    $teacher1 = str_replace ("'" , "''" , $_REQUEST['teacher1']);
    $teacher2 = str_replace ("'" , "''" , $_REQUEST['teacher2']);
    $subject1 = str_replace ("'" , "''" , $_REQUEST['subject1']);
    $subject2 = str_replace ("'" , "''" , $_REQUEST['subject2']);
    $description = str_replace ("'" , "''" , $_REQUEST['description']);

    $query = "UPDATE `classes` SET `CODE`= '$code',`NAME`= '$name',`TYPE`='$type',`SUBJECT1`='$subject1',`SUBJECT2`='$subject2',`TEACHER1`='$teacher1',`TEACHER2`='$teacher2',`DESCRIPTION`='$description' WHERE `id` = $id";
    if (mysqli_query($dbconnect, $query)) {
        echo "true";
    } else {
        echo "false";
    }
    
    mysqli_close($dbconnect);
?>