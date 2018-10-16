<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HPSS Class Selections</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" media="screen" href="Styles/buttons.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="Styles/index.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="Styles/nav.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="Styles/Main.css" />
    <script src="Scripts/main.js"></script>

</head>
<body>
	<?php 
        include ('HtmlSnippets/headerBar.html');	
        include ('DataBase/Databaseconnect.php');
        $Qual = 1;
        switch ($Qual) {
            case 0:
                $moduleCount = 	3;
                $spinCount = 3;
                break;
            case 1:
                $moduleCount = 	2;
                $spinCount = 2;
                break;
            case 2:
                $moduleCount = 	1;
                $spinCount = 3;
                break;
            case 3:
                $moduleCount = 	0;
                $spinCount = 5;
        }
	?>
        
    <article id="main">
        <div id="mainGrid">
            <div id ="decription"> 
                
            </div>
            <!--Curriculum Tally Chart-->
            <!-- -->
            <div id="CurriculumCoverage"> 
                <div id="CurriculumBar" class="CurriculumBar HeaderBar">
                    <div class="HeaderBarTitle">
                        <div class="Title">
                            Curriculum Coverage
                        </div>
                    </div>
                    <div class="CurriculumSubjects Subjects">
                        <div><p>Maths</p></div>
                        <div><p>English</p></div>
                        <div><p>Science</p></div>
                        <div><p>Social Science</p></div>
                        <div><p>Technology</p></div>
                        <div><p>HPE</p></div>
                        <div><p>Arts</p></div>
                        <div><p>Languages</p></div>
                    </div>
                </div>

                <div class="priority"> 
                    <div class="HeaderBarTitle">
                        <div class= "Title">
                            1st choices
                        </div>
                    </div>

                    <div class="PrioritySubjects Subjects">
                        <div><p>Maths</p></div>
                        <div><p>English</p></div>
                        <div><p>Science</p></div>
                        <div><p>Social Science</p></div>
                        <div><p>Technology</p></div>
                        <div><p>HPE</p></div>
                        <div><p>Arts</p></div>
                        <div><p>Languages</p></div>
                    </div>
                </div>                   
                <div>
                    <div>
                        <div class="ClassBar HeaderBar">
                            <div class="HeaderBarTitle">
                                <div class="DropdownButton ClassesDropdownButton"></div>
                                <div class="ClassCode BarTitle">
                                    M1EXMP1
                                </div>
                            </div>
                            <div class="ClassSubjects Subjects">
                                <div><p>Maths</p></div>
                                <div><p>English</p></div>
                                <div><p>Science</p></div>
                                <div><p>Social Science</p></div>
                                <div><p>Technology</p></div>
                                <div><p>HPE</p></div>
                                <div><p>Arts</p></div>
                                <div><p>Languages</p></div>
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

                    <div>
                        <div class="ClassBar HeaderBar">
                            <div class="HeaderBarTitle">
                                <div class="DropdownButton ClassesDropdownButton"></div>
                                <div class="ClassCode BarTitle">
                                    M2EXMP1
                                </div>
                            </div>
                            <div class="ClassSubjects Subjects">
                                <div><p>Maths</p></div>
                                <div><p>English</p></div>
                                <div><p>Science</p></div>
                                <div><p>Social Science</p></div>
                                <div><p>Technology</p></div>
                                <div><p>HPE</p></div>
                                <div><p>Arts</p></div>
                                <div><p>Languages</p></div>
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

                    <div>
                        <div class="ClassBar HeaderBar">
                            <div class="HeaderBarTitle">
                                <div class="DropdownButton ClassesDropdownButton"></div>
                                <div class="ClassCode BarTitle">
                                    S1EXMP1
                                </div>
                            </div>
                            <div class="ClassSubjects Subjects">
                                <div><p>Maths</p></div>
                                <div><p>English</p></div>
                                <div><p>Science</p></div>
                                <div><p>Social Science</p></div>
                                <div><p>Technology</p></div>
                                <div><p>HPE</p></div>
                                <div><p>Arts</p></div>
                                <div><p>Languages</p></div>
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

                    <div>
                        <div class="ClassBar HeaderBar">
                            <div class="HeaderBarTitle">
                                <div class="DropdownButton ClassesDropdownButton"></div>
                                <div class="ClassCode BarTitle">
                                    S2EXMP1
                                </div>
                            </div>
                            <div class="ClassSubjects Subjects">
                                <div><p>Maths</p></div>
                                <div><p>English</p></div>
                                <div><p>Science</p></div>
                                <div><p>Social Science</p></div>
                                <div><p>Technology</p></div>
                                <div><p>HPE</p></div>
                                <div><p>Arts</p></div>
                                <div><p>Languages</p></div>
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

                </div>
                <div class="priority"> 
                    <div class="HeaderBarTitle">
                        <div class= "Title">
                            2nd choices
                        </div>
                    </div>

                    <div class="PrioritySubjects Subjects">
                        <div><p>Maths</p></div>
                        <div><p>English</p></div>
                        <div><p>Science</p></div>
                        <div><p>Social Science</p></div>
                        <div><p>Technology</p></div>
                        <div><p>HPE</p></div>
                        <div><p>Arts</p></div>
                        <div><p>Languages</p></div>
                    </div>
                </div>

                <div class="priority"> 
                    <div class="HeaderBarTitle">
                        <div class= "Title">
                            3rd choices
                        </div>
                    </div>

                    <div class="PrioritySubjects Subjects">
                        <div><p>Maths</p></div>
                        <div><p>English</p></div>
                        <div><p>Science</p></div>
                        <div><p>Social Science</p></div>
                        <div><p>Technology</p></div>
                        <div><p>HPE</p></div>
                        <div><p>Arts</p></div>
                        <div><p>Languages</p></div>
                    </div>
                </div>

            </div>
            
            
            
                    <?php
                    //--Modules--
                    for ($i = 1; $i < $moduleCount + 1; $i++) {
                        $query = "select code, name, type, TEACHER1, TEACHER2, DESCRIPTION from classes where qual = $Qual and type = 'MODULE$i'";
                        $result = mysqli_query($dbconnect, $query);

                        echo"
                            <div id ='Module$i'> 
                                <div id='Module$i"."Bar' class='PeriodBar HeaderBar'>
                                    <div class='HeaderBarTitle'>
                                        <div class='DropdownButton PeriodDropdownButton'></div>
                                        <div class='PeriodName BarTitle'>Module $i</div>
                                    </div>
                                    <div class='PeriodSubjects Subjects'>
                                        <div><p>Maths</p></div>
                                        <div><p>English</p></div>
                                        <div><p>Science</p></div>
                                        <div><p>Social Science</p></div>
                                        <div><p>Technology</p></div>
                                        <div><p>HPE</p></div>
                                        <div><p>Arts</p></div>
                                        <div><p>Languages</p></div>
                                    </div>
                                </div>
                                <div class='SelectedClasses'></div>
                                <div class='DropdownClasses'>
                        ";
                        //echo mysqli_query($dbconnect,"SELECT * FROM classes");
                        while ($row = mysqli_fetch_array($result)){
                        echo"
                            <div class='Course'>
                                <div class='ClassBar HeaderBar'>
                                    <div class='HeaderBarTitle'>
                                        <div class='DropdownButton ClassesDropdownButton'></div>
                                        <div class='ClassCode BarTitle'>
                                            $row[code]
                                        </div>
                                    </div>
                                    <div class='ClassSubjects Subjects'>
                                        <div><p>Maths</p></div>
                                        <div><p>English</p></div>
                                        <div><p>Science</p></div>
                                        <div><p>Social Science</p></div>
                                        <div><p>Technology</p></div>
                                        <div><p>HPE</p></div>
                                        <div><p>Arts</p></div>
                                        <div><p>Languages</p></div>
                                    </div>
                                </div>
                                <div class='ClassDropdownDescription'>
                                    <div id='Name'>$row[name]</div>
                                    <div id='Teachers'>$row[TEACHER1] $row[TEACHER2]</div>
                                    <div id='Inputs'>
                                        <button>Select</button> 
                                        <button>Dismiss</button> 
                                    </div>
                                    <div id='NCEA'>
                                        Filler Text: Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah 
                                    </div>
                                    <div id='Description'>
                                        $row[DESCRIPTION]
                                    </div>
                                </div>
                            </div>";
                        }
                        echo"
                            </div>
                        </div>";
                    }
                    //--spins--        
                    for ($i = 1; $i < $spinCount + 1; $i++) {
                        $query = "select code, name, type, TEACHER1, TEACHER2, DESCRIPTION from classes where qual = $Qual and type = 'SPIN$i'";
                        $result = mysqli_query($dbconnect, $query);

                        echo"
                            <div id ='Spin$i'> 
                                <div id='Spin$i"."Bar' class='PeriodBar HeaderBar'>
                                    <div class='HeaderBarTitle'>
                                        <div class='DropdownButton PeriodDropdownButton'></div>
                                        <div class='PeriodName BarTitle'>Spin $i</div>
                                    </div>
                                    <div class='PeriodSubjects Subjects'>
                                        <div><p>Maths</p></div>
                                        <div><p>English</p></div>
                                        <div><p>Science</p></div>
                                        <div><p>Social Science</p></div>
                                        <div><p>Technology</p></div>
                                        <div><p>HPE</p></div>
                                        <div><p>Arts</p></div>
                                        <div><p>Languages</p></div>
                                    </div>
                                </div>
                                <div class='SelectedClasses'></div>
                                <div class='DropdownClasses'>
                        ";
                        //echo mysqli_query($dbconnect,"SELECT * FROM classes");
                        while ($row = mysqli_fetch_array($result)){
                        echo"
                            <div class='Course'>
                                <div class='ClassBar HeaderBar'>
                                    <div class='HeaderBarTitle'>
                                        <div class='DropdownButton ClassesDropdownButton'></div>
                                        <div class='ClassCode BarTitle'>
                                            $row[code]
                                        </div>
                                    </div>
                                    <div class='ClassSubjects Subjects'>
                                        <div><p>Maths</p></div>
                                        <div><p>English</p></div>
                                        <div><p>Science</p></div>
                                        <div><p>Social Science</p></div>
                                        <div><p>Technology</p></div>
                                        <div><p>HPE</p></div>
                                        <div><p>Arts</p></div>
                                        <div><p>Languages</p></div>
                                    </div>
                                </div>
                                <div class='ClassDropdownDescription'>
                                    <div id='Name'>$row[name]</div>
                                    <div id='Teachers'>$row[TEACHER1]</div>
                                    <div id='Inputs'>
                                        <button>Select</button> 
                                        <button>Dismiss</button> 
                                    </div>
                                    <div id='NCEA'>
                                        Filler Text: Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah 
                                    </div>
                                    <div id='Description'>
                                        $row[DESCRIPTION]
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
                <input type="submit" disabled>
            </div>
        </div>
    </article>
    
    <!--Scripts-->
    <script src="Scripts/DropDownBtn.js"></script>
    
</body>
</html>
