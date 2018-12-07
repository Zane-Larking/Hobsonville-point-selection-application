<?php
    require_once "config.php";
    
    if (isset($_SESSION['access_token'])) {
        include ('DataBase/Databaseconnect.php');
        
        $query = "SELECT CONCAT('FIRST_NAME', 'LAST_NAME') AS name FROM students WHERE EMAIL = '" . $_SESSION['email'] . "'";
        $result = mysqli_query($dbconnect, $query);
        var_dump($result);
        $row = mysqli_fetch_array($result);

        echo "<br>Is Student:<br>";
        var_dump($row['name']);
        if (!is_NULL($row['name'])) {
            $_SESSION['name'] = $row['name'];
            header('Location: StudentsHomepage.php');
            exit();
        }

        $query = "SELECT CONCAT('FIRST_NAME', 'LAST_NAME') AS name FROM teachers WHERE EMAIL = '" . $_SESSION['email'] . "'";
        $result = mysqli_query($dbconnect, $query);
        $row = mysqli_fetch_array($result);

        echo "<br>Is Teacher:<br>";
        var_dump($row['name']);
        if (!is_NULL($row['name'])) {
            $_SESSION['name'] = $row['name'];
            header('Location: TeachersHomepage.php');
            exit();
        }

        header('Location: ErrorHomepage.php');


    } else if (!isset($_SESSION['access_token'])) {
        header('Location: login.php');
    }
?>