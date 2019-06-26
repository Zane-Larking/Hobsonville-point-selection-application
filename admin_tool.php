<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Admin Tools</title>
	<link rel="stylesheet" type="text/css" href="Styles/admin_tool.css">
	<link rel="stylesheet" type="text/css" href="Styles/nav.css">
	<link rel="stylesheet" type="text/css" href="Styles/main.css">
	
</head>


<body>
	<?php
        include ('PhpSnippets/headerBar.php');
	?>
	<div id ="main">
		<div id= "mainGrid">
			<div id="background_toggles">
				<div id="teacherManage"> <!-- Box/Container for the Content in the Teacher name 
				list & Admin name -->
					<div id="teacherList" >
						<header>
							<img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 50px;justify-self: center;border-radius: 50%;">
							<hgroup>
							<h1> Admin Name </h1>
							<!-- <h2> Profile </h2> -->
							</hgroup>
						</header>

						<div class="searchBar">
							<div class="material-icons prefix">search</div>
							<input value="" class="search" type="text" placeholder="Search Teachers" margin=0px 10px>
						</div>

						<div id="teachers"> <!-- Id for Teacher name list -->
							<!--
							Teacher Names
							-->
				
							<div>
								<img src="Images/studentPic.png" width=20px height=20px>
								<h4>Teacher 1</h4> 
								<img src="Images/redDot.png" alt="gears" width=5px height=5px>
							</div>

							<div>
								<img src="Images/studentPic.png" width=20px height=20px>
								<h4>Teacher 2</h4> 
								<img src="Images/redDot.png" alt="gears" width=5px height=5px>
							</div>
							<div>
								<img src="Images/studentPic.png" width=20px height=20px>
								<h4>Teacher 3</h4> 
								<img src="Images/redDot.png" alt="gears" width=5px height=5px>
							</div>
							<div>
								<img src="Images/studentPic.png" width=20px height=20px>
								<h4>Teacher 4</h4> 
								<img src="Images/redDot.png" alt="gears" width=5px height=5px>
							</div>
							<div>
								<img src="Images/studentPic.png" width=20px height=20px>
								<h4>Teacher 5</h4> 
								<img src="Images/redDot.png" alt="gears" width=5px height=5px>
							</div>
							<div>
								<img src="Images/studentPic.png" width=20px height=20px>
								<h4>Teacher 6</h4> 
								<img src="Images/redDot.png" alt="gears" width=5px height=5px>
							</div>
				
						</div>
						<div id="functions">
							<div id="addTeacher">
								<h4> Add Teacher </h4>
							</div>
							<div id="removeTeacher">
								<h4> Remove Teacher </h4>
							</div>
							<div id="Export">
								<img src="Images/export.png" width=40px height=40px>
							</div>
						</div>
					</div>


					<div id="Content">
						<div id="topBar">
							<header>
								<img src="Images/Portrait_Placeholder.png" alt="Profile picture" style="height: 50px; border-radius: 50%;">
								<h1> Teacher Name </h1>
								<h2> Subject </h2>
								<h2> Years </h2>
							</header>
							<div id="classes">
								<div>
									<h2> Classes </h2>
								</div>
								<div>
									<h2> Profile </h2>
								</div>
							</div>
						</div>
						<div id="wrapper">
							<div class="block">
								<h4> Class 1</h4>
								<div> 
									<p> Class Description- blah blah blah</p> 
								</div>
								<div class="suggestion">
									<h4> Suggestion </h4>
									<input value="" class="suggest" type="text" placeholder="Comment blah blah" padding=20rem>
								</div>
							</div>
							<div class="block">
								<h4> Class 2</h4>
								<div> 
									<p> Class Description- blah blah blah</p> 
								</div>
							</div>
							<div class="block">
								<h4> Class 3</h4>
								<div> 
									<p> Class Description- blah blah blah</p> 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script> 
	</script>
</body>
</html>