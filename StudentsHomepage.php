<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Student Homepage</title>
		<link rel="stylesheet" type="text/css" href="Styles/CreateClassesStyle.css">
		<link rel="stylesheet" type="text/css" href="Styles/main.css">
		<link rel="stylesheet" type="text/css" media="screen" href="Styles/nav.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="Styles/StudentsHomepage.css" />

	</head>
	<body>
		<?php
		include ('HtmlSnippets/headerBar.php');
		?>

		<font face = "Verdana">
		<div id ="main">
			<div id="mainGrid">
				<div id = "head">
					<img src="Images/HPSSLogo.png" alt="HPSS Logo" style="height: 5em">
					<div>
						<h1><font face ="Verdana">Student Homepage</font></h1>
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
					<div id = "grid-container">
						<img src= <?php echo $_SESSION['picture']; ?> height="75rem" style= "grid-area: image">
						<div style= "grid-area: YL">Year <?php echo $_SESSION['yearLevel']; ?></div>
						<div style= "grid-area: name"><?php echo $_SESSION['name']; ?></div>
						<div style= "grid-area: email"><?php echo $_SESSION['email']; ?></div>
					</div>
				</div>
				<div id="content">

					Chosen classes<br><br>
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
	</body>

</html>
