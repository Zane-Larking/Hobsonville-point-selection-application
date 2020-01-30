<?php
    include "../DataBase/database-connect.php";
    $id = str_replace ("'" , "''" , $_REQUEST['id']);
    $first_name = str_replace ("'" , "''" , $_REQUEST['first_name']);
    $last_name = str_replace ("'" , "''" , $_REQUEST['last_name']);
    $email = str_replace ("'" , "''" , $_REQUEST['email']);
    $kamar_code = str_replace ("'" , "''" , $_REQUEST['kamar_code']);
    $privileges = str_replace ("'" , "''" , $_REQUEST['privileges']);
    $has_hub = str_replace ("'" , "''" , $_REQUEST['has_hub']);

    $query = "UPDATE `teachers` SET `first_name`= '$first_name',`last_name`= '$last_name',`email`='$email',`privileges`=$privileges,`kamar_code`='$kamar_code',`has_hub`='$has_hub' WHERE `id` = $id";
    if (mysqli_query($dbconnect, $query)) {
        echo "true $id";
    } else {
        echo "false";
    }

    mysqli_close($dbconnect);
?>