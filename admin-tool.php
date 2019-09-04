<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Admin Tools</title>
	<link rel="stylesheet" type="text/css" href="Styles/admin-tool.css">
	<link rel="stylesheet" type="text/css" href="Styles/nav.css">
	<link rel="stylesheet" type="text/css" href="Styles/main.css">
    <link rel="stylesheet" type="text/css" href="Styles/admin-tool-modal.css">
    <link rel="stylesheet" type="text/css" href="Styles/search-pannel.css">
    <link rel="stylesheet" type="text/css" href="Styles/scroll-pannel.css">
	<style>
		.toggle-tabs .tab {
			display: none;
		}

		.toggle-tabs .tab[open] {
			display: block;
			height: 100%;
		}

		.tabs-button{
			display:flex;
			align-self:end;
		}

		.tabs-button button {
			background-color:grey;
			border:1px solid black;
            height:80px;
            width:100%;
			
		}
        
        .searchPannel {
            width:100%;
        }
		
	</style>
</head>


<body>
	<?php
        include ('PhpSnippets/header-bar.php');
        $name = "Zane Larking";
	?>
	<div id ="main">
		<div id= "mainGrid" class="toggle-tabs">
            <div class="toggle-btns tabs-button-people">
                <button class="toggle-btn"> 
                    <img src="Images/portrait-placeholder.png" alt="Teacher Manage" style="height: 30px;justify-self: center;border-radius: 50%;">
                    Teacher</button>
                <button class="toggle-btn"> 
                    <img src="Images/portrait-placeholder.png" alt="Student Manage" style="height: 30px;justify-self: center;border-radius: 50%;">
                    Student</button>
                <button class="toggle-btn"> 
                    <img src="Images/portrait-placeholder.png" alt="General Settings" style="height: 30px;justify-self: center;border-radius: 50%;">
                    Settings
                </button>

            </div>

            <div class="tabs">
                
                <div class="background tab" open>
                    <div class="peopleManage"> <!-- Box/Container for the Content in the Teacher name 
                    list & Admin name -->
                        <div class="peopleList" >
                            <header>
                                <img src="Images/portrait-placeholder.png" alt="Profile picture" style="height: 50px;justify-self: center;border-radius: 50%;">
                                <hgroup>
                                <h1> Admin Name </h1>
                                <!-- <h2> Profile </h2> -->
                                </hgroup>
                            </header>

                            <div class="search_bar">
                                <div class="material-icons prefix">search</div>
                                <input value="" class="search" type="text" placeholder="Search Teachers" margin=0px 10px>
                            </div>

                            <div class="people"> <!-- Id for Teacher name list -->
                                <!--
                                Teacher Names
                                --> 
                                
                                    <!--
                                <div class="KAMARCODE">
                                    <img src="Images/student-pic.png" width=20px height=20px>
                                    <h4>Name of Teacher</h4> 
                                    <img src="Images/red-dot.png" alt="gears" width=5px height=5px>
                                </div> -->

                                <?php
                                    include_once "DataBase/database-connect.php";
                                    $query = "select * from teachers";
                                    $result = mysqli_query($dbconnect, $query);
                                    while($rows=mysqli_fetch_assoc($result))
                                    {
                                ?>
                                <?php
                                    
                                ?>
                                <div class=<?php echo "'".$rows['ID']."'"; ?>>
                                    <img src="Images/student-pic.png" width=12px height=12px>
                                    <p class="people_text"><?php echo $rows['FIRST_NAME']; ?></p> 
                                    <div></div>
                                </div>
                                <?php
                                    }
                                ?>
                    
                            </div>


                            <div class="functions">
                                <div id="add_teacher"> <!-- just a container, there are 3 in total -->
                                    <!-- Button for Add Teacher Modal --> 
                                    <button id="add_teacher_button" onclick="openModal('add_teacher_modal')"> Add Teacher </button>
                                    <div id="add_teacher_modal" class="modal">
                                        <!-- Modal Content container -->
                                        <div class="modal-content">

                                            <span class="close">&times;</span>
                                            <h1> Add Teacher </h1>
                                            <p> The format of the text is... ZANE helpppp... What do you want here </p>
                                            <!-- Insert form here -->
                                            <form method="post" action="AJAX/add-teacher.php">
                                                <div class="modal-content-style">  
                                                    <h4> First name: </h4>
                                                    <input class="modal-content-input" type="text" name="firstname" placeholder="First name Eg: Zane">
                                                </div>
                                                <br>
                                                <div class="modal-content-style">
                                                    <h4> Last name: </h4>
                                                    <input class="modal-content-input" type="text" name="lastname" placeholder="Last name Eg: Larking">
                                                </div>
                                                <br>
                                                <div class="modal-content-style">
                                                    <h4> Kamar Code:</h4>
                                                    <input class="modal-content-input" type="text" name="kamar_code" placeholder="Kamar Code Eg: 456789">
                                                </div>
                                                <br>
                                                <div class="modal-content-style">
                                                    <h4> Gmail:</h4>
                                                    <input class="modal-content-input" type="text" name="gmail" placeholder="Google Email Eg: zane.larking@hobsonvillepoint.school.nz">
                                                </div>
                                                <br>
                                                <div class="modal-content-style">
                                                    <H4> Has a Hub:</h4>
                                                    <input type="checkbox" name="has_hub" value="TRUE">
                                                </div>
                                                <br>
                                                <div class="modal-content-style">
                                                    <h4> Privilege Level:</h4>
                                                    <select class="modal-content-input">
                                                        <option value="0"> Staff </option>
                                                        <option value="1"> Teacher </option>
                                                        <option value="2"> Moderator </option>
                                                        <option value="3"> Administrator </option>
                                                    </select>
                                                </div>
                                                <br>

                                                <br>
                                            <input type="submit" value="Submit">
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                                    

                                <div id="Export" >
                                    <img src="Images/export.png" width=40px height=40px  onclick="openModal('import_teachers_modal')">
                                    <div id="import_teachers_modal" class="modal">
                                        <!-- Modal Content container -->
                                        <div class="modal-content">

                                            <span class="close">&times;</span>
                                            <h1> Add Teacher </h1>
                                            <p> The format of the text is... ZANE helpppp... What do you want here </p>
                                            <!-- Insert form here -->
                                            <form method="post" action="DataBase/import-details.php" enctype="multipart/form-data">
                                                <div class="modal-content-style">  
                                                    <input type="hidden" name="src" value="admin-tool" />
                                                    <input type="hidden" name="table" value="teachers" />
                                                    <h4> Select file: </h4>
                                                    <input class="modal-content-input" type="file" name="file" accept="application/vnd.ms-excel, Microsoft Excel Comma Separated Values File (.csv),.csv">
                                                </div>
                                                <br>
                                            <input type="submit" name="submit" value="submit">
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="toggle-tabs Content">
                            <header>
                                <img src="Images/portrait-placeholder.png" alt="Profile picture" style="height: 50px; border-radius: 50%;">
                                <h1> Teacher Name </h1>
                                <h2> Subject </h2>
                                <h2> Years </h2>
                                <div> </div> <!-- spacer -->
                                <div class="toggle-btns tabs-button">
                                    <button class="toggle-btn"> Classes </button>
                                    <button class="toggle-btn"> Profile </button>
                                    <!-- PhP or Java, only display this button when "teacher" has hub-->
                                    <button class="toggle-btn"> Hub </button>
                                </div>
                            </header>
                            <div class="tabs">
                                <div class="tab" open> <!-- content --> 
                                    <div class="wrapper">
                                        <div class="block">
                                            <h4> Class 1</h4>
                                            <div> 
                                                <p> Class Description- blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah</p> 
                                            </div>
                                            <div class="suggestion">
                                                <h4> Suggestion </h4>
                                                <textarea class ="suggest"> blah blah blah blah blah blah blah blah blah blah blah blah blah blah </textarea>
                                            </div>
                                            <div class="send">
                                                <h4>send</h4>
                                            </div>
                                        </div>
                                        <div class="block">
                                            <h4> Class 2</h4>
                                            <div> 
                                                <p> Class Description- blah blah blah</p> 
                                            </div>
                                            <div class="suggestion">
                                                <h4> Suggestion </h4>
                                                <textarea class ="suggest"> blah blah blah blah blah blah blah blah blah blah blah blah blah blah </textarea>
                                            </div>
                                            <div class="send">
                                                <h4>send</h4>
                                            </div>
                                        </div>
                                        <div class="block">
                                            <h4> Class 3</h4>
                                            <div> 
                                                <p> Class Description- blah blah blah</p> 
                                            </div>
                                            <div class="suggestion">
                                                <h4> Suggestion </h4>
                                                <textarea class ="suggest"> blah blah blah blah blah blah blah blah blah blah blah blah blah blah </textarea>
                                            </div>
                                            <div class="send">
                                                <h4>send</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab"> 
                                    <div class="profile"> 
                                        <div class="t_input">
                                            <div class="first_name">
                                                <input type="text" name="first_name" placeholder="Teacher First Name" disabled>								
                                            </div>
                                            <div class="last_name">
                                                <input type="text" name="last_name" placeholder="Teacher Last Name" disabled>								
                                            </div>
                                            <div class="kamar_code">
                                                <input type="text" name="name" placeholder="Teacher Kamar Code" disabled>
                                            </div>
                                            <div class="gmail">
                                                <input type="text" name="gmail" placeholder="Teacher Google Email Adress" disabled>
                                            </div>
                                        </div>
                                    
                                        
                                        <div class="c_input">
                                            <div class="privilege">
                                                <h4> Privilege: </h4> <br>
                                                <div>
                                                    <input type="checkbox" name="teacher" disabled>Teacher<br>
                                                </div>
                                                <div><input type="checkbox" name="moderator" disabled>Moderator<br></div>
                                                
                                                <div><input type="checkbox" name="administrator" disabled>Administrator<br></div><br>							
                                            </div>
                                            
                                            <div class="has_hub">
                                                <h4> Has hub: </h4>
                                                <input type="checkbox" name="has_hub" disabled> Yes<br>
                                                <input type="checkbox" name="has_hub" disabled> No<br>
                                            </div>
                                        </div>
                                        <div class="others">
                                            <input class="other" style="background:cyan;" type="button" name="save" value="save">
                                            <input class="other" style="background:cyan;" type="button" name="edit" value="edit">
                                            <input class="other" style="background:red;" type="button" name="remove" value="remove">
                                            <!-- Everything on add teacher modal, remove teacher, edit button, save --> 
                                        </div>
                                    </div>
                                
                                </div>

                                <div class="tab" style="padding:20px 0; box-sizing: border-box;">   
                                    <div class="hub_manage"> 
                                        <div class="hubling">
                                            <div class = "searchPannel roundedContainer" style="height: 100%;box-sizing: border-box;">
                                                <div class ="sectionHeader roundedHeader">
                                                    <h2 style="margin:0px;"> Teacher's Hubling</h2>
                                                    <div class="searchBar">
                                                        <div class="material-icons prefix">search</div>
                                                        <input value="" class="search" type="text" placeholder="Search Hubling">
                                                    </div>
                                                </div>
                                                <!-- List students in the search pannel -->
                                                <div class="scrollPannel students">
                                                    <?php
                                                        $query = "select FIRST_NAME, LAST_NAME, YEAR_LEVEL, 'SELECTIONS_M&S' from students where COACH = '".$name."';";
                                                        $result = mysqli_query($dbconnect, $query);
                                                        while ($row = mysqli_fetch_array($result)){
                                                            echo '
                                                            <div class="scrollItem student  '.$row['FIRST_NAME'].'-'.$row['LAST_NAME'].'" onclick = "toggleTabs(event, '."'".'currentStudentSelections'."', '".$row['FIRST_NAME'].'-'.$row['LAST_NAME']."'".')">
                                                                <img src="Images/portrait-placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                                                <p>'.$row['FIRST_NAME'].' '.$row['LAST_NAME'].'</p>
                                                                <div class="coverageCheck approved">
                                                                    <div class="material-icons" style="font-size:15rem;">check</div>

                                                                </div>
                                                            </div>
                                                            ';
                                                        }   
                                                    ?>
                                                </div>
                                            </div>
                                            
                                        </div> 
                                        <div class="all_students">
                                        <div class = "searchPannel roundedContainer" style="height: 100%;box-sizing: border-box;">
                                            <div class ="sectionHeader roundedHeader">
                                                <h2 style="margin:0px;"> All Students</h2>
                                                <div class="searchBar">
                                                    <div class="material-icons prefix">search</div>
                                                    <input value="" class="search" type="text" placeholder="Search Hubling">
                                                </div>
                                            </div>
                                            <!-- List students in the search pannel -->
                                            <div class="scrollPannel students">
                                                <?php
                                                    $query = "select FIRST_NAME, LAST_NAME, YEAR_LEVEL, 'SELECTIONS_M&S' from students;";
                                                    $result = mysqli_query($dbconnect, $query);
                                                    while ($row = mysqli_fetch_array($result)){
                                                        echo '
                                                        <div class="scrollItem student  '.$row['FIRST_NAME'].'-'.$row['LAST_NAME'].'" onclick = "toggleTabs(event, '."'".'currentStudentSelections'."', '".$row['FIRST_NAME'].'-'.$row['LAST_NAME']."'".')">
                                                            <img src="Images/portrait-placeholder.png" alt="Profile picture" style="height: 1em; border-radius: 50%;">
                                                            <p>'.$row['FIRST_NAME'].' '.$row['LAST_NAME'].'</p>
                                                            <div class="coverageCheck approved">
                                                                <div class="material-icons" style="font-size:15rem;">check</div>

                                                            </div>
                                                        </div>
                                                        ';
                                                    }   
                                                ?>
                                            </div>
                                        </div>
                                            
                                            
                                        </div>
                                        <button style="grid-area: button;">Transfer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="background tab">
                    <div class="peopleManage"> <!-- Box/Container for the Content in the Student Name -->
                        <div class="peopleList" >
                            <header>
                                <img src="Images/portrait-placeholder.png" alt="Profile picture" style="height: 50px;justify-self: center;border-radius: 50%;">
                                <hgroup>
                                <h1> Admin Name </h1>
                                <!-- <h2> Profile </h2> -->
                                </hgroup>
                            </header>

                            <div class="search_bar">
                                <div class="material-icons prefix">search</div>
                                <input value="" class="search" type="text" placeholder="Search Students" margin=0px 10px>
                            </div>

                            <div class="people"> <!-- Id for Teacher name list -->
                                <!--
                                Teacher Names
                                --> 
                                
                                    <!--
                                <div class="KAMARCODE">
                                    <img src="Images/student-pic.png" width=20px height=20px>
                                    <h4>Name of Teacher</h4> 
                                    <img src="Images/red-dot.png" alt="gears" width=5px height=5px>
                                </div> -->

                                <?php
                                    include_once "DataBase/database-connect.php";
                                    $query = "select * from students";
                                    $result = mysqli_query($dbconnect, $query);
                                    while($rows=mysqli_fetch_assoc($result))
                                    {
                                ?>
                                <?php
                                    
                                ?>
                                <div class=<?php echo "'".$rows['ID']."'"; ?>>
                                    <img src="Images/student-pic.png" width=12px height=12px>
                                    <p class="people_text"><?php echo $rows['FIRST_NAME']; ?></p> 
                                    <img src="Images/red-dot.png" alt="gears" width=5px height=5px>
                                </div>
                                <?php
                                    }
                                ?>
                    
                            </div>


                            <div class="functions">
                                <div id="add_student"> <!-- just a container, there are 3 in total -->
                                    <!-- Button for Add student Modal --> 
                                    <button id="add_student_button" onclick="openModal('add_student_modal')"> Add Student </button>
                                    <div id="add_student_modal" class="modal">
                                        <!-- Modal Content container -->
                                        <div class="modal-content">

                                            <span class="close">&times;</span>
                                            <h1> Add Student </h1>
                                            <p> The format of the text is... ZANE helpppp... What do you want here </p>
                                            <!-- Insert form here -->
                                            <form method="post" action="AJAX/add-student.php"> <!-- Need help Zane - Line change Function need add student AJAX-->
                                                <div class="modal-content-style">  
                                                    <h4> First name: </h4>
                                                    <input class="modal-content-input" type="text" name="firstname" placeholder="First name Eg: Zane">
                                                </div>
                                                <br>
                                                <div class="modal-content-style">
                                                    <h4> Last name: </h4>
                                                    <input class="modal-content-input" type="text" name="lastname" placeholder="Last name Eg: Larking">
                                                </div>
                                                <br>
                                                <div class="modal-content-style">
                                                    <h4> Kamar Code:</h4>
                                                    <input class="modal-content-input" type="text" name="kamar_code" placeholder="Kamar Code Eg: 456789">
                                                </div>
                                                <br>
                                                <div class="modal-content-style">
                                                    <h4> Gmail:</h4>
                                                    <input class="modal-content-input" type="text" name="gmail" placeholder="Google Email Eg: zane.larking@hobsonvillepoint.school.nz">
                                                </div>
                                                <br>
                                                <div class="modal-content-style">
                                                    <H4> Hub Coach:</h4>
                                                    <select class="modal-content-input">
                                                        <!-- ZANE HERE NEED ALL HUB COACHES NAME -->
                                                        <option value="0"> Kalani </option>
                                                        <option value="1"> Gerard </option>
                                                        <option value="2"> Cairan </option>
                                                    </select>
                                                </div>
                                                <br>
                                                <div class="modal-content-style">
                                                    <h4> Year Level:</h4>
                                                    <select class="modal-content-input">
                                                        <option value="9"> 9 </option>
                                                        <option value="10"> 10 </option>
                                                        <option value="11"> 11 </option>
                                                        <option value="12"> 12 </option>
                                                        <option value="13"> 13 </option>
                                                    </select>
                                                </div>
                                                <br>

                                                <br>
                                            <input type="submit" value="Submit">
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                                    

                                <div id="Export" >  <!-- Zane help here too, I changed everything that has "student" -->
                                    <img src="Images/export.png" width=40px height=40px  onclick="openModal('import_students_modal')">
                                    <div id="import_students_modal" class="modal">
                                        <!-- Modal Content container -->
                                        <div class="modal-content">

                                            <span class="close">&times;</span>
                                            <h1> Add Students </h1>
                                            <p> The format of the text is... ZANE helpppp... What do you want here </p>
                                            <!-- Insert form here -->
                                            <form method="post" action="DataBase/import-details.php" enctype="multipart/form-data">
                                                <div class="modal-content-style">  
                                                    <input type="hidden" name="src" value="admin-tool" />
                                                    <input type="hidden" name="table" value="students" />
                                                    <h4> Select file: </h4>
                                                    <input class="modal-content-input" type="file" name="file" accept="application/vnd.ms-excel, Microsoft Excel Comma Separated Values File (.csv),.csv">
                                                </div>
                                                <br>
                                            <input type="submit" name="submit" value="submit">
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="toggle-tabs Content">  <!-- Need Immediate Work -->
                            <header>
                                <img src="Images/portrait-placeholder.png" alt="Profile picture" style="height: 50px; border-radius: 50%;">
                                <h2> First Name </h2>
                                <h2> Last Name </h2>
                                <h2> Years </h2>
                                <div> </div> <!-- spacer -->
                                
                            </header>
                            <!-- content --> 
                            <div class="student_profile">
                                <textarea class="student_first_name" name="first_name" placeholder="First Name" disabled></textarea>
                                <textarea class="student_last_name" name="last_name" placeholder="Last Name" disabled></textarea>
                                <textarea class="k_code" name="k_code" placeholder="Kamar Code" disabled></textarea>
                                <textarea class="student_gmail" name="student_gmail" placeholder="Gmail" disabled></textarea>
                                <select class="coach" name="hub_coach" disabled> <!-- Need Php for list of all teacher names -->
                                    <option value="Kalani"> Kalani </option>
                                    <option value="Gerard"> Gerard </option>
                                    <option value="Cairan"> Cairan </option>
                                    <option value="Jessica"> Jessica </option>
                                    <option value="Rebecca"> Rebecca </option>
                                </select>
                                <select class="year_level" name="year_level" disabled>
                                    <option value="9"> 9 </option>
                                    <option value="10"> 10 </option>
                                    <option value="11"> 11 </option>
                                    <option value="12"> 12 </option>
                                    <option value="13"> 13 </option>
                                </select>
                                <div class="student_others">
                                    <input class="other" style="background:cyan;" type="button" name="save" value="save">
                                    <input class="other" style="background:cyan;" type="button" name="edit" value="edit">
                                    <input class="other" style="background:red;" type="button" name="remove" value="remove">
                                    
                                    <!-- Everything on add teacher modal, remove teacher, edit button, save --> 
                                </div>
                                        
                                 

                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="background tab">
                    <div class="general_settings"> 
                            <!-- 
                            Module/Spin amount 
                            Selection dates: closing and opening - Time period
                            Button Publish Choices

                            -->


                            <div class="calendar">
                                <h3 class="calendarHead" id="monthAndYear"></h3>

                                <table id="calendar">
                                    <thead>
                                    <tr>
                                        <th>Sun</th>
                                        <th>Mon</th>
                                        <th>Tue</th>
                                        <th>Wed</th>
                                        <th>Thu</th>
                                        <th>Fri</th>
                                        <th>Sat</th>
                                    </tr>
                                    </thead>

                                    <tbody id="calendar-body">

                                    </tbody>
                                    
                                </table>

                                
                                <div class="changeMonth">

                                    <button id="previous" onclick="previous()">Previous</button>

                                    <button id="next" onclick="next()">Next</button>
                                </div>

                                <form>
                                    <label for="month">Jump To: </label>
                                    <select name="month" id="month" onchange="jump()">
                                        <option value=0>Jan</option>
                                        <option value=1>Feb</option>
                                        <option value=2>Mar</option>
                                        <option value=3>Apr</option>
                                        <option value=4>May</option>
                                        <option value=5>Jun</option>
                                        <option value=6>Jul</option>
                                        <option value=7>Aug</option>
                                        <option value=8>Sep</option>
                                        <option value=9>Oct</option>
                                        <option value=10>Nov</option>
                                        <option value=11>Dec</option>
                                    </select>


                                    <label for="year"></label>
                                    <select name="year" id="year" onchange="jump()">
                                    
                                        <option value=2010>2010</option>
                                        <option value=2011>2011</option>
                                        <option value=2012>2012</option>
                                        <option value=2013>2013</option>
                                        <option value=2014>2014</option>
                                        <option value=2015>2015</option>
                                        <option value=2016>2016</option>
                                        <option value=2017>2017</option>
                                        <option value=2018>2018</option>
                                        <option value=2019>2019</option>
                                        <option value=2020>2020</option>
                                    
                                    </select>
                                </form>

                            </div>


                        </div>
                    
                
                    </div>
                </div>

                

            </div>
			
		</div>
	</div>
	
	<script src="Scripts/modal.js"></script>
    <script src="Scripts/tabs.js"></script>
    <script src="Scripts/calendar.js"></script>
	<script> 
	/*
	// Get the modal
	var modal = document.getElementById("add_teacher_modal");

	// Get the button that opens the modal
	var btn = document.getElementById("add_teacher_button");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal 
	btn.onclick = function() {
	  modal.style.display = "block";
	  modal.setAttribute("open", "");
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	  modal.style.display = "none";
	  modal.
	}
	*/

	// When the user clicks anywhere outside of the modal, close it
	
	</script>

</body>
</html>