<!DOCTYPE html>
<html lang="en">
<head>
	<title>Staff Homepage</title>
	<link rel="stylesheet" type="text/css" href="Styles/create-classes-style.css">
	<link rel="stylesheet" type="text/css" href="Styles/main.css">
	<link rel="stylesheet" type="text/css" media="screen" href="Styles/nav.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="Styles/teacher-homepage.css" />	
	<?php
		//Run other php files
		include "PhpSnippets/session-start.php";
	?>
</head>

<body>
	<?php
		include 'PhpSnippets/header-bar.php';	
		include 'DataBase/database-connect.php';
	?>

	<font face = "Verdana">
		<div id="main">
			<div id ="mainGrid">
				<div id = "head">
					<img src="Images/hpss-logo.png" alt="HPSS Logo" style="height: 5em; margin: 17px 0px;">
					<div> 
						<h1><font face ="Verdana">Staff Homepage</font></h1>
						<h5> Signed in as:
							<?php 
								if($_SESSION['privilege'] == 3){
									echo 'Admin';
								}else if($_SESSION['privilege'] == 2){
									echo 'Moderator';
								}else if($_SESSION['privilege'] == 1){
									echo 'Teacher';
								}else if($_SESSION['privilege'] == 0){
									echo 'Teacher Aid';
								}
								if($_SESSION['hashub'] == 1){
									echo ' & Hub Coach';
								}
							?>

						</h5>
					</div>
				</div>
				<nav id ="pannel">
					<a href="modules-and-spins.php">Module and Spin Selections</a>
					<a href="projects.php">Project Selections</a>
					<a href="floortimes.php">Floortime Selections</a>
					<a href="hub-overview.php">Hub Overview</a>
					<a href="sort-selections.php">Sort Selection</a>
					<a href="selection-verification.php">Verify Selections</a>
					<a href="admin-tool.php">Admin Tools</a>
					<a href="staff-class-submit.php">Submit Classes</a>
					<a href="manage-classes.php">Manage Classes</a>
				</nav>
				<div id="content-grid">
					

					<?php
						if($_SESSION['hashub'] == 1){
							echo '
					<div class="content">
						<h3><u>Hub Coach Privileges</u></h3>
						<div id = "hub-coach-name" style="max-height:75px">
							<img src= "'; echo $_SESSION["picture"]; echo '" height="75rem" style= "grid-area: image">
							<div class = "ellipsis" style= "grid-area: name; padding: 10px 10px 0px 10px;">';echo $_SESSION["name"]; echo '</div>
							<div class = "ellipsis" style= "grid-area: email; padding: 5px 10px 5px 10px;  overflow:hidden; text-overflow:ellipsis;"><a href="http://www.gmail.com">';echo $_SESSION["email"]; echo '</a></div>
							<div class = "ellipsis" style= "grid-area: link; padding: 10px 10px 0px 10px;"><a href="hub-overview.php">Hub Coach Homepage</a></div>
						</div>
						<!--Hub students and their classes-->
						<div id = "hublings">
						';
					
							/*
								foreach ($_SESSION['hublings'].split as $studentId) {
									$studentId
								};
								*/
								
								//foreach ($_SESSION['hublings'] as $id) {
									
								//}
								if (count($_SESSION['hublings']) > 0){
									$query = "SELECT id, CONCAT(first_name, ' ', last_name) AS name, email, year_level, hpss_num FROM students WHERE coach_id = ".$_SESSION['id'];
									//echo $query;
									$result = mysqli_query($dbconnect, $query);
									while($row = $result->fetch_assoc()) {
										echo "
										<div class = 'user-grid-container'>
											<img src= "; if (isset($row['PICTURE'])) echo $row['PICTURE'];  else echo"'Images/portrait-placeholder.png' height='50rem' style= 'grid-area: image;'>
											<div class = 'ellipsis' style= 'grid-area: name'>".$row['name']."</div>
											<div class = 'ellipsis' style= 'grid-area: year-level'>Year ".$row['year_level']."</div>
											<div class = 'ellipsis' style= 'grid-area: email'>".$row['email']."</div>
											
											<div class = 'ellipsis' style= 'grid-area: options; padding-right:3px; display: grid; align-items: center; justify-content: end; grid-auto-flow: column; grid-gap: 5px; grid-auto-columns: max-content;'>
												<div style='border-style:solid; text-align:right; width:9px; height:9px; border-width:1px; border-radius:25px; background-color:"; 

														$hubling_selection_requirement_query = "SELECT SUM(count * choices) AS count FROM students RIGHT JOIN class_template ON students.year_level = class_template.year_level WHERE students.id = ".$row['id'];
														$hubling_selection_requirement_result = mysqli_query($dbconnect, $hubling_selection_requirement_query);

														$required = $hubling_selection_requirement_result->fetch_assoc()["count"];
														$selected = 0;
														$hub_verified = 0;
														$TT_verified = 0;


														$hubling_selections_query = "SELECT selections.approval_status AS status, COUNT(selections.id) AS count FROM students JOIN selections ON students.id = selections.student_id WHERE students.id = ".$row['id']." GROUP BY selections.approval_status ORDER BY selections.approval_status";
														$hubling_selections_result = mysqli_query($dbconnect, $hubling_selections_query);


														while ($hubling_selections = $hubling_selections_result->fetch_assoc()) {
															if ($hubling_selections["status"] == 0) {
																$selected = $hubling_selections["count"];
															}
															if ($hubling_selections["status"] == 1) {
																$hub_verified = $hubling_selections["count"];
															}
															if ($hubling_selections["status"] == 2) {
																$TT_verified = $hubling_selections["count"];
															}
														}

														//echo $required." ".$selected." ".$hub_verified." ".$TT_verified;


														// $not_approved = $hubling_selection_result->fetch_assoc()["count"];
														// $approved = $hubling_selection_result->fetch_assoc()["count"];

														if(($selected+$hub_verified+$TT_verified) < $required){
															echo"red";
														} elseif (($hub_verified+$TT_verified) < $required){
															echo"orange";
														} elseif ($TT_verified < $required){
															echo"#52c7ff";
														} else {
															echo"green";
														}

                        echo";'></div>
                        <a href = 'selection-verification.php?student=".str_replace(" ", "-", $row['name'])."'>View Selections</a>
                      </div>
                    </div>";
                  }		
                } else {
                  echo"you have no hublings";
                }
              echo '
            </div>
					</div>
							';
						}
						if($_SESSION['privilege'] >= 0){
							echo'
							<div class="content">
								<h3><u>Teacher Aid Privileges</u></h3>';
								$teacher_query = ("SELECT * FROM teacher_aids WHERE teacher_id = ".$_SESSION['id']);
								$teacher_result = mysqli_query($dbconnect, $teacher_query);
								if(mysqli_num_rows($teacher_result) != 0) {
									echo'<h4><u>Propose pupil selection advice</u></h4>';
								} else {
									echo'<h4><u>There are no students found to be associated with you</u></h4>';
								}
								echo '<br>';
								if(mysqli_num_rows($teacher_result) != 0) {
									echo '<div class = "aid-grid-container">';
									while($row = $teacher_result->fetch_assoc()) {
										$student_query = ("SELECT * FROM students WHERE ID = ".$row['STUDENT_ID']);
										$student_result = mysqli_query($dbconnect, $student_query);
										echo "
										<div class = 'students-of-teacher-aid'>
										";
										while($student_row = $student_result->fetch_assoc()) {
											echo"
											<img src= "; if (isset($row['PICTURE'])) echo $row['PICTURE'];  else echo"'Images/portrait-placeholder.png' height='50rem' style= 'grid-area: image;'>
												<div class = 'ellipsis' style= 'grid-area: name'>".$student_row['FIRST_NAME']." ".$student_row['LAST_NAME']."</div>
												<div class = 'ellipsis' style= 'grid-area: year-level'>Year ".$student_row['YEAR_LEVEL']."</div>
												<div class = 'ellipsis' style= 'grid-area: email'>".$student_row['EMAIL']."</div>
												<div class = 'ellipsis' style= 'grid-area: options'>
													<a href = 'propose-pupil-selections.php?student=".str_replace(" ", "-", ($student_row['FIRST_NAME'].' '.$student_row['LAST_NAME']))."'>Add selection recommendation</a>
												</div>
											</div>";
										}		
									}
								} else {
										echo"you have no hublings";
									}
								echo '
							</div>
						</div>
								';
							}
							if($_SESSION['privilege'] >= 0){
								$teacher_query = ("SELECT * FROM teacher_aids WHERE teacher_id = ".$_SESSION['id']);
								$teacher_result = mysqli_query($dbconnect, $teacher_query);
								if(!$teacher_result){	
									echo'
									<div class="content">
										<h3><u>Teacher Aid Privileges</u></h3>';
										

										echo'<h4><u>Propose pupil selection advice</u></h4>';
										// if(mysqli_num_rows($teacher_result) != 0) {
										// 	echo'<h4><u>Propose pupil selection advice</u></h4>';
										// } else {
										// 	echo'<h4><u>There are no students found to be associated with you</u></h4>';
										// }
										echo '<br>';
										if(mysqli_num_rows($teacher_result) != 0) {
											echo '<div class = "aid-grid-container">';
											while($row = $teacher_result->fetch_assoc()) {
												$student_query = ("SELECT * FROM students WHERE ID = ".$row['STUDENT_ID']);
												$student_result = mysqli_query($dbconnect, $student_query);
												echo "
												<div class = 'students-of-teacher-aid'>
												";
												while($student_row = $student_result->fetch_assoc()) {
													echo"
													<img src= "; if (isset($row['PICTURE'])) echo $row['PICTURE'];  else echo"'Images/portrait-placeholder.png' height='50rem' style= 'grid-area: image;'>
														<div class = 'ellipsis' style= 'grid-area: name'>".$student_row['FIRST_NAME']." ".$student_row['LAST_NAME']."</div>
														<div class = 'ellipsis' style= 'grid-area: year-level'>Year ".$student_row['YEAR_LEVEL']."</div>
														<div class = 'ellipsis' style= 'grid-area: email'>".$student_row['EMAIL']."</div>
														<div class = 'ellipsis' style= 'grid-area: options'>
															<a href = 'propose-pupil-selections.php?student=".str_replace(" ", "-", ($student_row['FIRST_NAME'].' '.$student_row['LAST_NAME']))."'>Add selection recommendation</a>
														</div>
													";
												}
												echo "
												</div>";
											}
											echo "</div>";
										}
									//for ($student_with_teacher_aid = 0; $student_with_teacher_aid < ;$student_with_teacher_aid++){
									//$_SESSION['id']
									//}
									echo "</div>" ;
								}
							}
							if($_SESSION['privilege'] >= 1){
								echo'
								<div class="content">
								<h3><u>Teacher Privileges</u></h3>';

								$teacherClassesQuery = "SELECT classes.id FROM classes INNER JOIN class_teachers ON classes.id = class_teachers.class_id WHERE teacher_id = $_SESSION[id]";
								$teacherResult = mysqli_query($dbconnect,$teacherClassesQuery);
								//echo $_SESSION["name"];
								if(mysqli_num_rows($teacherResult) != 0) {
									echo '<h4><u>Classes you\'re teaching</u></h4>';
									echo '<div class = "teacher-class-content">';
								
								while($teacherClasses_row = $teacherResult->fetch_assoc()){
									echo"<div class = 'classes-content'>";
									echo "<div style= 'grid-area: code'>".$teacherClasses_row['code']."</div>";
									echo "<div style= 'grid-area: name'>".$teacherClasses_row['name']."</div>";
									echo "<div style= 'grid-area: type;'>Qualification ".$teacherClasses_row['type']."</div>";
									echo "<div style= 'grid-area: options;'> <a href='Recommend-a-student.php?code=".str_replace(" ", "-", ($teacherClasses_row['code']))."'>Recommend a year ".$teacherClasses_row['year']." student for".$teacherClasses_row{'code'}."</a></div>";

									echo"</div>";
								}
								echo' 
								</div>';
								} else {
									echo '<h4><u>You\'re not currently teaching any classes</u></h4>';
								}
								
								
							echo '</div>
							';
							//$teacher_name = (mysqli_query($dbconnect,("SELECT FIRST_NAME FROM teachers WHERE ID = ".$_SESSION['id']))->fetch_assoc())['FIRST_NAME'];
							//echo $teacher_name;
							
						}
						if($_SESSION['privilege'] >= 2){
							$studentCountQuery = "SELECT COUNT(id) as count FROM students";
							$studentCount = mysqli_query($dbconnect,$studentCountQuery)->fetch_assoc()['count'];

							$studentCompleteCountQuery = "SELECT CONCAT(students.first_name, ' ', students.last_name) AS name, COUNT(selections.id) AS selections FROM students LEFT JOIN selections ON students.id = selections.student_id  WHERE year_level = 9 AND 'selections' = 0 OR year_level = 10 AND 'selections' = 0 OR year_level = 11 AND 'selections' = 0 OR year_level = 12 AND 'selections' = 0 OR year_level = 13 AND 'selections' = 0 GROUP BY selections.student_id";
							$studentCompleteCountResult = mysqli_query($dbconnect,$studentCompleteCountQuery);
							$studentCompleteCount = mysqli_num_rows($studentCompleteCountResult);
							echo '
							<div class="content">
							<h3><u>Moderater Privileges</u></h3>
								<a href=staff-class-submit.php>Create a Class</a>
								<br>
								<br>
								Students that have completed Selections : '.$studentCompleteCount.'/'.$studentCount.'
								<br>
								<br>
								Students that have not completed Selections : '.($studentCount-$studentCompleteCount).'/'.$studentCount.'
							</div>
							';
						}
						if($_SESSION['privilege'] >= 3){
							echo'
							<div class="content">
								<h3><u>Admin Privileges</u></h3>
								<a href="admin-tool.php">Administrative Tools</a>
							</div>
							';
						}
					?>
					
				</div>
				
				
			</div>
		</div>
	</font>

</body>
</html>
