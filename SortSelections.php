<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sort Selections</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="Styles/main.css">
    <!--<link rel="stylesheet" type="text/css" href="Styles/CreateClassesStyle.css">-->
    <link rel="stylesheet" type="text/css" href="Styles/nav.css">
    <link rel="stylesheet" type="text/css" href="Styles/searchPannel.css">
    <link rel="stylesheet" type="text/css" href="Styles/scrollPannel.css">
    <link rel="stylesheet" type="text/css" href="Styles/subjectsKey.css">
  
    <?php
        include "DataBase/Databaseconnect.php";
        include "PhpSnippets/classesConstants.php";
    ?>
</head>
<body>
    <?php
        include ('PhpSnippets/headerBar.php');	
    ?>
    <div id="main">
        <div id ="mainGrid">
            <div id="yearGroups" style="grid-area: years; display: flex;">
                <button class="YearGroupTabLinks selected" onclick="changeYearLevel(event, 'FF')">
                    FF
                </button>
                <button class="YearGroupTabLinks" onclick="changeYearLevel(event, 'Q1')">
                    Q1
                </button>
                <button class="YearGroupTabLinks" onclick="changeYearLevel(event, 'Q2')">
                    Q2
                </button>
                <button class="YearGroupTabLinks" onclick="changeYearLevel(event, 'Q3')">
                    Q3
                </button>
            </div>
            <div id="subjects">
                <div class="TECH">Tech</div>
                <div class="LANGUAGE">Language</div>
                <div class="SOCSCIENCE">SS</div>
                <div class="ENGLISH">English</div>
                <div class="MATH">Maths</div>
                <div class="SCIENCE">Science</div>
                <div class="ART">Arts</div>
                <div class="HPE">HPE</div>
            </div>
            <!--<div id="topborder" style="grid-area: border; background-color: transparent; border: none"> 
                <div style="grid-area: no-border; background-color: transparent;">
                
                </div>
                <div style="grid-area: border; border-top: 1px solid #4D4D4D; border-right: 1px solid #4D4D4D;">
                </div>
            </div>-->
            <div id="toolBar" style="grid-area: bar;"> 
            
            </div>
            <?php
                foreach ($yearGroups as $yearGroup) {
                    //$yearGroups will output a string while the database as organised numbers from 0 to 3.
                    echo '
            <div id="'.$yearGroup.'" class="yearGroupTab">
                <div class="searchPannel">
                    <div class="sectionHeader TSTHeader">
                        <p style="grid-area: title;"><strong>Students</strong></p>
                        <div class="searchBar" style="grid-area: textArea;">
                            <div class="material-icons prefix">search</div>
                            <input value="" class="search" type="text" placeholder="Filter students">
                            <!--<textarea name="searchArea" class="search" rows="1"></textarea>-->
                        </div>
                    </div>
                    <div class="scrollPannel">
                    ';
                    $query = "select FIRST_NAME, LAST_NAME from students where YEAR_LEVEL = ".$yearLevel[$yearGroup].";";
                    $result = mysqli_query($dbconnect, $query);
                    while ($row = mysqli_fetch_array($result)){
                        echo '
                        <div class="student '.$row['FIRST_NAME'].'-'.$row['LAST_NAME'].'">
                            <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                            <p>'.$row['FIRST_NAME'].' '.$row['LAST_NAME'].'</p>
                            <div class="coverageCheck">
                                <div class="material-icons">check</div>
                            </div>
                        </div>
                        ';
                    }
                    echo '
                                
                        <!--
                        <div class="student 1">
                            <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                            <p>Student 1</p>
                            <div class="coverageCheck">
                                <div class="material-icons">check</div>
                            </div>
                        </div>
                        <div class="student 1">
                            <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                            <p>Student 1</p>
                            <div class="coverageCheck">
                                <div class="material-icons">check</div>
                            </div>
                        </div>
                        -->
                    </div>
                </div>
                <div class="hidePannel" onclick="hideSearchPannel(event)" style="grid-area: hidePannel;">
                    <p><<</p>
                </div>
                    
                <div class="sortingSection" style="grid-area: sort;"> 
                    <div class="periods">';
                foreach (['module', 'spin'] as $classType) {
                    $moduleCount = 	$CPYL[$classType.'s'][$qual[$yearGroup]];
                    for ($i = 1; $i <= $moduleCount; $i++) {
                        echo '
                        <div class="period '.$classType.$i.'">
                            <div class="periodTitle"><h2>'.strtoupper($classType).' '.$i.'</h2></div>
                            <div class="classes">
                            ';
                            $query = "select CODE, TYPE, SUBJECT1, SUBJECT2 from classes where qual = ".$qual[$yearGroup]." and type = '".strtoupper($classType).$i."'";
                            $result = mysqli_query($dbconnect, $query);
                            
                            while ($row = mysqli_fetch_array($result)){
                                echo '
                                <div class="'.$row["CODE"].' '.$row["SUBJECT1"].' '.$row["SUBJECT2"].'">
                                    <div class="classHeader">
                                        <h3>'.$row["CODE"].'</h3>
                                        <div class="subjects">';
                                        foreach (explode(" ",strtoupper($row["SUBJECT1"])) as $subject ) {
                                            if ($subject != "") {
                                                echo '
                                                <div class="subject '.$subject.'"></div>
                                                ';
                                            }
                                        }
                                        foreach (explode(" ",strtoupper($row["SUBJECT2"])) as $subject ) {
                                            if ($subject != "") {
                                            echo '
                                            <div class="subject '.$subject.'"></div>
                                            ';
                                            }
                                        }

                                        echo '
                                        </div>
                                    </div>
                                    <div class="students drag-item-container">
                                        <!-- temporary placeholder draggable items-->
                                        <div class ="student drag-item"> 

                                        </div>
                                    </div>
                                </div>
                                ';
                            }
                            echo '
                            </div>
                        </div>';
                            }
                    }
                echo '
                    </div>
                </div>
            </div>
            ';
            }
            ?>
                </div>
                <!--
                <div id="FF" class="yearGroupTab">
                    <div class="periods">
                    <div class="periodTitle"><h2>Module 1</h2></div>
                        <div class="classes">
                            <div class="class1">
                                <div class="classHeader">
                                    <h3>SCAMANDER</h3>
                                </div>
                                <div class="students"></div>
                            </div>
                            <div class="class2">
                                <div class="classHeader">
                                    <h3>SURVIVE</h3>
                                </div>
                                <div class="students">
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="periodTitle"><h2>Module 2</h2></div>
                        <div class="classes">
                            <div class="class1">
                                <div class="classHeader">
                                    <h3>SCAMANDER</h3>
                                </div>
                                <div class="students"></div>
                            </div>
                            <div class="class2">
                                <div class="classHeader">
                                    <h3>SURVIVE</h3>
                                </div>
                                <div class="students">
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="periodTitle"><h2>Module 3</h2></div>
                        <div class="classes">
                            <div class="class1">
                                <div class="classHeader">
                                    <h3>SCAMANDER</h3>
                                </div>
                                <div class="students">
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                </div>
                            </div>
                            <div class="class2">
                                <div class="classHeader">
                                    <h3>SURVIVE</h3>
                                </div>
                                <div class="students">
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                    <div class="student 1">
                                        <img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                        <p>Student 1</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="Q1" class="yearGroupTab">
                    <div class="periods">
                        <div class="periodTitle"><h2>Module 1</h2></div>
                            <div class="classes">
                                <div class="class1">
                                    <div class="classHeader">
                                        <h3>SCAMANDER</h3>
                                    </div>
                                    <div class="students">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="Q2" class="yearGroupTab">
                    <div class="periods">
                        <div class="periodTitle"><h2>Module 1</h2></div>
                            <div class="classes">
                                <div class="class1">
                                    <div class="classHeader">
                                        <h3>SCAMANDER</h3>
                                    </div>
                                    <div class="students">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="Q3" class="yearGroupTab">
                    <div class="periods">
                        <div class="periodTitle"><h2>Module 1</h2></div>
                            <div class="classes">
                                <div class="class1">
                                    <div class="classHeader">
                                        <h3>SCAMANDER</h3>
                                    </div>
                                    <div class="students">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                -->
            </div>
        </div>
        <div></div>
        <style>
            html {
                font-family: Tahoma, Geneva, sans-serif; 
            }
            #main {
                
            }
            #mainGrid {
                grid-template: 
                "years . sub" 50rem
                /*"border border border" 1px*/
                "bar bar bar" 50rem
                "sort sort sort" auto
                /minmax(min-content, 200rem) auto  336px;
                column-gap: 10rem;
                row-gap: 0;
                margin: 2.5vh 2.5vw;
                padding: 2.5vh 2.5vw;
                height: 90vh;
            }
            div#yearGroups {
                width: auto;
            }
            #yearGroups > button {
                font-size: 1em;
                font-family: inherit;
                flex-grow: 1;
                background-color: #EEEEEE;
                border: 1px solid #4D4D4D;
                text-align: -webkit-center;
                height: 51.45rem;

                display: flex;
                flex-direction: column;
                justify-content: center;

                outline: none;
                cursor: pointer;
                transition: 0.3s;
                
                z-index: 1;
            }
            #yearGroups > button.selected{
                height: 51.45rem;
                border-bottom-width: 0;
                background-color: #FFFFFF;
            }
            .yearGroupTab {
                display: none;
                background-color: #FFFFFF;
                grid-area: sort;
                overflow-y: hidden;
                grid-template: 
                "pannel hidePannel sort" 100% / fit-content(10em) 1.25em auto;
            }
            .yearGroupTab > div {
                box-sizing: border-box;
            }
            div#topborder {
                display: grid;

                width: auto;
                height: auto;
                border: 1px solid #4D4D4D;
                border-top-width: 0;
                background-color: #FFFFFF;
                align-content: start;

                grid-template: 
                "no-border border border" auto/ minmax(84.48px, 240px) auto 336px;

            }
            #toolBar {
                background-color: #FFFFFF;
                border: 1px solid #4D4D4D;
                /*border-top: none;*/
            }
            .material-icons {
                font-size: 1.5em;
            }
            div.student {
                margin: 2px 0;
                display: flex;
                align-items: center;
                justify-content: space-between;
                width: 90%;
                height: 1.25em;
                border-radius: 1em;    
                padding: 0 2.5px;
                background-color: #FFFFFF;
                border: 1px solid #4D4D4D;     
            }
            .coverageCheck {
                color: #FFFFFF;
                width: 16rem;
                height: 16rem;
                border-radius: 50%;
                background-color: #40F364;  
                font-size: 0.75em;  
            }
            .classes > div {
                
                background-color: #F8F8F8;
            }
            .sortingSection {
                display: grid;
                background-color: #EEEEEE;
                border: 1px solid #4D4D4D;
                border-top: none;
                overflow-y: scroll;
                height: auto;

            }
            .periods {
                display: grid;
                grid-gap: 1em;
            }
            .period {
                padding: 0.5em 0;
                background-color: #FFFFFF;
                display: grid;
                grid-template-columns: 4em auto;
            }
            /*.period:nth-child(even) {
                background-color: #FAFAFA;
            }
            */
            .periodTitle {
                display: flex;
                align-self: center;
                text-align: center;
                word-break: break-all;
                font-size: 2em;

                background-color: #EEEEEE;
                border: 1px solid #4D4D4D; 
                
                margin: 0 0 0 5rem;
                padding: 0 5rem;
                height: 480rem;
                width: auto;
            }
            .classes {
                display: grid;
                margin: 0 0.5em 0 0.5em;
                grid-gap: 5px;
                grid-template-areas: none;
                grid-template-rows: fit-content(20em);
                grid-template-columns: repeat(auto-fit, 10em);
                /*overflow-x: scroll;*/
            }
            .classes > div {
                display: grid;
                width: auto;
                height: 470rem;
                padding: 5px;
                border: 1px solid #4D4D4D; 
                border-radius: 0.5em;
                grid-template-rows: min-content auto;
                grid-gap: 2px;
            }
            .classHeader {
                display: grid;
                background-color: #ECECEC;
                border-top-left-radius: 0.5em;
                border-top-right-radius: 0.5em;
                margin: -5px -5px 0 -5px;
                padding: 10rem 0.5em;
                height: 40rem;
                text-align: center;
                grid-template-columns: auto 10rem;
            }
            .classHeader > h3{
                margin: auto;
            }
            .classHeader .subjects {
                display: flex;
                flex-direction: column;
                justify-content: space-evenly;
            }
            .classHeader .subject {
                border-radius: 10rem;
                width: 10rem;
                height: 10rem;
            }
            div.drag-item {
                z-index: 10;
                width: 90%;
                height: 1.25em;
                cursor: pointer; 
            }
            /* div.drag-location {
                width: 90%;
                height: 1.25em;
                margin: 10rem 0;
            }
            div.drag-location-over {
                background-color: #0000;
                border: 2rem solid #F44336;
                border-radius: 50rem;
            } */
            div.drag-item-container {
            }
            div.drag-item-container-over {
                background-color: #303030;
                
            }


            </style>
    </div>
    <script src="Scripts/DragAndDrop.js"></script>
    <script>


    document.getElementById("FF").style.display = "grid";
    function changeYearLevel(e, yearLevel) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="yearGroupTab" and hide them
        tabcontent = document.getElementsByClassName("yearGroupTab");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("YearGroupTabLinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" selected", "");
        }

        // Show the current tab, and add an "active" class to the link that opened the tab
        document.getElementById(yearLevel).style.display = "grid";
        e.currentTarget.className += " selected";
    }
    function hideSearchPannel(e) {

        //hides pannel
        var pannels = document.getElementsByClassName("searchPannel");

        for (x in pannels) {
            if (x != 'length' & x != 'item' & x != "namedItem") {
                if (pannels[x].style.display == "") {
                    pannels[x].style.display = "none";
                    e.target.firstElementChild.innerHTML = ">>";
                }
                else if (pannels[x].style.display == "grid") {
                    pannels[x].style.display = "none";
                    e.target.firstElementChild.innerHTML = ">>";
                }
                else if (pannels[x].style.display == "none") {
                    pannels[x].style.display = "grid";
                    e.target.firstElementChild.innerHTML = "<<";
                }
            }
        }
    }
    </script>
</body>
</html>