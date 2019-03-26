<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Teacher Homepage</title>
		<link rel="stylesheet" type="text/css" href="Styles/CreateClassesStyle.css">
		<link rel="stylesheet" type="text/css" href="Styles/main.css">
		<link rel="stylesheet" type="text/css" media="screen" href="Styles/nav.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="Styles/TeachersHomepage.css" />	
	</head>

  	<body>
  		<?php
		include ('PhpSnippets/headerBar.php');	
		?>

	    <font face = "Verdana">
		    <div id="main">
			    <div id ="mainGrid">
				    <div id = "head">
						<img src="Images/HPSSLogo.png" alt="HPSS Logo" style="height: 5em">
						<div>
							<h1><font face ="Verdana">Teacher Homepage</font></h1>
						</div>
					</div>
					<div id ="pannel">
						<div>
							<a href="">Module and Spin Selection</a>
						</div>
						<br>
						<div>
							<a href="">Project Selection</a>
						</div>
						<br>
						<div>
							<a href="">Floortime Selection</a>
						</div>
					</div>
					<div id="profile">
						<div id = "user-grid-container">
							<img src= <?php echo $_SESSION['picture']; ?> height="75rem" style= "grid-area: image">
							<div class = "ellipsis" style= "grid-area: name"><?php echo $_SESSION['name']; ?></div>
							<div class = "ellipsis" style= "grid-area: email"><?php echo $_SESSION['email']; ?></div>
						</div>
						<!--Hub students and their classes-->
						<div id = "hublings">
							<?php
							/*
								foreach ($_SESSION['hublings'].split as $studentId) {
									$studentId
								};
								*/
								include "DataBase/Databaseconnect.php";
								foreach ($_SESSION['hublings'] as $id) {
									
								}
								$query = "SELECT ID, CONCAT(FIRST_NAME, ' ', LAST_NAME) AS NAME, EMAIL, YEAR_LEVEL, HPSS_NUM FROM students WHERE ID = " . join(" OR ID = ", $_SESSION['hublings']);
								//echo $query;
								$result = mysqli_query($dbconnect, $query);
								while($row = $result->fetch_assoc()) {
									echo "
									<div id = 'user-grid-container'>
										<img src= "; if (isset($row['PICTURE'])) echo $row['PICTURE'];  else echo"'Images/Portrait_Placeholder.png' height='50rem' style= 'grid-area: image;'>
										<div class = 'ellipsis' style= 'grid-area: name'>".$row['NAME']."</div>
										<div class = 'ellipsis' style= 'grid-area: email'>".$row['EMAIL']."</div>
										<div class = 'ellipsis' style= 'grid-area: options'><a href = 'SelectionVerification.php?student=".str_replace(" ", "-", $row['NAME'])."'>View Selections</a></div>
									</div>";
										
								}
							?>
						</div>
						

					</div>
					<div id="content">
						Class they are teaching<br><br>
						Modules:<br><br>
						Spins:<br><br>
						Floortimes:<br><br>
						Projects:<br><br>

					<div id="grid-container">
					  	<div class="grid-item">1</div>
					  	<div class="grid-item">2</div>
					  	<div class="grid-item">3</div>
					  	<div class="grid-item">4</div>
					  	<div class="grid-item">5</div>
					  	<div class="grid-item">6</div>
					  	<div class="grid-item">7</div>
					  	<div class="grid-item">8</div>
					  	<div class="grid-item">9</div>
					</div>

					</div>
				</div>
			</div>
		</font>
	</body>
</html>
