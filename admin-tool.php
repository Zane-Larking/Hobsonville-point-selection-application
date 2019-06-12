<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Admin Tools</title>
	<link rel="stylesheet" type="text/css" href="Styles/admin-tool.css">
	<link rel="stylesheet" type="text/css" href="Styles/nav.css">
	<link rel="stylesheet" type="text/css" href="Styles/main.css">
	<link rel="stylesheet" type="text/css" href="Styles/admin-tool-modal.css"
	
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

						<div class="search_bar">
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


										  
										  Is a hub coach:<br>
										  <input type="radio" name="have_hub" value="Yes" checked> Yes
										  <br>
										  <input type="radio" name="have_hub" value="No"> No
										  <br>
										  	<div class="modal-content-style">
												<h4> Privilege Level:</h4>
												<select class="modal-content-input">
													<option value="teacher"> Teacher </option>
													<option value="moderator"> Moderator </option>
													<option value="administrator"> Administrator </option>
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
	
	<script src="Scripts/modal.js"></script>
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