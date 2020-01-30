<?php
    include "../DataBase/database-connect.php";
    $id = str_replace ("'" , "''" , $_REQUEST['id']);
    $first_name = str_replace ("'" , "''" , $_REQUEST['first_name']);
    $last_name = str_replace ("'" , "''" , $_REQUEST['last_name']);
    $email = str_replace ("'" , "''" , $_REQUEST['email']);
    $kamar_code = str_replace ("'" , "''" , $_REQUEST['kamar_code']);
    $privileges = str_replace ("'" , "''" , $_REQUEST['privileges']);
    $has_hub = str_replace ("'" , "''" , $_REQUEST['has_hub']);

    $query = "UPDATE `teachers` SET `FIRST_NAME`= '$first_name',`LAST_NAME`= '$last_name',`EMAIL`='$email',`PRIVILEGES`=$privileges,`KAMAR_CODE`='$kamar_code',`HAS_HUB`='$has_hub' WHERE `id` = $id";
    if (mysqli_query($dbconnect, $query)) {
        echo "true $id";
    } else {
        echo "false";
    }

    mysqli_close($dbconnect);
?>