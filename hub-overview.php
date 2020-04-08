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
                    echo '
                    <div class = "choiceToggles" style = "grid-area: toggles">
                        <div class="toggleChoice choice1'.'" onclick = "displayTabs(event, '."'".'currentChoiceSelections'."', '".' choice1'."'".')">1st</div>
                        <div class="toggleChoice choice2'.'" onclick = "displayTabs(event, '."'".'currentChoiceSelections'."', '".' choice2'."'".')">2nd</div>
                        <div class="toggleChoice choice3'.'" onclick = "displayTabs(event, '."'".'currentChoiceSelections'."', '".' choice3'."'".')">3rd</div>
                    </div>
                </div>
                <div style="display:  grid; grid-template-columns: 78% 20%; grid-gap: 2%; margin: 2%; margin-bottom: 0;">
                    <div class = "selections">
                    ';
                    $selections = explode(" ", $row["SELECTIONS_M&S"]);

                    //Displays choices based off the SELECTIONS_M&S database result.
                    $SelectionsObject = [];
                    $numOfClasses = $CPYL['modules'][$yearToQual[$row['year_level']]] + $CPYL['spins'][$yearToQual[$row['year_level']]];
                    $numOfChoices = 3;

                    while (sizeof($selections) < $numOfClasses * $numOfChoices){
                        array_push($selections, "ERROR! Class Not Chosen!");
                    }

                    //Formats the Classes
                    $currentClass = 0;
                    foreach (['module', 'spin'] as $classType) {
                        for ($rank = 0; $rank < $numOfChoices; $rank++) {
                            for ($i = 0; $i < $CPYL[$classType.'s'][$yearToQual[$row['year_level']]]; $i++) {
                                $SelectionsObject[$rank][$classType][$i] = $selections[$currentClass];
                                $currentClass++;
                            }
                        }
                    }

                    //Creates HTML elements in groups of rank class type and class.
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
                        foreach (['module', 'spin'] as $classType) {
                            /*echo '
                            <div class = "'.$classType.'">
                            ';
                            */
                            for ($i = 0; $i < $CPYL[$classType.'s'][$yearToQual[$row['year_level']]]; $i++) {
                                $choice = $SelectionsObject[$rank][$classType][$i];


                                echo '
                                <div class = "'.$choice.' roundedContainer"'; if ($classType == 'module') {echo ' style = "grid-column: 1';} echo ';">
                                    <div class = "roundedHeader">
                                        <h4>'.$classType.' '.($i + 1).'</h4>

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
                            /*
                            echo '
                            </div>';
                            */
                        }
                        echo '
                        </div>';
                    }
                    echo '
                    </div>
                    <div style="background-color: #EEEEEE; border: 1px solid #707070;">
                        
                    </div>


                </div>
                <div class = "application">
                ';
                
                getApplication($row['ID'], $dbconnect);

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