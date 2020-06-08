<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HPSS Class Selections</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" media="screen" href="Styles/buttons.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="Styles/student-class-select.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="Styles/nav.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="Styles/main.css" />
    <?php
        //Run other php files
        include ("PhpSnippets/session-start.php");
        include ('DataBase/database-connect.php');
        include ('PhpSnippets/classes-constants.php');
    ?>
    <?php
    
        $year_level =  isset($_SESSION['year_level']) ? $_SESSION['year_level'] : 11; 
    ?>

    <script src="Scripts/main.js"></script>
    <script src="Scripts/submit-selections.js"></script>
    <!--<script src="Scripts/date-time.js"></script>-->
    <script>
        var selectedClasses = [];

        //Retrieving session variavbles method 1
        // let xhttp = new XMLHttpRequest();
        // xhttp.onreadystatechange = function() {
        //     if (this.readyState == 4 && this.status == 200) {
        //         sessionVariables = JSON.parse(this.response);
        //         console.log(sessionVariables);
        //         const year_level = sessionVariables.year_level;
        //     }
        
        //method 2
        //         sessionVariables = JSON.parse(this.response);
        sessionVariables = JSON.parse('<?php echo json_encode(['year_level' => $year_level, 'name' => $_SESSION['name'], 'id' => $_SESSION['id']]);?>');
        console.log(sessionVariables);
        const year_level = sessionVariables.year_level;

        // };
        // xhttp.open("POST", "AJAX/get-session-variables.php", true);
        // xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        // xhttp.send();    
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let selectionCount = JSON.parse(this.response);
                selectedClasses = Array(selectionCount);
            }
        };
        xhttp.open("POST", "AJAX/get-student-ciriculum-class-count.php", true);
        xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhttp.send("year_level="+year_level);
    </script>


