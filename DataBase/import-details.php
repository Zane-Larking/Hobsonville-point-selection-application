<?php

//Code to import teachers
include "../DataBase/database-connect.php";
// echo "test 1";
if (isset($_POST['submit']) & isset($_POST['src']) & isset($_POST['src'])) {
    // echo "test 2";
    //Convient view for debugging 
    // header('content-type: text/plain');

    $src = $_POST['src'];
    $table = $_POST['table'];
    
    //Extract file info
    $file = $_FILES['file'];
    
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    //debugging information
    // print_r($file);
    // echo $fileName." <br>";

    //Checks if the provided file is authorised
    $fileNameArray = explode('.', $fileName);
    $fileExt = strtolower(end($fileNameArray));
    $allowedExt = array('csv');

    if (in_array($fileExt, $allowedExt)) {
        if ($fileError === 0) {
            if ($fileSize < (2*1028*1028)) {

                $f = fopen($fileTmpName, 'r');
                $fields = preg_replace('/\n|\r/', "", fgets($f));
                // var_dump($fields);

                $detailsArr = [];
                while(($cur = fgetcsv($f, 200, ',', '"')) !== FALSE) {
                    $cur = preg_replace('/\D+/', '"$0"', $cur);
                    $cur = implode(",", $cur);
                    array_push($detailsArr, $cur);
                }
                // var_dump($detailsArr);

                //The deletion query
                $delete = "DELETE FROM `.$table.` WHERE 1";

                //Debugging information
                // echo "\n";
                // print_r($delete);
        
                //this deletes data in the database table ready to be filled with the new data.
                if (mysqli_query($dbconnect, $delete)) {
                    //Debugging information
                    // echo "\n\nClasses table completely cleared!\n\n";
                } else {
                    // echo "\n\nError deleting table!\n\n";
                }
                
                foreach ($detailsArr as $details) {

                    //Creates insert query
                    $query = "INSERT INTO `".$table."` (".$fields.") VALUES (".$details.")";
                    
                    //Debugging information
                    // print_r($query);
                    
                    if (mysqli_query($dbconnect, $query)) {
                        //Debugging information
                        // echo "\nEntry added!\n";
                    } else {
                        // echo "\nError adding entry!\n";
                    }

                }      
                fclose($f);
                header("location: ../".$src.".php?uploadsuccessful");
            } else {
                echo "File size too large. Please contact developer at zane.larking@hobsonvillepoint.school.nz";
            }

        } else {
            echo "There was an error uploading your file!";
        }

    } else {
        echo "Invalid file type! (please upload a properly formatted csv file)";
    }
}
?>