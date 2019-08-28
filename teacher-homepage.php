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
		include ('PhpSnippets/header-bar.php');	
		?>

	    <font face = "Verdana">
		    <div id="main">
			    <div id ="mainGrid">
				    <div id = "head">
						<img src="Images/hpss-logo.png" alt="HPSS Logo" style="height: 5em">
						<div> 
							<h1><font face ="Verdana">Teacher Homepage</font></h1>
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
							<div id = "user-grid-container">
								<img src= "'; echo $_SESSION["picture"]; echo '" height="75rem" style= "grid-area: image">
								<div class = "ellipsis" style= "grid-area: name">';echo $_SESSION["name"]; echo '</div>
								<div class = "ellipsis" style= "grid-area: email">';echo $_SESSION["email"]; echo '</div>
							</div>
							<!--Hub students and their classes-->
							<div id = "hublings">
							';
						
								/*
									foreach ($_SESSION['hublings'].split as $studentId) {
										$studentId
									};
									*/
									include "DataBase/database-connect.php";
									foreach ($_SESSION['hublings'] as $id) {
										
									}
									$query = "SELECT ID, CONCAT(FIRST_NAME, ' ', LAST_NAME) AS NAME, EMAIL, YEAR_LEVEL, HPSS_NUM, `SELECTIONS_M&S` FROM students WHERE ID = " . join(" OR ID = ", $_SESSION['hublings']);
									//echo $query;
									$result = mysqli_query($dbconnect, $query);
									while($row = $result->fetch_assoc()) {
										echo "
										<div id = 'user-grid-container'>
											<img src= "; if (isset($row['PICTURE'])) echo $row['PICTURE'];  else echo"'Images/portrait-placeholder.png' height='50rem' style= 'grid-area: image;'>
											<div class = 'ellipsis' style= 'grid-area: name'>".$row['NAME']."</div>
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
								echo '
							</div>
						</div>
								';
							}
							if($_SESSION['privilege'] >= 0){
								echo'
								<div class="content">
									Teacher Aid Placeholder
								</div>
								';
							}
							if($_SESSION['privilege'] >= 1){
								echo'
								<div class="content">
									Teacher Placeholder
								</div>
								';
							}
							if($_SESSION['privilege'] >= 2){
								echo'
								<div class="content">
									Moderator Placeholder
								</div>
								';
							}
							if($_SESSION['privilege'] >= 3){
								echo'
								<div class="content">
									Admin Placeholder
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
