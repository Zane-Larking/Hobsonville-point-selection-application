<?php 
    $CPYL = ['modules' => [3,2,1,0], 'spins' => [3,2,3,5], 'floorTimes' => [3,2,1,1]];
    //echo json_encode($CPYL);

    /*
    The array below sorts an editable (won't update the database) list of class subjects.
    There are two associated values (the key and the item) the latter is what will be the value displayed for the user to see
    while I'm considering using the former as id's and variable names. 
    Your not allowed to create variables or id with spaces, so I would have been able to use the latter for this. 
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
    //parses $CPYL to "var CPYL = {modules: [3, 2, 1, 1], spins: [3, 2, 1, 0], floorTimes: [3, 2, 3, 5])}"
    echo "<script type='text/javascript'>
        var CPYL = {";
    foreach($CPYL as $key => $displayed) {
        echo "$key : [";
        foreach($displayed as $index => $value){
            echo "$value, ";
            if ($index != "3"){
                echo ", ";
            }
            echo "]";
        }   
    }
    echo ", [1,1,1,1]};
    </script>";


?>