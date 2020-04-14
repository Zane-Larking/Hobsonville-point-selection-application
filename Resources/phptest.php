<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO Classes (CODE,NAME,QUAL,TYPE,SUBJECT1,SUBJECT2,TEACHER1,TEACHER2,DESCRIPTION)
VALUES ('WALLST', 'Wall Street Bull', '1','MODULE1','MATH','ENTERPRISE','JESSICA','YU TING','CLASS DESCRIPTION')";

if (mysqli_query($conn, $sql)) {
    echo "Success";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
