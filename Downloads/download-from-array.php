<?php
    //https://tournasdimitrios1.wordpress.com/2012/01/10/how-to-make-files-downloadable-with-php/
    //https://www.w3schools.com/php/func_filesystem_fputcsv.asp
    include ('../DataBase/database-connect.php');
    
    $list = array
    (
        "Class ID,Class Name,Year Level,Period,Subject 1,Subject 2,Description",
        "Class ID,Class Name,Year Level,Period,Subject 1,Subject 2,Description"
    );
    
    $file = fopen("class-selections.csv","w");
    
    foreach ($list as $line)
      {
      fputcsv($file,explode(',',$line));
      }
    
    fclose($file); 

    $file = "class-selections.csv";
 
    var_dump($file);
    if (file_exists($file) && is_readable($file) && preg_match('/\.csv$/',$file)) {
        header('Content-Description: File Transfer');
        header('Content-type: application/csv');
        header("Content-Type: application/force-download");// some browsers need this
        header("Content-Disposition: attachment; filename='$file'");
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);
        exit;
    }

?>