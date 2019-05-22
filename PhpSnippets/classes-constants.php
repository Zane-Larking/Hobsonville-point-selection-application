<?php 
    $CPYL = ['modules' => [3,2,1,0], 'spins' => [3,2,3,5], 'floorTimes' => [3,2,2,1]];
    //echo json_encode($CPYL);

    /*
    The array below sorts an editable (won't update the database) list of class subjects.
    There are two associated values (the key and the item) the latter is what will be the value displayed for the user to see
    while I'm considering using the former as id's and variable names. 
    Your not allowed to create variables or ids with spaces, so I would have been able to use the latter for this. 
    I can use foreach($curriculum as $key => $displayed) to access all the values.
    */  
    $curriculum = [
        //"key" => "displayed value"
        "MATH" => "Mathematics",
        "ENGLISH" =>  "English", 
        "SCIENCE" => "Science", 
        "SOCSCIENCE" => "Social Science", 
        "TECH" => "Technology and DVC", 
        "HPE" => "Health and PE", 
        "ART" => "Performing and Visual Arts", 
        "LANGUAGE" => "Language"
    ];
    $curriculum2 = [
        "Maths",
        "English",
        "Science",
        "Social Science",
        "Technology",
        "HPE",
        "Arts",
        "Languages"
    ];
    $yearGroups = ["FF", "Q1", "Q2", "Q3"];
    $qual = [];
    $qual["FF"] = 0;
    $qual["Q1"] = 1;
    $qual["Q2"] = 2;
    $qual["Q3"] = 3;

    $yearLevel = [];
    $yearLevel["FF"] = "9 OR YEAR_LEVEL = 10";
    $yearLevel["Q1"] = 11;
    $yearLevel["Q2"] = 12;
    $yearLevel["Q3"] = 13;

    $yearToQual = [];
    $yearToQual[9] = 0;
    $yearToQual[10] = 0;
    $yearToQual[11] = 1;
    $yearToQual[12] = 2;
    $yearToQual[13] = 3;
    //parses $CPYL to "var CPYL = {modules: [3, 2, 1, 0], spins: [3, 2, 3, 5], floorTimes: [3, 2, 1, 1])}"
    echo "<script type='text/javascript'>
        var CPYL = {";
    foreach($CPYL as $key => $displayed) {
        echo "$key : [";
        foreach($displayed as $index => $value){
            echo "$value";
            if ($index != "3"){
                echo ", ";
            }
        }   
        echo "], ";
    }
    echo " projects: [1,1,1,1]};
    </script>";


?>