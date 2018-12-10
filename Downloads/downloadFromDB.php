<?php
    include ('../DataBase/Databaseconnect.php');

    function setExcelContentType() {
        if(headers_sent())
            return false;
    
        header('Content-type: application/csv');
        return true;
    }
    
    function setDownloadAsHeader($filename) {
        if(headers_sent())
            return false;
    
        header('Content-disposition: attachment; filename=' . $filename);
        return true;
    }



    function csvFromResult($file, $result, $showColumnHeaders = true) {
        if($showColumnHeaders) {
            $columnHeaders = array();
            $nfields = mysqli_num_fields($result);
            while ($field = mysqli_fetch_field($result)) {
                $columnHeaders[] = $field->name;
            }
            fputcsv($file, $columnHeaders);
        }
    
        $nrows = 0;
        while($row = mysqli_fetch_row($result)) {
            fputcsv($file, $row, "", '');
            $nrows++;
        }
    
        return $nrows;
    }


    function csvFileFromResult($stream, $result, $showColumnHeaders = true) {
        $fp = fopen($stream, 'w');
        $rc = csvFromResult($fp, $result, $showColumnHeaders);
        fclose($fp);
        return $rc;
    }


    function downloadCsvFromResult($result, $Filename = 'data.csv', $showColumnHeaders = true) {
        setExcelContentType();
        setDownloadAsHeader($Filename);
        return csvFileFromResult('php://output', $result, $showColumnHeaders);
    }


    $result = mysqli_query($dbconnect, "SELECT * FROM ".$_GET['data']);
    downloadCsvFromResult($result, $_GET['data'].'.csv', true);
?>