</head>
<body>
    <?php
        include ('PhpSnippets/header-bar.php');
    ?>

    <?php
        // $year_level = 11;
        $Qual = isset($_GET["Qual"]) ? $_GET["Qual"]: 1;
        $moduleCount = 	$CPYL['modules'][$Qual];
        $spinCount =    $CPYL['spins'][$Qual];
        echo "<script> 
        var qual = $Qual;
        console.log('$Qual');</script>
        ";
        
        //gets the highest amount of choices a class_type can have
        $query = "SELECT MAX(choices) as max FROM `class_template` WHERE year_level = $year_level AND curriculum = 1";
        $maxChoices = mysqli_fetch_array(mysqli_query($dbconnect, $query))['max'];

        $query = "SELECT `class_type`, `count`, `choices` FROM `class_template` WHERE year_level = $year_level AND curriculum = 1 GROUP BY `class_type`";
        $classTypeResult = mysqli_query($dbconnect, $query);

        mysqli_data_seek($classTypeResult, 0);
        foreach (mysqli_fetch_array($classTypeResult) as $a) {
            # code...
        }


        function CleanClassQueryResults($result) {
            // echo "Testing generator function";
            /*Because the JOIN's in the 'class queries' select multiple rows for a single class 
            the rows need to be consolidated into one.

            //queried data
            class_id, code, name, type, year, description, 
            class_subjects_id*, class_subjects_class_id*, subject, 
            class_year_level_id*, class_year_level_class_id*, year_level, 
            staff_id, first_name, last_name, kamar_code

            The function take the iterator of the mysqli_result object and pulls out multiple arrays, and packages and yields them as a single array.
            $result is a iterator that is yielding table row results from the query to the database. 
            */
            $row = mysqli_fetch_array($result);
            //grab first value.
            while(true){
                $lookAhead = mysqli_fetch_array($result);
                if (!isset($class) AND $row) {
                    //creates the class array to be yielded
                    $class = [];
                    $class["class_id"] = $row["class_id"];
                    $class["code"] = $row["code"];
                    $class["name"] = $row["name"];
                    $class["type"] = $row["type"];
                    $class["year"] = $row["year"];
                    $class["description"] = $row["description"];

                    $class["subjects"] = [$row["subject"]];
                    
                    $class["year_levels"] = [$row["year_level"]];

                    $class["teachers"] = [["teacher_id" => $row["teacher_id"], "first_name" => $row["first_name"], "last_name" => $row["last_name"], "kamar_code" => $row["kamar_code"]]];
                }
                elseif($row) {
                    //puts adds differing subjects to subjects property.
                    if (!in_array($row["subject"],$class["subjects"])) {
                        array_push($class["subjects"], $row["subject"]);
                    }
                    //puts adds differing subjects to year_levels property.
                    if (!in_array($row["year_level"], $class["year_levels"])) {
                        array_push($class["year_levels"], $row["year_level"]);
                    }
                    //puts adds differing subjects to teachers property.
                    if (!in_array(["teacher_id" => $row["teacher_id"], "first_name" => $row["first_name"], "last_name" => $row["last_name"], "kamar_code" => $row["kamar_code"]], $class["teachers"])) {
                        array_push($class["teachers"], ["teacher_id" => $row["teacher_id"], "first_name" => $row["first_name"], "last_name" => $row["last_name"], "kamar_code" => $row["kamar_code"]]);
                    }
                    
                    if ($class["class_id"] != $lookAhead["class_id"]) {
                        yield $class;
                        unset($class);                      
                    } 
                    else {
                    }
                }
                else{
                    return;
                }
                $row = $lookAhead;
            }
        }

	?>

    <article id="main">
        <div id="mainGrid">
            <div id ="description">
                <h1>How to use this page<h1>
                <h4>
                <p>
                    <!-- The school server has an updated text prompt -->
                    - Click the dropdown boxes to open and close page content<br>
                    - Select The classes you like the look of, You shall be required to pick your 1,2,3 Choice for each Class<br>
                    - Any Classes that dont appeal to you? Dismiss them!<br>
                    - At the top of the page you may view your curriculum coverage. You must contain X subjects as you are a year Y<br>


                </p>
              </h4>
            </div>
            <!--Curriculum Tally Chart-->
            <!-- Curriculum head -->
            <div color_by = "choice" id="CurriculumCoverage">
                <div id="CurriculumBar" class="CurriculumBar HeaderBar">
                    <div class="HeaderBarTitle">
                        <div class="Title">
                            Curriculum Coverage
                        </div>
                    </div>
                    <div class="CurriculumSubjects Subjects">
                        <?php
                            foreach($curriculum as $subject => $_) {
                                echo "
                                <div>$subject</div>";
                            }
                        ?>
                        <!-- <div>Maths</div>
                        <div>English</div>
                        <div>Science</div>
                        <div>Social Science</div>
                        <div>Technology</div>
                        <div>HPE</div>
                        <div>Arts</div>
                        <div>Languages</div> -->
                    </div>
                </div>


                <?php
                    //loops over choices (eg: 1st choices, 2nd choices, 3rd choices, etc...)
                    echo "
                <div id='Choices'>";
                    for ($choiceIV = 0; $choiceIV < $maxChoices; $choiceIV++) {
                        //Reusing the result '$classTypeResult' so I don't have to redo it's query.
                        mysqli_data_seek($classTypeResult, 0);
                        $choice = ["First", "Second", "Third", "Fourth", "Fifth"][$choiceIV];
                        $ordinal = ["1st", "2nd", "3rd", "4th", "5th"][$choiceIV];
                        echo "
                    <div id='$choice"."Choices'>
                        <div class='TallyBar'>
                            <div class='HeaderBarTitle'>
                                <div class='PriorityDropdownButton'><div class='DropdownButton'></div></div>
                                <div class= 'Priority BarTitle'>
                                    $ordinal Choices
                                </div>
                            </div>

                            <div class='TallySubjects Subjects'>
                                <div>0</div>
                                <div>0</div>
                                <div>0</div>
                                <div>0</div>
                                <div>0</div>
                                <div>0</div>
                                <div>0</div>
                                <div>0</div>
                            </div>
                        </div>
                        <div class='DropdownClasses'>";
                        mysqli_data_seek($classTypeResult, 0);
                        //loops over class_type of each aggregate of classes from the database
                        while ($row = mysqli_fetch_array($classTypeResult, MYSQLI_ASSOC)) {   
                            //loops over the count of each class_type
                            $classType = $row["class_type"];
                            $classCount = $row["count"];
                            $classChoices = $row["choices"];


                            if ($classChoices > $choiceIV) {
                                for ($i = 1; $i <= $classCount; $i++) {
                                    echo "
                            <div class='$classType$i'>
                            </div>";
                                }
                            }
                        }
                        echo"
                        </div>
                    </div>";
                    }
                    echo "
                </div>
            </div>";
                ?>
               




            <?php
                function echoSubjects ($subjects) {
                    return implode(" ",$subjects);
                }
                //if I wanted t0 use radio inputs instead of my custom made select and dismiss buttons.
                //<input type='radio' name='selectModule$i' value='$row[CODE]'> test

                // //--Modules--
                //Reusing the result '$classTypeResult' so I don't have to redo it's query.
                mysqli_data_seek($classTypeResult, 0);

                //keeps take of how many classes have been added.
                $classIndex = 0;
                
                //loops over class_type of each aggregate of classes from the database
                while ($row = mysqli_fetch_array($classTypeResult, MYSQLI_ASSOC)) {                    
                    $classType = $row["class_type"];
                    $classCount = $row["count"];

                    //loops over the count of each class_type
                    for ($i = 1; $i <= $classCount; $i++) {
                        $query = "SELECT classes.id AS class_id, code, name, type, year, description, 
                        subject, 
                        year_level, 
                        teacher_id, first_name, last_name, kamar_code
                        FROM classes 
                        LEFT JOIN class_subjects ON classes.id = class_subjects.class_id 
                        LEFT JOIN class_year_level ON classes.id = class_year_level.class_id 
                        LEFT JOIN class_teachers ON classes.id = class_teachers.class_id 
                        LEFT JOIN staff ON staff.id = class_teachers.teacher_id WHERE year = 2019 AND year_level = $year_level AND type = '$classType$i'";
                        $result = mysqli_query($dbconnect, $query);
                        
                        $classes = CleanClassQueryResults($result);
                        

                        echo"
                            <div id ='$classType$i'>
                                <div "/*id='Module$i"."Bar' */. "class='PeriodBar HeaderBar'>
                                    <div class='HeaderBarTitle'>
                                        <div class='PeriodDropdownButton'><div class='DropdownButton'></div></div>
                                        <div class='PeriodName BarTitle'>".ucfirst(strtolower($classType))." $i</div>
                                    </div>
                                    <div class='PeriodSubjects Subjects'>";
                                    $query = "SELECT subject 
                                    FROM classes 
                                    LEFT JOIN class_subjects ON classes.id = class_subjects.class_id 
                                    LEFT JOIN class_year_level ON classes.id = class_year_level.class_id 
                                    LEFT JOIN class_teachers ON classes.id = class_teachers.class_id 
                                    LEFT JOIN staff ON staff.id = class_teachers.teacher_id 
                                    WHERE year = 2019 AND year_level = $year_level AND type = '$classType"."$i' GROUP BY subject";

                                    $availableSubjects = [];
                                    $subjectResult = mysqli_query($dbconnect, $query);
                                    while($subjectRow = mysqli_fetch_array($subjectResult)) {
                                        array_push($availableSubjects, $subjectRow["subject"]);
                                    }
                                    foreach($curriculum as $subject => $_) {
                                        if (in_array($subject, $availableSubjects)){
                                            echo "<div class = 'AvailableSubject $subject'>$subject</div>";
                                        }
                                        else {
                                            echo "<div>$subject</div>";
                                        }
                                    }
                                    echo "
                                    </div>
                                </div>
                                <div class='SelectedClasses'>
                                    <div class='FirstChoice'></div>
                                    <div class='SecondChoice'></div>
                                    <div class='ThirdChoice'></div>
                                </div>
                                <div class='DropdownClasses'>
                        ";
                        
                        ///////////////////////
                        foreach ($classes as $class) {
                            // var_dump($class);


                            $subjects = $class['subjects'];
                            echo"
                                <div class='Course' subject='".echoSubjects($subjects)."' classIndex='$classIndex' classType='$classType$i'>
                                    <div class='ClassBar HeaderBar'>
                                        <div class='HeaderBarTitle'>
                                            <div class='ClassDropdownButton'><div class='DropdownButton'></div></div>
                                            <div class='ClassCode BarTitle'>
                                                $class[code]
                                            </div>
                                        </div>
                                        <div class='ClassSubjects Subjects'>";
                                            foreach($curriculum as $subject => $_) {
                                                if (in_array($subject, $subjects)){
                                                    echo "<div class = 'SubjectOfClass $subject'>$subject</div>";
                                                }
                                                else {
                                                    echo "<div class = '$subject'>$subject</div>";
                                                }
                                            }
                                            echo "
                                        </div>
                                    </div>
                                    <div class='ClassDropdownDescription'>
                                        <div id='Name'>$class[name]</div>
                                        <div id='Teachers'>";
                                        $cb = function($teacher){
                                            return $teacher['first_name']." ".$teacher['last_name'];
                                        };
                                        echo join(",<br>", array_map($cb, $class['teachers']));
                                        
                                        echo"</div>
                                        <div id='Inputs'>
                                            <div class='selectDropdown'>
                                                <button class='dropbtn'>Select</button>
                                            </div>
                                            <button class='ClassDismissButton'>Dismiss</button>
                                        </div>";
                                        if ($Qual > 0) {
                                            echo "
                                        <div id='NCEA'>
                                            Filler Text: Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah
                                        </div>";}
                                        echo"
                                        <div id='Description'>
                                            <p>
                                                $class[description]
                                            </p>
                                        </div>
                                    </div>
                                    <div class ='selectAbsolute'>
                                        <div class='selectDropdownContent'>
                                            <button class='ClassSelectButton'>First</button>
                                            <button class='ClassSelectButton'>Second</button>
                                            <button class='ClassSelectButton'>Third</button>
                                        </div>
                                    </div>
                                </div>";
                                $classIndex ++;
                        }
                        echo"
                            </div>
                        </div>";
                    }
                }

            ?>
            <div id="Application">
                <textarea placeholder = "Optional: You can write an application describing why you should recieve your selected classes."></textarea>
                <input id="submitSelections" type="submit" onclick="if(event.preventDefault) event.preventDefault(); submitSelections('M/S');" disabled>
                <a href="DataBase/submit-selections.php?data=classes">Click here to download the EXCEL CSV file of your class selections</a><br>
            </div>
            <?php
                //date_default_timezone_set('Pacific/Auckland');
                
                
            ?>
        </div>
    </article>

    <!--Scripts-->
    <script src="Scripts/curriculum-coverage.js"></script>
    <script src="Scripts/drop-down-btn.js"></script>
    <script src="Scripts/select.js"></script>
    <script src="Scripts/dismiss.js"></script>

</body>
</html>
