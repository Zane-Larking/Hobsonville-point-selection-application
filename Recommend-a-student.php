<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Recommending for <?php echo str_replace("-", " ", $_GET['code'])?>s</title>
		<link rel="stylesheet" type="text/css" href="Styles/main.css">
		<link rel="stylesheet" type="text/css" media="screen" href="Styles/nav.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="Styles/teacher-hub-verification.css" />
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
							<h1><font face ="Verdana">Recommend for <?php echo str_replace("-", " ", $_GET['code'])?></font></h1>
						</div>
					</div>
					<div id ="coverage">
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
						Picture<br>
						Name<br>
						Hub students and their classes<br>
						Class they are teaching<br>
						Timetable<br>

					</div>
					<div id="selections">

					</div>
					<footer id="textBox">
					</footer>
				</div>
			</div>
		</font>
	</body>
</html>
