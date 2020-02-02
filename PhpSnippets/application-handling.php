<?php
function getApplication($id, $dbconnect) {
    $query = "SELECT application, date FROM applications  WHERE student_id = ".$id;
                if ($application = mysqli_fetch_array(mysqli_query($dbconnect, $query))) {
                    echo nl2br($application['application'])." ".$application['date'];
                }
}
?>