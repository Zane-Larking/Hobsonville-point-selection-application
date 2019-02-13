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
    $query = "UPDATE students SET `SELECTIONS_".$_GET['classType']."` = '" . $_GET["selections"] . "' WHERE ID = " . $_SESSION['id'];
    if (mysqli_query($dbconnect, $query) === TRUE) {
        header("locaton: ../SubmissionSuccessful.php");
        
        
    } else {
        echo "Error updating record: " . $dbconnect->error."<br>Please contact your network administraitor";
    }
 
    

?>