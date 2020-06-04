<?php
include "../DataBase/database-connect.php";
$studentCountQuery = "SELECT COUNT(id) as count FROM students";
$studentCount = mysqli_query($dbconnect,$studentCountQuery)->fetch_assoc()['count'];

$studentCompleteCountQuery = "SELECT CONCAT(students.first_name, ' ', students.last_name) AS name, COUNT(selections.id) AS selections FROM students LEFT JOIN selections ON students.id = selections.student_id  WHERE year_level = 9 AND 'selections' = 0 OR year_level = 10 AND 'selections' = 0 OR year_level = 11 AND 'selections' = 0 OR year_level = 12 AND 'selections' = 0 OR year_level = 13 AND 'selections' = 0 GROUP BY selections.student_id";
$studentCompleteCountResult = mysqli_query($dbconnect,$studentCompleteCountQuery);

$studentCompleteCount = mysqli_num_rows($studentCompleteCountResult);


echo json_encode(["denom" => $studentCount, "num" => $studentCompleteCount]);


?>