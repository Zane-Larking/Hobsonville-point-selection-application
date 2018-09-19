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
            
            <!--Module 1 Table-->
            <div id ="Module1"> 
                <div id="Module1Bar" class="PeriodBar HeaderBar">
                    <div class="HeaderBarTitle">
                            <div class="DropdownButton PeriodDropdownButton"></div>
                            <div class="PeriodName BarTitle">
                            Module 1
                        </div>
                    </div>
                    <div class="PeriodSubjects Subjects">
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
                <div class="SelectedClasses"></div>
                <div class="DropdownClasses">
                    <div class="Course">
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
                    <div class="Course">
                        <div class="ClassBar HeaderBar">
                            <div class="HeaderBarTitle">
                                <div class="DropdownButton ClassesDropdownButton"></div>
                                <div class="ClassCode BarTitle">
                                    M1EXMP2
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
                            <div id="Name">Module 1 Exemplar 2</div>
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
                    <div class="Course">
                        <div class="ClassBar HeaderBar">
                            <div class="HeaderBarTitle">
                                <div class="DropdownButton ClassesDropdownButton"></div>
                                <div class="ClassCode BarTitle">
                                    M1EXMP3
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
                            <div id="Name">Module 1 Exemplar 3</div>
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
                    <div class="Course">
                        <div class="ClassBar HeaderBar">
                            <div class="HeaderBarTitle">
                                <div class="DropdownButton ClassesDropdownButton"></div>
                                <div class="ClassCode BarTitle">
                                    M1EXMP4
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
                            <div id="Name">Module 1 Exemplar 4</div>
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
                    
            </div>

            <!--Module 2 Table-->
            <div id="Module2"> 
                <div id="Module2Bar" class="PeriodBar HeaderBar">
                    <div class="HeaderBarTitle">
                        <div class="DropdownButton PeriodDropdownButton"></div>
                        <div class="PeriodName BarTitle">
                            Module 2
                        </div>
                    </div>
                    <div class="PeriodSubjects Subjects">
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
                <div class="SelectedClasses"></div>
                <div class="DropdownClasses">
                    <div class="Course">
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
                    <div class="Course">
                        <div class="ClassBar HeaderBar">
                            <div class="HeaderBarTitle">
                                <div class="DropdownButton ClassesDropdownButton"></div>
                                <div class="ClassCode BarTitle">
                                    M2EXMP2
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
                            <div id="Name">Module 2 Exemplar 2</div>
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
                    <div class="Course">
                        <div class="ClassBar HeaderBar">
                            <div class="HeaderBarTitle">
                                <div class="DropdownButton ClassesDropdownButton"></div>
                                <div class="ClassCode BarTitle">
                                    M2EXMP3
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
                            <div id="Name">Module 2 Exemplar 3</div>
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
                    <div class="Course">
                        <div class="ClassBar HeaderBar">
                            <div class="HeaderBarTitle">
                                <div class="DropdownButton ClassesDropdownButton"></div>
                                <div class="ClassCode BarTitle">
                                    M2EXMP4
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
                            <div id="Name">Module 2 Exemplar 4</div>
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
            </div>
            <!--Spin 1 Table-->
            <div id="Spin1">
                <div id="Spin1Bar" class="PeriodBar HeaderBar">
                    <div class="HeaderBarTitle">
                        <div class="DropdownButton PeriodDropdownButton"></div>
                        <div class="PeriodName BarTitle">
                        Spin 1
                    </div>
                    </div>
                    <div class="PeriodSubjects Subjects">
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
                <div class="SelectedClasses"></div>
                <div class="DropdownClasses">
                    <div class="Course">
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
                    <div class="Course">
                        <div class="ClassBar HeaderBar">
                            <div class="HeaderBarTitle">
                                <div class="DropdownButton ClassesDropdownButton"></div>
                                <div class="ClassCode BarTitle">
                                    S1EXMP2
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
                            <div id="Name">Spin 1 Exemplar 2</div>
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
                    <div class="Course">
                        <div class="ClassBar HeaderBar">
                            <div class="HeaderBarTitle">
                                <div class="DropdownButton ClassesDropdownButton"></div>
                                <div class="ClassCode BarTitle">
                                    S1EXMP3
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
                            <div id="Name">Spin 1 Exemplar 3</div>
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
                    <div class="Course">
                        <div class="ClassBar HeaderBar">
                            <div class="HeaderBarTitle">
                                <div class="DropdownButton ClassesDropdownButton"></div>
                                <div class="ClassCode BarTitle">
                                    S1EXMP4
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
                            <div id="Name">Spin 1 Exemplar 4</div>
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
            </div>

            <!--Spin 2 Table-->
            <div id ="Spin2"> 
                <div id="Spin2Bar" class="PeriodBar HeaderBar">
                    <div class="HeaderBarTitle">
                        <div class="DropdownButton PeriodDropdownButton"></div>
                        <div class="PeriodName BarTitle">
                            Spin 2
                        </div>
                    </div>
                    <div class="PeriodSubjects Subjects">
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
                
                <div class="SelectedClasses"></div>
                <div class="DropdownClasses">
                    <div class="Course">
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
                    <div class="Course">
                        <div class="ClassBar HeaderBar">
                            <div class="HeaderBarTitle">
                                <div class="DropdownButton ClassesDropdownButton"></div>
                                <div class="ClassCode BarTitle">
                                    S2EXMP2
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
                            <div id="Name">Spin 2 Exemplar 2</div>
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
                    <div class="Course">
                        <div class="ClassBar HeaderBar">
                            <div class="HeaderBarTitle">
                                <div class="DropdownButton ClassesDropdownButton"></div>
                                <div class="ClassCode BarTitle">
                                    S2EXMP3
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
                            <div id="Name">Spin 2 Exemplar 3</div>
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
                    <div class="Course">
                        <div class="ClassBar HeaderBar">
                            <div class="HeaderBarTitle">
                                <div class="DropdownButton ClassesDropdownButton"></div>
                                <div class="ClassCode BarTitle">
                                    S2EXMP4
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
                            <div id="Name">Spin 2 Exemplar 4</div>
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
            </div>

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
