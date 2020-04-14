<?php
    session_start();
    //Use to test if out of internet coverage.
    
    // $_SESSION['access_token'] = 0;
    // $_SESSION['email'] = "No.Internet@gmail.com";
    
    if (isset($_SESSION['access_token'])) {
        include ('DataBase/database-connect.php');
        
        
        //Checks if the user is a part of the the tearchers table
        $query = "SELECT id, CONCAT(first_name, ' ', last_name) AS name, privileges, has_hub  FROM staff WHERE email = '" . $_SESSION['email'] . "'";
        $result = mysqli_query($dbconnect, $query);
        $row = mysqli_fetch_array($result);

        // echo "<br>Is Teacher:<br>";
        // var_dump($row['name']);
        if (!is_NULL($row['name'])) {
            
            //Stores info about the teacher
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['hashub'] = $row['has_hub'];
            $_SESSION['privilege'] = $row['privileges'];

            //Stores info about who their Hublings are
            $query = "SELECT id, CONCAT(first_name, last_name) AS name FROM students WHERE coach_id = '" . $row['id'] . "'";
            $result = mysqli_query($dbconnect, $query);
            $_SESSION['hublings'] = [];
            while($row = $result->fetch_assoc()) {
                $_SESSION['hublings'][str_replace(" ", "-", $row['name'])] = $row['id'];
            }


            header('Location: staff-homepage.php');
            exit();
        }

        
        //Checks if the user is a part of the the students table 
        $query = "SELECT id, CONCAT(first_name, ' ', last_name) AS name, year_level FROM students WHERE email = '" . $_SESSION['email'] . "'";
        $result = mysqli_query($dbconnect, $query);
        $row = mysqli_fetch_array($result);

        // echo "<br>Is Student:<br>";
        // var_dump($row['name']);
        if (!is_NULL($row['name'])) {

            //Stores info about the student
            $_SESSION['year_level'] = $row['year_level'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];

            header('Location: student-homepage.php');
            exit();
        }

        header('Location: error-homepage.php');


    } else if (!isset($_SESSION['access_token'])) {
        header('Location: Login/login.php');
    }
?>