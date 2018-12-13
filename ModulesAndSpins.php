<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HPSS Class Selections</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" media="screen" href="Styles/buttons.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="Styles/StudentClassSelect.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="Styles/nav.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="Styles/main.css" />

    <script src="Scripts/main.js"></script>
    <script src="Scripts/SubmitSelections.js"></script>

</head>
<body>
	<?php
        include ('PhpSnippets/headerBar.php');
        include ('DataBase/Databaseconnect.php');
        include ('PhpSnippets/classesConstants.php');
        $Qual = isset($_GET["Qual"]) ? $_GET["Qual"]: 0;
        $moduleCount = 	$CPYL['modules'][$Qual];
        $spinCount =    $CPYL['spins'][$Qual];
        echo "<script> 
        var qual = $Qual;
        console.log('$Qual');</script>
        ";

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
            <div id="CurriculumCoverage">
                <div id="CurriculumBar" class="CurriculumBar HeaderBar">
                    <div class="HeaderBarTitle">
                        <div class="Title">
                            Curriculum Coverage
                        </div>
                    </div>
                    <div class="CurriculumSubjects Subjects">
                        <div>Maths</div>
                        <div>English</div>
                        <div>Science</div>
                        <div>Social Science</div>
                        <div>Technology</div>
                        <div>HPE</div>
                        <div>Arts</div>
                        <div>Languages</div>
                    </div>
                </div>

                <!-- 1st Choices -->
                <!-- Tally Chart -->
                <div id="FirstChoices">
                    <div class="TallyBar">
                        <div class="HeaderBarTitle">
                            <div class="PriorityDropdownButton"><div class="DropdownButton"></div></div>
                            <div class= "Priority BarTitle">
                                1st choices
                            </div>
                        </div>

                        <div class="TallySubjects Subjects">
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
                    <!-- Template chosen courses -->
                    <div class='DropdownClasses'>
                        <div class='Module1'>
                        </div>

                        <div class='Module2'>
                        </div>

                        <div class='Spin1'>
                        </div>

                        <div class='Spin2'>
                        </div>
                        <!-- I need to reformat these examples so that they have working unselect buttons
                        <div class='Module1'>
                            <div class="ClassBar HeaderBar">
                                <div class="HeaderBarTitle">
                                    <div class="DropdownButton ClassesDropdownButton"></div>
                                    <div class="ClassCode BarTitle">
                                        M1EXMP1
                                    </div>
                                </div>
                                <div class="ClassSubjects Subjects">
                                    <div>Maths</div>
                                    <div>English</div>
                                    <div>Science</div>
                                    <div>Social Science</div>
                                    <div>Technology</div>
                                    <div>HPE</div>
                                    <div>Arts</div>
                                    <div>Languages</div>
                                </div>
                            </div>
                            <div class="ClassDropdownDescription">
                                <div id="Name">Module 1 Exemplar 1</div>
                                <div id="Teachers">Teacher 1 & Teacher 2</div>
                                <div id="Inputs">
                                    <button>Select</button>
                                    <button>Dismiss</button>
                                </div>
                                <div id="NCEA">
                                    Filler Text: Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah
                                </div>
                                <div id="Description">
                                    Filler Text Filler Text Filler Text Filler Text
                                </div>
                            </div>
                        </div>

                        <div class='Module2'>
                            <div class="ClassBar HeaderBar">
                                <div class="HeaderBarTitle">
                                    <div class="DropdownButton ClassesDropdownButton"></div>
                                    <div class="ClassCode BarTitle">
                                        M2EXMP1
                                    </div>
                                </div>
                                <div class="ClassSubjects Subjects">
                                    <div>Maths</div>
                                    <div>English</div>
                                    <div>Science</div>
                                    <div>Social Science</div>
                                    <div>Technology</div>
                                    <div>HPE</div>
                                    <div>Arts</div>
                                    <div>Languages</div>
                                </div>
                            </div>
                            <div class="ClassDropdownDescription">
                                <div id="Name">Module 2 Exemplar 1</div>
                                <div id="Teachers">Teacher 1 & Teacher 2</div>
                                <div id="Inputs">
                                    <button>Select</button>
                                    <button>Dismiss</button>
                                </div>
                                <div id="NCEA">
                                    Filler Text: Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah
                                </div>
                                <div id="Description">
                                    Filler Text Filler Text Filler Text Filler Text
                                </div>
                            </div>
                        </div>

                        <div class='Spin1'>
                            <div class="ClassBar HeaderBar">
                                <div class="HeaderBarTitle">
                                    <div class="DropdownButton ClassesDropdownButton"></div>
                                    <div class="ClassCode BarTitle">
                                        S1EXMP1
                                    </div>
                                </div>
                                <div class="ClassSubjects Subjects">
                                    <div>Maths</div>
                                    <div>English</div>
                                    <div>Science</div>
                                    <div>Social Science</div>
                                    <div>Technology</div>
                                    <div>HPE</div>
                                    <div>Arts</div>
                                    <div>Languages</div>
                                </div>
                            </div>
                            <div class="ClassDropdownDescription">
                                <div id="Name">Spin 1 Exemplar 1</div>
                                <div id="Teachers">Teacher 1 & Teacher 2</div>
                                <div id="Inputs">
                                    <button>Select</button>
                                    <button>Dismiss</button>
                                </div>
                                <div id="NCEA">
                                    Filler Text: Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah
                                </div>
                                <div id="Description">
                                    Filler Text Filler Text Filler Text Filler Text
                                </div>
                            </div>
                        </div>

                        <div class='Spin2'>
                            <div class="ClassBar HeaderBar">
                                <div class="HeaderBarTitle">
                                    <div class="DropdownButton ClassesDropdownButton"></div>
                                    <div class="ClassCode BarTitle">
                                        S2EXMP1
                                    </div>
                                </div>
                                <div class="ClassSubjects Subjects">
                                    <div>Maths</div>
                                    <div>English</div>
                                    <div>Science</div>
                                    <div>Social Science</div>
                                    <div>Technology</div>
                                    <div>HPE</div>
                                    <div>Arts</div>
                                    <div>Languages</div>
                                </div>
                            </div>
                            <div class="ClassDropdownDescription">
                                <div id="Name">Spin 2 Exemplar 1</div>
                                <div id="Teachers">Teacher 1 & Teacher 2</div>
                                <div id="Inputs">
                                    <button>Select</button>
                                    <button>Dismiss</button>
                                </div>
                                <div id="NCEA">
                                    Filler Text: Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah
                                </div>
                                <div id="Description">
                                    Filler Text Filler Text Filler Text Filler Text
                                </div>
                            </div>
                        </div>
                        -->
                    </div>
                </div>
                <!-- 2nd Choices -->
                <!-- Tally Chart -->
                <div id="SecondChoices">
                    <div class="TallyBar">
                        <div class="HeaderBarTitle">
                            <div class="PriorityDropdownButton"><div class="DropdownButton"></div></div>
                            <div class= "Priority BarTitle">
                                2nd choices
                            </div>
                        </div>

                        <div class="TallySubjects Subjects">
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
                    <!-- Template chosen courses -->
                    <div class='DropdownClasses'>
                        <div class='Module1'>
                        </div>

                        <div class='Module2'>
                        </div>

                        <div class='Spin1'>
                        </div>

                        <div class='Spin2'>
                        </div>
                    </div>
                </div>
                <!-- 3rd Choices -->
                <!-- Tally Chart -->
                <div id="ThirdChoices">
                    <div class="TallyBar">
                        <div class="HeaderBarTitle">
                            <div class="PriorityDropdownButton"><div class="DropdownButton"></div></div>
                            <div class= "Priority BarTitle">
                                3rd choices
                            </div>
                        </div>

                        <div class="TallySubjects Subjects">
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
                    <!-- Template chosen courses -->
                    <div class='DropdownClasses'>
                        <div class='Module1'>
                        </div>

                        <div class='Module2'>
                        </div>

                        <div class='Spin1'>
                        </div>

                        <div class='Spin2'>
                        </div>
                    </div>

                </div>
            </div>



            <?php
                //if I wanted tp use radio inputs instead of my custom made select and dismiss buttons.
                //<input type='radio' name='selectModule$i' value='$row[CODE]'> test

                //--Modules--
                for ($i = 1; $i <= $moduleCount; $i++) {
                    $query = "select CODE, NAME, TYPE, SUBJECT1, SUBJECT2, TEACHER1, TEACHER2, DESCRIPTION from classes where qual = $Qual and type = 'MODULE$i'";
                    $result = mysqli_query($dbconnect, $query);

                    echo"
                        <div id ='Module$i'>
                            <div "/*id='Module$i"."Bar' */. "class='PeriodBar HeaderBar'>
                                <div class='HeaderBarTitle'>
                                    <div class='PeriodDropdownButton'><div class='DropdownButton'></div></div>
                                    <div class='PeriodName BarTitle'>Module $i</div>
                                </div>
                                <div class='PeriodSubjects Subjects'>
                                    <div>Maths</div>
                                    <div>English</div>
                                    <div>Science</div>
                                    <div>Social Science</div>
                                    <div>Technology</div>
                                    <div>HPE</div>
                                    <div>Arts</div>
                                    <div>Languages</div>
                                </div>
                            </div>
                            <div class='SelectedClasses'>
                                <div class='FirstChoice'><div></div></div>
                                <div class='SecondChoice'><div></div></div>
                                <div class='ThirdChoice'><div></div></div>
                            </div>
                            <div class='DropdownClasses'>
                    ";
                    //echo mysqli_query($dbconnect,"SELECT * FROM classes");
                    while ($row = mysqli_fetch_array($result)){
                        $subjects = [$row['SUBJECT1'],$row['SUBJECT2']];
                        echo"
                            <div class='Course'>
                                <div class='ClassBar HeaderBar'>
                                    <div class='HeaderBarTitle'>
                                        <div class='ClassDropdownButton'><div class='DropdownButton'></div></div>
                                        <div class='ClassCode BarTitle'>
                                            $row[CODE]
                                        </div>
                                    </div>
                                    <div class='ClassSubjects Subjects'>";
                                        foreach($curriculum as $subject => $blah) {
                                            if (in_array($subject, $subjects)){
                                                echo "<div class = 'SubjectOfClass'>$subject</div>";
                                            }
                                            else {
                                                echo "<div>$subject</div>";
                                            }
                                        }
                                        echo "
                                    </div>
                                </div>
                                <div class='ClassDropdownDescription'>
                                    <div id='Name'>$row[NAME]</div>
                                    <div id='Teachers'>$row[TEACHER1] $row[TEACHER2]</div>
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
                                        <div>
                                            $row[DESCRIPTION]
                                        </div>
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
                            
                    }
                    echo"
                        </div>
                        </div>";
                }
                //--spins--
                for ($i = 1; $i <= $spinCount; $i++) {
                    $query = "select code, name, type, SUBJECT1, TEACHER1, TEACHER2, DESCRIPTION from classes where qual = $Qual and type = 'SPIN$i'";
                    $result = mysqli_query($dbconnect, $query);

                    echo"
                        <div id ='Spin$i'>
                            <div "/*id='Spin$i"."Bar' */."class='PeriodBar HeaderBar'>
                                <div class='HeaderBarTitle'>
                                    <div class='PeriodDropdownButton'><div class='DropdownButton'></div></div>
                                    <div class='PeriodName BarTitle'>Spin $i</div>
                                </div>
                                <div class='PeriodSubjects Subjects'>
                                    <div>Maths</div>
                                    <div>English</div>
                                    <div>Science</div>
                                    <div>Social Science</div>
                                    <div>Technology</div>
                                    <div>HPE</div>
                                    <div>Arts</div>
                                    <div>Languages</div>
                                </div>
                            </div>
                            <div class='SelectedClasses'>
                            <div class='FirstChoice'><div></div></div>
                            <div class='SecondChoice'><div></div></div>
                            <div class='ThirdChoice'><div></div></div>
                            </div>
                            <div class='DropdownClasses'>
                    ";
                    //echo mysqli_query($dbconnect,"SELECT * FROM classes");
                    while ($row = mysqli_fetch_array($result)){
                        $subjects = [$row['SUBJECT1']];
                        echo"
                            <div class='Course'>
                                <div class='ClassBar HeaderBar'>
                                    <div class='HeaderBarTitle'>
                                        <div class='ClassDropdownButton'><div class='DropdownButton'></div></div>
                                        <div class='ClassCode BarTitle'>
                                            $row[code]
                                        </div>
                                    </div>
                                    <div class='ClassSubjects Subjects'>";
                                        foreach($curriculum as $subject => $blah) {
                                            if (in_array($subject, $subjects)){
                                                echo "<div class = 'SubjectOfClass'>$subject</div>";
                                            }
                                            else {
                                                echo "<div>$subject</div>";
                                            }
                                        }
                                        echo "
                                    </div>
                                </div>
                                <div class='ClassDropdownDescription'>
                                    <div id='Name'>$row[name]</div>
                                    <div id='Teachers'>$row[TEACHER1]</div>
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
                                        <div>
                                            $row[DESCRIPTION]
                                        </div>
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
                    }
                    echo"
                        </div>
                    </div>";
                }

            ?>
            <div id="Application">
                <div>
                    If a class required a application please fill out on here.
                </div>
                <textarea>

                </textarea>
                <input id="submitSelections" type="submit" onclick="if(event.preventDefault) event.preventDefault(); submitSelections('M/S');" disabled>
                <a href="DataBase/SubmitSelections.php?data=classes">Click here to download the EXCEL CSV file</a><br>
            </div>
        </div>
    </article>

    <!--Scripts-->
    <script src="Scripts/CurriculumCoverage.js"></script>
    <script src="Scripts/DropDownBtn.js"></script>
    <script src="Scripts/Select.js"></script>
    <script src="Scripts/Dismiss.js"></script>

</body>
</html>
