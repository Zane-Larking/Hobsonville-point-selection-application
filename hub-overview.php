<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hub Overview</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="Styles/main.css">
    <link rel="stylesheet" type="text/css" href="Styles/nav.css">
    <link rel="stylesheet" type="text/css" href="Styles/search-pannel.css">
    <link rel="stylesheet" type="text/css" href="Styles/scroll-pannel.css">

    
    <?php
        //Run other php files
        include "PhpSnippets/session-start.php";
        include "DataBase/database-connect.php";
        include "PhpSnippets/classes-constants.php";
        include "PhpSnippets/application-handling.php";

    ?>
</head>
<body>
    <?php
        include ('PhpSnippets/header-bar.php');
        $name = "Zane Larking";
    ?>
    <div id="main">
        <div id ="mainGrid">
            <!-- Search Pannel -->
            <div class = "searchPannel roundedContainer">
                <div class ="sectionHeader roundedHeader">
                    <div id="profile">
                        <img src="Images/portrait-placeholder.png" alt="Profile picture" style="height: 2em; border-radius: 50%;">
                        <div class="name"><?php echo $_SESSION['name']; ?></div>
                    </div>
                    <div class="searchBar">
                        <div class="material-icons prefix">search</div>
                        <input value="" class="search" type="text" placeholder="Search Hublings">
                    </div>
                </div>
                <!-- List students in the search pannel -->
                <div class="scrollPannel students">
                    <?php
                        $query = "SELECT `first_name`, `last_name`, `year_level` FROM `students` WHERE `coach_id` = ".$_SESSION['id'].";";
                        $result = mysqli_query($dbconnect, $query);
                        if(!mysqli_num_rows($result))
                        {
                            echo("No students found");
                        }else{
                            while ($row = mysqli_fetch_array($result)){
                                echo '
                                <div class="scrollItem student  '.$row['first_name'].'-'.$row['last_name'].'" onclick = "displayTabs(event, '."'".'currentStudentSelections'."', '".$row['first_name'].'-'.$row['last_name']."'".')">
                                    <img src="Images/portrait-placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                    <p>'.$row['first_name'].' '.$row['last_name'].'</p>
                                    <div class="coverageCheck approved">
                                        <div class="material-icons">check</div>

                                    </div>
                                </div>
                                ';
                            }
                        }   
                    ?>
                </div>
            </div>
            <div class = "studentSelections currentStudentSelections roundedContainer">
            
            </div>
            <?php
            
            function CleanStudentSelectionsResults($r){
                         /*Because the JOIN's in the 'class queries' select multiple rows for a single class 
                        the rows need to be consolidated into one.*/

                        $row = mysqli_fetch_array($r);

                        while(true){
                            $lookAhead = mysqli_fetch_array($r);
                            if (!isset($class) AND $row) {
                                //creates the class array to be yielded
                                $class = [];
                                $class["class_id"] = $row["class_id"];
                                $class["classes"] = ["class_id" => $row["class_id"], "class_code" => $row["code"], "class_name" => $row["name"], "class_type" => $row["type"], "class_period" => $row["period"], "class_description" => $row["description"], "starting_term" => $row["starting_term"]];
                                $class["preference"] = $row["preference"];
                                $class["approval_status"] = $row["approval_status"];
                                $class["year"] = $row["year"];

                                $class["subjects"] = [$row["subject"]];
                                
                                $class["teachers"] = [["teacher_id" => $row["teacher_id"], "first_name" => $row["first_name"], "last_name" => $row["last_name"], "kamar_code" => $row["kamar_code"]]];
                            }
                            elseif($row) {
                                //puts adds differing subjects to subjects property.
                                if (!in_array($row["subject"],$class["subjects"])) {
                                    array_push($class["subjects"], $row["subject"]);
                                }
                                //puts adds differing subjects to year_levels property.
                                //if (!in_array($row["year_level"], $class["year_levels"])) {
                                    //array_push($class["year_levels"], $row["year_level"]);
                                //}
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


            //Creates content on each students choices from the database.
            $query = "SELECT `id`, `first_name`, `last_name`, `year_level` FROM students WHERE `coach_id` = '".$_SESSION['id']."';";
            $result = mysqli_query($dbconnect, $query);
            while ($row = mysqli_fetch_array($result)){
                $studentName = $row['first_name'].'-'.$row['last_name'];
                echo '
            <div class = "'.$row['first_name'].'-'.$row['last_name'].' studentSelections roundedContainer">
                <div class = "selectionsHeader sectionHeader roundedHeader">
                    <div style = "align-items: center; display: flex;  grid-area: info;">
                        <img src="Images/portrait-placeholder.png" alt="Profile picture" style="height: 40rem; border-radius: 50%;">
                        <h3>'.$row['first_name'].' '.$row['last_name'].' | Year '.$row['year_level'].'</h3>         
                    </div>
                    ';

                    //Creates a toggle for each set of choices a student has (Currently unmutable). 
                    /*echo '
                    <div class = "choiceToggles" style = "grid-area: toggles">
                        <div class="toggleChoice choice1'.'" onclick = "displayTabs(event, '."'".'currentChoiceSelections'."', '".' choice1'."'".')">1st</div>
                        <div class="toggleChoice choice2'.'" onclick = "displayTabs(event, '."'".'currentChoiceSelections'."', '".' choice2'."'".')">2nd</div>
                        <div class="toggleChoice choice3'.'" onclick = "displayTabs(event, '."'".'currentChoiceSelections'."', '".' choice3'."'".')">3rd</div>
                    </div> ';*/

                    echo '
                    <div class = "choiceToggles" style = "grid-area: toggles">
                        <div class="toggleChoice choice1'.'" onclick = "hideTables(1,'.$row['id'].')">1st</div>
                        <div class="toggleChoice choice2'.'" onclick = "hideTables(2,'.$row['id'].')">2nd</div>
                        <div class="toggleChoice choice3'.'" onclick = "hideTables(3,'.$row['id'].')">3rd</div>
                    </div>
                </div>
                <div style="display:  grid; grid-template-columns: 78% 20%; grid-gap: 2%; margin: 2%; margin-bottom: 0;">
                    <div class = "selections">
                    ';
                    

                    //Displays choices based off the SELECTIONS_M&S database result.
                    $SelectionsObject = [];
                    $classCountQuery = "SELECT `count` FROM class_template WHERE `year_level` = ".$row['year_level'].";";
                    $classCountResult = mysqli_query($dbconnect, $classCountQuery);
                    $numOfClasses = 0; //[$yearToQual[$row['year_level']]]
                    while ($countRow = mysqli_fetch_array($classCountResult)){
                        $numOfClasses += $countRow['count'];
                    }
                    //echo($numOfClasses);
                    //$numOfClasses = $CPYL['modules'][$yearToQual[$row['year_level']]] + $CPYL['spins'][$yearToQual[$row['year_level']]];
                    $numOfChoices = 3;
                    //$selections = explode(" ", $row["SELECTIONS_M&S"]);





                    // Jack's changes
                    //$selectionsQuery = "SELECT `selections.class_id`,`selections.type`,`selections.preference`,`selections.approval_status`,`selections.year` FROM selections INNER JOIN class_subjects ON selections.class_id=class_subjects.class_id INNER JOIN selections.class_id=class_teachers.class_id ON class_teachers;";
                    //$selectionsQuery = "SELECT selections.class_id,selections.type,selections.preference,selections.approval_status,selections.year,class_teachers.teacher_id,class_subjects.subject FROM selections INNER JOIN class_subjects ON selections.class_id=class_subjects.class_id INNER JOIN selections.class_id=class_teachers.class_id ON class_teachers WHERE selections.student_id =".$row['id'].";";
                    //$selectionsQuery = "SELECT selections.class_id,selections.type,selections.preference,selections.approval_status,selections.year,class_teachers.teacher_id,class_subjects.subject FROM selections INNER JOIN class_teachers ON selections.class_id=class_teachers.class_id INNER JOIN class_subjects ON selections.class_id=class_subjects.class_id WHERE selections.student_id =".$row['id'].";";
                    $selectionsQuery = "SELECT selections.class_id,classes.id,classes.code,classes.name,classes.starting_term,classes.type AS period ,selections.type,classes.description,selections.class_id,selections.preference,selections.approval_status,selections.year,class_teachers.teacher_id,class_subjects.subject,staff.first_name,staff.last_name,staff.kamar_code
                                        #AS class_id,type,preference,approval_status,year,teacher_id,subject,first_name,last_name,kamar_code
                                        FROM selections 
                                        LEFT JOIN class_teachers ON selections.class_id=class_teachers.class_id 
                                        LEFT JOIN class_subjects ON selections.class_id=class_subjects.class_id
                                        LEFT JOIN classes ON selections.class_id=classes.id
                                        LEFT JOIN staff ON staff.id = class_teachers.teacher_id 
                                        WHERE selections.student_id =".$row['id'].";"; 






                    $selectionsResult = mysqli_query($dbconnect, $selectionsQuery);

                    
                    $selection = CleanStudentSelectionsResults($selectionsResult);

                    $selectionsArray = array();
                    foreach($selection as $s){
                        array_push($selectionsArray,$s);
                    }

                    //echo count($selection);

                    

                    //while ($rrr = mysqli_fetch_array($selectionsResult)){
                        //echo $rrr['type'];
                    //}
                    //$selections = 

                    //echo "<br><br><br><br><br><br><br><br><br><br><br>";


                    //echo $row['year_level'];
                    $formatClassesQuery = "SELECT year_level, class_type, curriculum, count, choices, duration FROM class_template WHERE year_level = ".$row['year_level'].";";
                    $formatClasses = mysqli_query($dbconnect, $formatClassesQuery);

                    //echo json_encode($formatClasses);

                    //echo "<br><br><br><br><br><br><br><br><br><br><br>";

                    $classTypeCounter = mysqli_num_rows($formatClasses);
                    //echo $classTypeCounter;

                    echo "<br>";
                    


                    //echo json_encode($formatClasses);
                    //$e = count($selection);
                    //echo $e;


                    $classTypeColumnCount = str_repeat("auto ", $classTypeCounter);

                    $yearLevelDuration = [2,2,2,4,4];// TEMPORARY

                    

                    $timeTableComposition = [];

                    while($f = $formatClasses->fetch_assoc()){
                        for($i = 1;$i<=ceil($yearLevelDuration[$row['year_level']-9]/$f['duration']);$i++){
                            array_push($timeTableComposition,[$f['class_type'].$i,ceil($yearLevelDuration[$row['year_level']-9]/$f['duration']),intval($f['duration']),intval($f['count']),intval($f['choices']),intval($f['curriculum'])]);
                        }   //                                          0                                          1                                        2                3                      4                      5             
                    }
                    //echo json_encode($timeTableComposition);
                    //echo count($timeTableComposition);
                    //echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";






                    /*while($f = $formatClasses->fetch_assoc()) {

                         echo "<div class='classColumn'>";
                        
                        for($classRow = 0; $classRow <  $f['count']; $classRow++){
                            //$classDetails = mysqli_fetch_array($formatClasses,$classRow);
                            echo "<div class='classRow'>";
                            echo $f['class_type'];
                            echo "<br>";
                             

                            foreach ($selectionsArray as $s) {

                                if($s['classes']['class_type'] == $f['class_type']){
                                    echo $s['class_id'];
                                }
                            }
                           
                            echo "</div>";
                        }
                        echo "</div>";
                    }*/



















                    for($r=0;$r<3;$r++){
                        $initialDisplay = "none";
                        if($r==0){
                            $initialDisplay = "";
                        }
                        echo"<div class='grid-container' id='selectionsTableChoice".($r+1).$row['id']."'' style='display:".$initialDisplay."'>";
                        for($i=0;$i<count($timeTableComposition);$i++){
                            echo "<div class='classColumn' style='display:block;'>";
                            //strval((intval($s['classes']['starting_term'])+$timeTableComposition[2]-1)/$timeTableComposition[2]);
                            //echo $timeTableComposition[$i][1];
                            
                            for($classRow = 0; $classRow <  $timeTableComposition[$i][3]/$timeTableComposition[$i][1]; $classRow++){
                                //echo $timeTableComposition[$i][0];
                                //echo $timeTableComposition[$i][3];
                                //echo $timeTableComposition[$i][1];
                                //$classDetails = mysqli_fetch_array($formatClasses,$classRow);
                                echo "<div class='classRow roundedContainer'>";
                                //echo $f['class_type'];
                                echo '<div class = "roundedHeader" style="font-weight: bolder">';
                                echo $timeTableComposition[$i][0];
                                echo '
                                </div>
                                
                                <div class = "roundedContent bissectedContainer" style="padding-top:5px;">

                                    <div>
                                ';
                                $classChosenExists = false;

                                foreach ($selectionsArray as $s) {


                                    if($timeTableComposition[$i][0] == $s['classes']['class_type'].strval((intval($s['classes']['starting_term'])+$timeTableComposition[$i][2]-1)/$timeTableComposition[$i][2]) && $classRow+1 == substr($s['classes']['class_period'],-1) && $s['preference'] == $r+1){
                                        
                                        
                                        $classCode = $s['classes']['class_code'];
                                        $classSubjects = "";
                                        $classTeachers = "";
                                        foreach($s['subjects'] as $subjects){
                                            $classSubjects=$classSubjects."    ".$subjects;
                                        }


                                        foreach($s['teachers'] as $teachers){
                                            $classTeachers=$classTeachers."    ".$teachers['first_name']." ".$teachers['last_name'];
                                        }
                                        
                                        //echo $s['classes']['class_name'];
                                        $classChosenExists = true;
                                    }

                                }
                                
                                if($classChosenExists == false){

                                    echo "Class Not Chosen!
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    ";
                                }else{
                                
                                echo'

                                        
                                        <div>Class Code: '.$classCode.'</div>
                                        <div>Subjects: '.$classSubjects.'</div>
                                        <div>Teachers: '.$classTeachers.'</div>
                                        <a href="" style="display: grid; justify-content:center; margin-top: 5rem;">Class Information</a>';
                                }
                                echo'
                                    </div>
                                    <div class = "recommendButton">
                                        <div class="material-icons prefix" style = "font-size: 30rem";>check</div>
                                    </div>
                                </div>
                                ';


                                echo "</div>";
                            }
                            echo "</div>";
                        }
                        echo"</div>";
                    }

                    echo "

                    <style>
                    .grid-container {
                        display: grid;
                        grid-template: 400px / ".$classTypeColumnCount.";
                        grid-gap: 10px;
                        padding:10px;
                    }

                    .grid-container > div {
                        //border-style:solid;
                        text-align: center;
                        padding: 20px 0;
                        font-size: 14px;
                    }

                    .classRow {
                        border-style:solid;
                        margin:30px 10px 30px 10px;
                        text-align: left;

                    }

                    </style>


                    ";










                    /*



                    echo "<br><br><br><br><br><br><br><br><br><br><br>";














                    while (sizeof($selections) < $numOfClasses * $numOfChoices){
                        array_push($selections, "ERROR! Class Not Chosen!");
                    }

                    //Formats the Classes
                    $currentClass = 0;
                    foreach ($formatClasses as $classTemplate) {
                        for ($rank = 0; $rank < $numOfChoices; $rank++) {
                            for ($i = 0; $i < $CPYL[strtolower($classTemplate['class_type']).'s'][$yearToQual[$row['year_level']]]; $i++) {
                                $SelectionsObject[$rank][$classTemplate['class_type']][$i] = $selections[$currentClass];
                                $currentClass++;
                            }
                        }
                    }

                    //Creates HTML elements in groups of rank, class type and class.
                    for ($rank = 0; $rank < $numOfChoices; $rank++) { 
                        if ($rank == 0) {
                            echo'
                        <div class = "choice'.($rank+1).' choices currentChoiceSelections" style = "grid-template-rows: repeat('.ceil($numOfClasses/2).', 8em);">
                            ';
                        }
                        else {
                            echo '
                        <div class = "choice'.($rank+1).' choices">

                            ';
                        }
                        foreach ($formatClasses as $classTemplate) {
                            //echo '
                            //<div class = "'.$classTemplate.'">
                            //';
                            
                            for ($i = 0; $i < $CPYL[strtolower($classTemplate['class_type']).'s'][$yearToQual[$row['year_level']]]; $i++) {
                                $choice = $SelectionsObject[$rank][$classTemplate['class_type']][$i];


                                echo '
                                <div class = "'.$choice.' roundedContainer"'; if ($classTemplate['class_type'] == 'MODULE') {echo ' style = "grid-column: 1';} echo ';">
                                    <div class = "roundedHeader">
                                        <h4>'.$classTemplate['class_type'].' '.($i + 1).'</h4>

                                    </div>
                                    <div class = "roundedContent bissectedContainer">
                                        <div>
                                            <div>Class '.$choice.'</div>
                                            <div>Subject subject1 subject2</div>
                                            <a href="" style="display: grid; justify-content:center; margin-top: 5rem;">Class Information</a>
                                        </div>
                                        <div class = "recommendButton">
                                            <div class="material-icons prefix" style = "font-size: 30rem";>check</div>
                                        </div>
                                    </div>
                                </div>

                                ';
                            }
                            //
                            //echo '
                            //</div>';
                            //
                        }
                        echo '
                        </div>';
                    }*/
                    echo '
                    </div>
                    <div style="background-color: #EEEEEE; border: 1px solid #707070;">
                        
                    </div>



                </div>
                <!--application-->
                <div class = "application">
                ';
                
                getApplication($row['id'], $dbconnect);

                echo '
                </div>
            </div>
            ';
            }
            ?>
            </div>
        </div>
    </div>
    
    
    <style>
        html {
            font-family: Tahoma, Geneva, sans-serif; 
        }
        
        #mainGrid {
            grid-template-areas: "pannel selections";
            grid-template-columns: minmax(min-content, 200rem) auto;
            grid-gap: 20rem;
            margin: 2.5vh 2.5vw;
            padding: 2.5vh 2.5vw;
            height: 90vh;
            min-width: 80vw;
        }
        #profile {
            padding: 5rem 5rem 10rem;
            display: grid;
            grid-template-columns: 2em auto;
            grid-gap: 10rem;
            align-items: end;
        }
        .material-icons {
            font-size: 1.5em;
        }
        .studentSelections {
            display: none;
            grid-area: selections;
            
            grid-template-rows: min-content auto auto;

            border: 1px solid #4D4D4D;
            background-color: #FFFFFF;
            width: -webkit-fill-available;
            height: -webkit-fill-available;
        }
        .selectionsHeader {
            display: grid;
            height: 70rem;
            padding: 10rem 10rem 0 10rem;
            align-items: end;
            grid-template: "info space toggles" 70rem/ fit-content(300rem) auto fit-content(200rem);
        }
        .selections {
            overflow: auto;
            border: 1px solid #707070;
            background-color: #EEEEEE;
            display: grid;
            font-size: 12rem;
        }
        .studentSelections.currentStudentSelections {
            display: grid;
        }
        .selections > .choices {

            /*
            Previous method which displays modules and spins separately.
            display: none;
            grid-template-rows: fit-content(10px);
            grid-template-columns: repeat(auto-fill, 300rem);
            grid-gap: 20rem;
            */
            /*
            display: none;
            flex-direction: column;
            flex-wrap: wrap;
            height: 400rem;
            */
            /*
            display: none;
            grid-auto-flow: column;
            grid-template-rows: fit-content(10px);
            grid-template-columns: repeat(auto-fill, 200rem);
            grid-gap: 20rem;
            */
            display: none;
            grid-auto-flow: column dense;
            grid-template-areas: "module spin""module spin";
            grid-template-columns: max-content max-content;
            grid-gap: 20rem;
            height: fit-content;
            width: fit-content;
            margin: auto;
        }
        .selections > .choices > div {
            height: auto;
            display: grid;
            grid-gap: 2rem;
        }
        .choices h4 {
            margin: 5rem 0;
        }
        .choices.currentChoiceSelections {
            /*
            First method which displays modules and spins separately.
            display: grid
            */
            /*
            Second method dispalys modules and spins one after the over without separation
            display: flex
            */
            display: grid;
        }
        .choiceToggles {
            display: flex;
        }
        .toggleChoice {
            display: block;
            border: 1px solid #4D4D4D;
            background-color: #EEEEEE;
            border-bottom-width: 0;
            height: 50rem;
            width: 70rem;

        }
        .recommendButton {
            width: 40rem; 
            display: flex; 
            align-self: center; 
            justify-content: center;
        }
        .recommendButton > div{
            border: 1px solid #4D4D4D;
            border-radius: 50rem;
        }

        .application {
            margin: 2%;
            padding: 5rem;
            background-color: #EEEEEE;
            border: 1px solid #4D4D4D;
        }
    </style>
    <script>

    function hideTables(except,student) { //preference
        for(let i=1; i<4; i++){
            document.getElementById("selectionsTableChoice"+i+student).style.display = "none";
        }
        document.getElementById("selectionsTableChoice"+except+student).style.display = "";
    } 
    function displayTabs(e, group, content) {
        // console.log("click");
        // console.log(group);
        // console.log(content);
        //unsets current content
        let elements = document.getElementsByClassName(group);
        //The i++ term was left out as the HTML element decreases in length itself.
        for (let i = 0; i < elements.length; i) {
            // console.log(elements);
            // console.log(elements[i]);
            elements[i].className = elements[i].className.replace(" "+group, "");
        }
        //sets selected content as current content
        let contentEls, arr;
        contentEls = document.getElementsByClassName(content);
        for (let i = 0; i < contentEls.length; i++) {
            arr = contentEls[i].className.split(" ");
            if (arr.indexOf(group) == -1) {
                contentEls[i].className += " " + group;
            }
        }
        
    }
    </script>
    <script>
        els = document.getElementsByClassName("coverageCheck");
            for(let i=0; i<els.length; i++){
                var bigFatVariable = i
                if(bigFatVariable % 3 == 0){
                    //<div class="material-icons">check</div>
                        el = els[i];
                        div = el.getElementsByClassName("material-icons")[0];
                        div.innerHTML = "check";
                        div.style = "margin-left:-10%;"
                        console.log(div);


                }else if(bigFatVariable % 3 == 1){
                    //<div class="material-icons">clear</div>
                        el = els[i];
                        el.style = "background-color: #e03a2a;";
                        div = el.getElementsByClassName("material-icons")[0];
                        div.style = "margin-left:-5%; margin-top:-5%;"
                        div.innerHTML = "clear";
                        console.log(div);
                }else{
                        el = els[i];
                        el.style = "background-color: #ffa500;";
                        div = el.getElementsByClassName("material-icons")[0];
                        div.style = "color: #ffffff; margin-left:30%; margin-top:-25%;";

                        div.innerHTML = "!";
                        console.log(div);

                }


            }

        

    </script>

</body>
</html>