<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Admin Tools</title>
	<link rel="stylesheet" type="text/css" href="Styles/admin-tool.css">
	<link rel="stylesheet" type="text/css" href="Styles/nav.css">
	<link rel="stylesheet" type="text/css" href="Styles/main.css">
	
</head>


<body>
	<?php
        include ('PhpSnippets/header-bar.php');
	?>
	<div id ="main">
		<div id= "mainGrid">
			<div id="background_toggles">
				<div id="teacherManage"> <!-- Box/Container for the Content in the Teacher name 
				list & Admin name -->
					<div id="teacherList" >
						<header>
							<img src="Images/portrait-placeholder.png" alt="Profile picture" style="height: 50px;justify-self: center;border-radius: 50%;">
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
								<img src="Images/student-pic.png" width=20px height=20px>
								<h4><?php echo $rows['FIRST_NAME']; ?></h4> 
								<img src="Images/red-dot.png" alt="gears" width=5px height=5px>
							</div>
							<?php
								}
							?>
				
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
								<img src="Images/portrait-placeholder.png" alt="Profile picture" style="height: 50px; border-radius: 50%;">
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
									<p> Class Description- blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah</p> 
								</div>
								<div class="suggestion">
									<h4> Suggestion </h4>
									<input value="" class="suggest" type="text" placeholder="Comment blah blah" padding=20rem>
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
									<input value="" class="suggest" type="text" placeholder="Comment blah blah" padding=20rem>
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
									<input value="" class="suggest" type="text" placeholder="Comment blah blah" padding=20rem>
								</div>
								<div class="send">
									<h4>send</h4>
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