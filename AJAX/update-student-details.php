<?php
    include "../DataBase/database-connect.php";
    $id = str_replace ("'" , "''" , $_REQUEST['id']);
    $first_name = str_replace ("'" , "''" , $_REQUEST['first_name']);
    $last_name = str_replace ("'" , "''" , $_REQUEST['last_name']);
    $email = str_replace ("'" , "''" , $_REQUEST['email']);
    $hpss_num = str_replace ("'" , "''" , $_REQUEST['hpss_num']);
    $coach_id = str_replace ("'" , "''" , $_REQUEST['coach_id']);
    $year_level = str_replace ("'" , "''" , $_REQUEST['year_level']);

    $query = "UPDATE `students` SET `first_name`= '$first_name',`last_name`= '$last_name',`email`='$email',`year_level`=$year_level,`hpss_num`='$hpss_num',`coach_id`='$coach_id' WHERE `id` = $id";
    if (mysqli_query($dbconnect, $query)) {
        echo "true $id";
    } else {
        echo "false UPDATE `students` SET `first_name`= '$first_name',`last_name`= '$last_name',`email`='$email',`year_level`=$year_level,`hpss_num`='$hpss_num',`coach_id`='$coach_id' WHERE `id` = $id";
    }
    
    mysqli_close($dbconnect);
?>