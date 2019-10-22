<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Teacher Homepage</title>
		<link rel="stylesheet" type="text/css" href="Styles/create-classes-style.css">
		<link rel="stylesheet" type="text/css" href="Styles/main.css">
		<link rel="stylesheet" type="text/css" media="screen" href="Styles/nav.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="Styles/teacher-homepage.css" />	
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
							<h1><font face ="Verdana">Teacher Homepage</font></h1>
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
						<a href="teacher-class-submit.php">Submit Classes</a>
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
										$query = "SELECT ID, CONCAT(FIRST_NAME, ' ', LAST_NAME) AS NAME, EMAIL, YEAR_LEVEL, HPSS_NUM, `SELECTIONS_M&S` FROM students WHERE ID = " . join(" OR ID = ", $_SESSION['hublings']);
										//echo $query;
										$result = mysqli_query($dbconnect, $query);
										while($row = $result->fetch_assoc()) {
											echo "
											<div class = 'user-grid-container'>
												<img src= "; if (isset($row['PICTURE'])) echo $row['PICTURE'];  else echo"'Images/portrait-placeholder.png' height='50rem' style= 'grid-area: image;'>
												<div class = 'ellipsis' style= 'grid-area: name'>".$row['NAME']."</div>
												<div class = 'ellipsis' style= 'grid-area: year-level'>Year ".$row['YEAR_LEVEL']."</div>
												<div class = 'ellipsis' style= 'grid-area: email'>".$row['EMAIL']."</div>
												
												<div class = 'ellipsis' style= 'grid-area: options; padding-right:3px; display: grid; align-items: center; justify-content: end; grid-auto-flow: column; grid-gap: 5px; grid-auto-columns: max-content;'>
													<div style='border-style:solid; text-align:right; width:9px; height:9px; border-width:1px; border-radius:25px; background-color:"; 



														if(mysqli_query($dbconnect, "SELECT CHOICES FROM verified_choices WHERE STUDENT_ID = ".$row['ID'])->num_rows === 1){
															echo"green";
														}else if($row['SELECTIONS_M&S'] !== null){
															echo"orange";
														}else{
															echo"red";
														}

													echo";'></div>
													<a href = 'selection-verification.php?student=".str_replace(" ", "-", $row['NAME'])."'>View Selections</a>
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
									<h3><u>Teacher Aid Privileges</u></h3>
									<h4><u>Propose pupil selection advice</u></h4>
									<br>
									<div class = "aid-grid-container">
									
								';
									$teacher_query = ("SELECT * FROM teacher_aid WHERE TEACHER_ID = ".$_SESSION['id']);
									$teacher_result = mysqli_query($dbconnect, $teacher_query);
									if($teacher_result != NULL) {
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
									} else {
										echo "<div style='padding:10px'>There are no students found to be associated with you</div>";
									}

								//for ($student_with_teacher_aid = 0; $student_with_teacher_aid < ;$student_with_teacher_aid++){
								//$_SESSION['id']
								//}
								echo "</div>
								</div>" ;
							}
							if($_SESSION['privilege'] >= 1){
								echo'
								<div class="content">
								<h3><u>Teacher Privileges</u></h3>

									<h4><u>Classes you\'re teaching</u></h4>
									
									<div class = "teacher-class-content">';
									$teacherNameQuery = "SELECT * FROM classes WHERE TEACHER1 = 'Jack Freeth'";
									$teacherResult = mysqli_query($dbconnect,$teacherNameQuery);
									while($teacherClasses_row = $teacherResult->fetch_assoc()){
										echo"<div class = 'classes-content'>";
										echo "<div style= 'grid-area: name'>".$teacherClasses_row['CODE']."</div>";
										echo "<div style= 'grid-area: year-level'>".$teacherClasses_row['NAME']."</div>";
										echo "<div style= 'grid-area: email;'>Qualification ".$teacherClasses_row['QUAL']."</div>";
										echo "<div style= 'grid-area: options;'> <a href='Recommend-a-student.php?code=".str_replace(" ", "-", ($teacherClasses_row['CODE']))."'>Recommend a qualification ".$teacherClasses_row['QUAL']." student for".$teacherClasses_row{'CODE'}."</a></div>";

										echo"</div>";
									}
									echo'
									</div>
								</div>
								';
								//$teacher_name = (mysqli_query($dbconnect,("SELECT FIRST_NAME FROM teachers WHERE ID = ".$_SESSION['id']))->fetch_assoc())['FIRST_NAME'];
								//echo $teacher_name;
								
							}
							if($_SESSION['privilege'] >= 2){
								$studentCountQuery = "SELECT * FROM students";
								$studentCountResult = mysqli_query($dbconnect,$studentCountQuery);
								$studentCount = mysqli_num_rows($studentCountResult);
								$studentCompleteCountQuery = "SELECT * FROM verified_choices";
								$studentCompleteCountResult = mysqli_query($dbconnect,$studentCompleteCountQuery);
								$studentCompleteCount = mysqli_num_rows($studentCompleteCountResult);
								echo '
								<div class="content">
								<h3><u>Moderater Privileges</u></h3>
									<a href=teacher-class-submit.php>Create a Class</a>
									<br>
									<br>
									Students that have completed Selections '.$studentCompleteCount.'/'.$studentCount.'
									<br>
									Students that have not completed Selections '.($studentCount-$studentCompleteCount).'/'.$studentCount.'
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
