<?php
    require_once "config.php";
    
    //Use to test if out of internet coverage.
    /*
    $_SESSION['access_token'] = 0;
    $_SESSION['email'] = "No.Internet@gmail.com";
    */
    if (isset($_SESSION['access_token'])) {
        include ('DataBase/Databaseconnect.php');
        
        
        //Checks if the user is a part of the the tearchers table
        $query = "SELECT ID, CONCAT(FIRST_NAME, ' ', LAST_NAME) AS NAME FROM teachers WHERE EMAIL = '" . $_SESSION['email'] . "'";
        $result = mysqli_query($dbconnect, $query);
        $row = mysqli_fetch_array($result);

        // echo "<br>Is Teacher:<br>";
        // var_dump($row['NAME']);
        if (!is_NULL($row['NAME'])) {
            
            //Stores info about the teacher
            $_SESSION['id'] = $row['ID'];
            $_SESSION['name'] = $row['NAME'];

            //Stores info about who their Hublings are
            $query = "SELECT ID, CONCAT(FIRST_NAME, LAST_NAME) AS NAME FROM students WHERE COACH = '" . $_SESSION['name'] . "'";
            $result = mysqli_query($dbconnect, $query);
            $_SESSION['hublings'] = [];
            while($row = $result->fetch_assoc()) {
                $_SESSION['hublings'][str_replace(" ", "-", $row['NAME'])] = $row['ID'];
            }


            header('Location: TeachersHomepage.php');
            exit();
        }

        
        //Checks if the user is a part of the the students table 
        $query = "SELECT ID, CONCAT(FIRST_NAME, ' ', LAST_NAME) AS name, YEAR_LEVEL FROM students WHERE EMAIL = '" . $_SESSION['email'] . "'";
        $result = mysqli_query($dbconnect, $query);
        $row = mysqli_fetch_array($result);

        // echo "<br>Is Student:<br>";
        // var_dump($row['NAME']);
        if (!is_NULL($row['name'])) {

            //Stores info about the student
            $_SESSION['yearLevel'] = $row['YEAR_LEVEL'];
            $_SESSION['name'] = $row['NAME'];
            $_SESSION['id'] = $row['ID'];

            header('Location: StudentsHomepage.php');
            exit();
        }

        header('Location: ErrorHomepage.php');


    } else if (!isset($_SESSION['access_token'])) {
        header('Location: login.php');
    }
?>