<?php
if (isset($_POST['submit'])) {
    //extract file info
    $file = $_FILES['file'];
    
    print_r($file);
    
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = strtolower(end(explode('.', $fileName)));

    $allowedExt = array('csv');

    if (in_array($fileExt, $allowedExt)) {
        if ($fileError === 0) {
            if ($fileSize < (2*1028*1028)) {
                $fileNameNew = uniqid("", true).".".$fileExt;
                $fileDestination = '../uploads/'.$fileNameNew;

                //move file
                move_uploaded_file($fileTmpName, $fileDestination);
                header("location: ../ManageClasses.php?uploadsuccessful");
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