<?php
    include "../DataBase/database-connect.php";
    $id = $_REQUEST['id'];
    $status = $_REQUEST['status'];
    $query = "UPDATE `selections` SET `approval_status`=".$status." WHERE `id` =".$id;
    $result = mysqli_query($dbconnect, $query);
    echo "id: ".$id."
    status: ".$status;
    // echo  $result ? True : False;
?>


