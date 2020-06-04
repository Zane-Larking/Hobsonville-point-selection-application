<?php

include("../DataBase/database-connect.php");
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['gmail'];
$privileges = (function() {
    switch ($_POST['privileges']) {
        case "Teacher": return 0;
        case "Moderator": return 1;
        case "Administraitor": return 2;
    }
})();
$kamarcode = $_POST['kamar_code'];
$hashub = $_POST['has_hub'] || FALSE;


$query = "INSERT INTO `staff` (`first_name`, `last_name`, `kamar_code`, `email`, `has_hub`, `privileges`) VALUES ('$firstname','$lastname','$kamarcode','$email','$hashub','$privileges')";
$result = mysqli_query($dbconnect, $query);

header('Location: ../admin-tool.php');

?>