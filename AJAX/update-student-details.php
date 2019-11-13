<?php
    include "../DataBase/database-connect.php";
    $id = str_replace ("'" , "''" , $_REQUEST['id']);
    $first_name = str_replace ("'" , "''" , $_REQUEST['first_name']);
    $last_name = str_replace ("'" , "''" , $_REQUEST['last_name']);
    $email = str_replace ("'" , "''" , $_REQUEST['email']);
    $year_level = str_replace ("'" , "''" , $_REQUEST['year_level']);
    $hpss_num = str_replace ("'" , "''" , $_REQUEST['hpss_num']);
    $hub_coach = str_replace ("'" , "''" , $_REQUEST['hub_coach']);

    $query = "UPDATE `students` SET `FIRST_NAME`= '$first_name',`LAST_NAME`= '$last_name',`EMAIL`='$email',`YEAR_LEVEL`=$year_level,`HPSS_NUM`='hpss_num',`COACH`='$hub_coach' WHERE `id` = $id";
    if (mysqli_query($dbconnect, $query)) {
        echo "true $id";
    } else {
        echo "false UPDATE `students` SET `FIRST_NAME`= '$first_name',`LAST_NAME`= '$last_name',`EMAIL`='$email',`YEAR_LEVEL`=$year_level,`HPSS_NUM`='hpss_num',`COACH`='$hub_coach' WHERE `id` = $id";
    }
    
    mysqli_close($dbconnect);
?>