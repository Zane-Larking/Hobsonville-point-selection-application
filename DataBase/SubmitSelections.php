<?php
    include ('Databaseconnect.php');


    // function alert($msg) {
    //     echo "<script type='text/javascript'>alert('$msg');</script>";
    // }
    
    session_start();
    /*
    example of expected output:
    UPDATE students SET SELECTIONS_M&S = 'SCAMANDR, FILMIT, QSPA1112, DEEPBLUE, MONOPOLY, HUARERE, MUD, STALKER, SURVIVE, GREATWAR, STAYWARM, MARAE2' WHERE ID = 3
    */
    $query = "UPDATE students SET `SELECTIONS_".$_POST['classType']."` = '" . $_POST["selections"] . "' WHERE ID = " . $_SESSION['id'];
    if (mysqli_query($dbconnect, $query) === TRUE) {
        if (isset($_POST['message'])) {
            $query = "SELECT application FROM applications  WHERE uid = ". $_SESSION['id'];

            
                
            $uid = $_SESSION['id'];
            $date = $_POST['date'];
            $message = htmlspecialchars($_POST['message'], ENT_QUOTES);
            if (mysqli_fetch_array(mysqli_query($dbconnect, $query))) {
                $query = 'UPDATE applications SET uid = '.$uid.', date = "'.$date.'", application = "'.$message.'" WHERE uid = '.$_SESSION['id'];
            }
            else {
                $query = 'INSERT INTO applications (uid, date, application) values ('.$uid.', "'.$date.'", "'.$message.'")';
            }
            
            if (mysqli_query($dbconnect, $query) === FALSE) {
                die ("Submission successful. But application couldn't be submitted!");
            }
        }
        header("location: ../SubmissionSuccessful.php");
        
        
    } else {
        echo "<br>Error updating record: " . $dbconnect->error."<br>Please contact your network administraitor";
    }
 
    

?>