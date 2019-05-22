<?php
include "../DataBase/database-connect.php";
if (isset($_POST['submit'])) {
    //Convient view for debugging 
    // header('content-type: text/plain');
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
                $fcontent = fread($f, $fileSize);
                
                //Regular expression that groups information the the same 'csv row'
                $regex = '/(("(.|\n)+?",(?!\s))|([^,\n"]*,)){9}(("(.|\n)+?"(?!.))|([^,\n"]*))/';
                //older versions
                // regex v1: \w+(,(("([^"])+")|([^,\n"]+))?){9}
                // regex v2: \w+(((,"([^"])+")|(,([^,\n"]+)?))){9}
                // regex v3: \w+((,"(.|\n)*?"(?=\n|,\S))|(,([^,\n"]+)?)){9} /*doesn't support commas in numbers*/
                //current version
                // regex v4: (("(.|\n)+?",(?!\s))|([^,\n"]*,)){9}(("(.|\n)+?"(?!.))|([^,\n"]*))

                /* returns an array of string called $out from $fcontent that matches the regular expression $regex*/
                preg_match_all($regex, $fcontent, $out);
                /* the [0] causes the match to return only a array of strings that matches the entire pattern. (don't worry about it, it's a given)*/
                $classesArr = $out[0];

                //Debugging information
                // print_r($classesArr);

                //splits the values of each row into an array.
                foreach ($classesArr as $i => $classArr) {
                    $detailsArr[$i] = preg_split("/,(?!\s)/", $classArr);
                    $colcount = sizeof($detailsArr[0]);
                    //This relies on the premise that only the description will contain line breaks
                    while (sizeof($detailsArr[$i]) > $colcount) {
                        $detailsArr[$i][$colcount-1] .= ",".array_pop($detailsArr[$i]);
                    }
                }
                //Debugging information
                // print_r($detailsArr);

                //removes the field names and puts them into their own array 
                $head = array_shift($detailsArr);

                //The deletion query
                $delete = "DELETE FROM `classes` WHERE 1";

                //Debugging information
                // echo "\n";
                // print_r($delete);

                //this deletes data in the database table ready to be filled with the new data.
                if (mysqli_query($dbconnect, $delete)) {
                    //Debugging information
                //     echo "\n\nClasses table completely cleared!\n\n";
                // } else {
                //     echo "\n\nError deleting table!\n\n";
                }

                //Debugging information
                // print_r($head);
                //A string listing all the fields in the database
                $fields = join(",", $head);
                
                //Format row values and insert them into 
                foreach ($detailsArr as $detailArr) {
                    //formats stings containing single quotes and double quotes such that they can be interpreted in the mysqli query
                    foreach ($detailArr as $j => $detail) {
                        if (!preg_match('/(^".+"$)|^\d+$/', $detail)) {
                            $detail = '"'.$detail.'"';
                        }
                        $temp = preg_replace('/(?<=.)(“|”|")(?=.)/', '""', $detail);
                        $detailArr[$j] = preg_replace("/‘|’|'/", "''", $temp);
                    }
                    //Creates insert query
                    $values = join(",", $detailArr);
                    $query = "INSERT INTO `classes` (".$fields.") VALUES (".$values.")";

                    //Debugging information
                    // print_r($query);

                    if (mysqli_query($dbconnect, $query)) {
                        //Debugging information
                    //     echo "\nEntry added!\n";
                    // } else {
                    //     echo "\nError adding entry!\n";
                    }
                    // echo "\n";
                }

                fclose($f);
                header("location: ../manage-classes.php?uploadsuccessful");
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