
<DOCTYPE html>
<html class="no-js" lang="en">
<head>
<title>Teacher Student Class Check</title>
<link rel="stylesheet" type="text/css" href="Styles/CreateClassesStyle.css">

</head>
<body>
<font face = "Verdana">
<div style="background-color:White;width:60%;height:auto; margin-left:20%; border:1px solid black;padding:15px;">
<img src="images/HPSSLogo.png" alt="HPSS Logo" style="height: 100px">
<script> function bigFatFunction() {

alert("Class Submission Succesful!")

}
  </script>
<p><form>
  <h1><font face ="Verdana">Class Submissions</font></h1>
  <!--Class Name:<br>
  <input class="ClassandTeachers" type="text" name="firstname"><br><br>
  Teacher 1:<br>
  <input class="ClassandTeachers" type="text" name="lastname"><br><br>
  Teacher 2:<br>
  <input class="ClassandTeachers" type="text" name="lastname"><br><br>
  Kamar Code:<br>
  <input class="ClassandTeachers" type="text" name="lastname"><br><br>
    Class Description:<br>
  <textarea class="TextAreas" type="text" name="Description" placeholder="Write discription.."></textarea><br><br>
-->
</form><br>
<!--<div class="row">
      <div class="classtype">
        <label for="ClassType">Class Type</label>
      </div>
      <select id="ClassType" name="ClassType">
        <option value="Module">Module</option>
        <option value="Spin">Spin</option>
        <option value="Floortime">Floortime</option>
        <option value="Projects">Projects</option>
      </select>
    </div>
<br><br>
-->
<!--<div class="row">
      <div class="ClassSubject">
        <label for="ClassSubject">Class Subject 1</label>
      </div>
      <select id="ClassSubject" name="ClassSubject">
        <option value="None"></option>
        <option value="Maths">Maths</option>
        <option value="English">English</option>
        <option value="Science">Science</option>
        <option value="Health/P.E">Health/P.E</option>
        <option value="Technology">Technology</option>
        <option value="Other..">Other..</option>
      </select>
    </div>
<br><br>-->
<!--<div class="row">
      <div class="ClassSubject">
        <label for="ClassSubject">Class Subject 2</label>
      </div>
      <select id="ClassSubject" name="ClassSubject">
        <option value="None">None</option>
        <option value="Maths">Maths</option>
        <option value="English">English</option>
        <option value="Science">Science</option>
        <option value="Health/P.E">Health/P.E</option>
        <option value="Technology">Technology</option>
        <option value="Other..">Other..</option>
      </select>
    </div>
<br><br>-->


<!--<button type="button" onclick="alert('Class Submitted')">Submit</button></p>      *don't need this anymore but pls don't remove*
</div>-->
</font>
</body>
</html>

<?php
echo'';
 ?>















 <?php
 // define variables and set to empty values
 $ClassNameErr = $NameErr = $QualErr = $Teacher1Err = $Teacher2Err = $TypeErr = $Sub1Err = $Sub2Err = "";
 $ClassName = $Name = $Qual = $Description = $Teacher1 = $Teacher2 = $Type = $Sub2 = $Sub1 = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $ClassNameErr = "Name is required";
   } else {
     $ClassName = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z1234567890 ]*$/",$ClassName)) {
       $ClassNameErr = "Only letters and white space allowed";
     }
   }

   if (empty($_POST["email"])) {
     $NameErr = "Email is required";
   } else {
     $Name = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($Name, FILTER_VALIDATE_EMAIL)) {
       $NameErr = "";
     }
   }

   if (empty($_POST["website"])) {
     $Teacher1 = "";
   } else {
     $Teacher1 = test_input($_POST["website"]);
     // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$Teacher1)) {
       $Teacher1Err = "";
     }
   }

   if (empty($_POST["webstite"])) {
     $Teacher2 = "";
   } else {
     $Teacher2 = test_input($_POST["webstite"]);
     // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$Teacher2)) {
       $Teacher2Err = "";
     }
   }

   if (empty($_POST["Description"])) {
     $Description = "";
   } else {
     $Description = test_input($_POST["Description"]);
   }

   if (empty($_POST["qual"])) {
     $QualErr = "qual is required";
   } else {
     $Qual = test_input($_POST["qual"]);
   }
 }

 if (empty($_POST["type"])) {
   $TypeErr = "Type is required";
 } else {
   $Type = test_input($_POST["type"]);
 }

 if (empty($_POST["Sub1"])) {
   $Sub1Err = "       Subject 1 is required";
 } else {
   $Sub1 = test_input($_POST["Sub1"]);
 }



if (empty($_POST["Sub2"])) {
 $Sub2Err = "       Subject 2 is required for spins";
} else {
 $Sub2 = test_input($_POST["Sub2"]);
}



 function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }

 //if(isset($_POST['Classtype']) )
//{
//  $Type = $_POST['Cat'];
//  $Type = $_POST['Dog'];
//  $Type = $_POST['Cow'];
//  $errorMessage = "";
//}

 ?>

 <font face = "Verdana">
 <p><span class="error">Must Fill all Fields</span></p>
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   Class Name:<br> <input type="text" class="ClassandTeachers" name="name" value="<?php echo $ClassName;?>">
   <span class="Classandteachers"> <?php echo $ClassNameErr;?></span>
   <br><br>
   Name:<br> <input type="text" class="ClassandTeachers" name="email" value="<?php echo $Name;?>">
   <span class="Classhandteachers"> <?php echo $NameErr;?></span>
   <br><br>

   Teacher 1:<br> <input type="text" class="ClassandTeachers" name="website" value="<?php echo $Teacher1;?>">
   <span class="ClassandTeachers"><?php echo $Teacher1Err;?></span>


   <br><br>

   Teacher 2:<br> <input type="text" class="ClassandTeachers" name="webstite" value="<?php echo $Teacher2;?>">
   <span class="ClassandTeachers"><?php echo $Teacher2Err;?></span>

   <br><br>
<!--
   Type : <br>


   <select id="ClassType" name="ClassType">
     <option value="0">--Select Animal--</option>
     <option value="Cat">Cat</option>
     <option value="Dog">Dog</option>
     <option value="Cow">Cow</option>
   </select>




   <option value="None">None</option>
   <option value="Maths">Maths</option>
   <option value="English">English</option>
   <option value="Science">Science</option>
   <option value="Health/P.E">Health/P.E</option>
   <option value="Technology">Technology</option>
   <option value="Other..">Other..</option>
   <input type ="text" class="ClassSubject" name="type" value="<php echo $Type;?>"-->

   Description: <br><textarea class="TextAreas" type="text" name="Description" placeholder="Write description.." value="<?php echo $Description;?>"></textarea>
   <br><br>
   Qual:
   <input type="radio" name="qual" <?php if (isset($Qual) && $Qual=="0") echo "checked";?> value="0">0
   <input type="radio" name="qual" <?php if (isset($Qual) && $Qual=="1") echo "checked";?> value="1">1
   <input type="radio" name="qual" <?php if (isset($Qual) && $Qual=="2") echo "checked";?> value="2">2
   <input type="radio" name="qual" <?php if (isset($Qual) && $Qual=="3") echo "checked";?> value="3">3
   <span class="error">* <?php echo $QualErr;?></span>
   <br><br>


   Type:
   <input type="radio" name="type" <?php if (isset($Type) && $Type=="Module") echo "checked";?> value="Module">Module
   <input type="radio" name="type" <?php if (isset($Type) && $Type=="Spin") echo "checked";?> value="Spin">Spin
   <input type="radio" name="type" <?php if (isset($Type) && $Type=="Floortime") echo "checked";?> value="Floortime">Floortime
   <input type="radio" name="type" <?php if (isset($Type) && $Type=="Project") echo "checked";?> value="Project">Project
   <span class="error">* <?php echo $TypeErr;?></span>
   <br><br>

   Subject1:
   <br>
   <input type="radio" name="Sub1" <?php if (isset($Sub1) && $Sub1=="Mathematics") echo "checked";?> value="Mathematics">Mathematics
   <br>
   <input type="radio" name="Sub1" <?php if (isset($Sub1) && $Sub1=="English") echo "checked";?> value="English">English
   <br>
   <input type="radio" name="Sub1" <?php if (isset($Sub1) && $Sub1=="Science") echo "checked";?> value="Science">Science
   <br>
   <input type="radio" name="Sub1" <?php if (isset($Sub1) && $Sub1=="Technology") echo "checked";?> value="Technology">Technology
   <br>
   <input type="radio" name="Sub1" <?php if (isset($Sub1) && $Sub1=="Health and PE") echo "checked";?> value="Health and PE">Health and PE
   <br>
   <input type="radio" name="Sub1" <?php if (isset($Sub1) && $Sub1=="Languages") echo "checked";?> value="Languages">Languages
   <br>
   <input type="radio" name="Sub1" <?php if (isset($Sub1) && $Sub1=="Arts") echo "checked";?> value="Arts">Arts
   <br><br>
   <span class="error">* <?php echo $Sub1Err;?></span>
   <br><br>

   Subject2:
   <br>
   <input type="radio" name="Sub2" <?php if (isset($Sub2) && $Sub2=="Mathematics") echo "checked";?> value="Mathematics">Mathematics
   <br>
   <input type="radio" name="Sub2" <?php if (isset($Sub2) && $Sub2=="English") echo "checked";?> value="English">English
   <br>
   <input type="radio" name="Sub2" <?php if (isset($Sub2) && $Sub2=="Science") echo "checked";?> value="Science">Science
   <br>
   <input type="radio" name="Sub2" <?php if (isset($Sub2) && $Sub2=="Technology") echo "checked";?> value="Technology">Technology
   <br>
   <input type="radio" name="Sub2" <?php if (isset($Sub2) && $Sub2=="Health and PE") echo "checked";?> value="Health and PE">Health and PE
   <br>
   <input type="radio" name="Sub2" <?php if (isset($Sub2) && $Sub2=="Languages") echo "checked";?> value="Languages">Languages
   <br>
   <input type="radio" name="Sub2" <?php if (isset($Sub2) && $Sub2=="Arts") echo "checked";?> value="Arts">Arts
   <br>
   <input type="radio" name="Sub2" <?php if (isset($Sub2) && $Sub2=="None") echo "checked";?> value="None">None
   <br><br>
   <span class="error">* <?php echo $Sub2Err;?></span>
   <br><br>





   <input class="button" type="submit" name="submit" value="Submit" onclick="bigFatFunction();">


 </form>

 <?php
 echo "<h2>Your Input:</h2>";
 echo $ClassName;
 echo "<br>";
 echo $Name;
 echo "<br>";
 echo $Teacher1;
 echo "<br>";
 echo $Teacher2;
 echo "<br>";
 echo $Description;
 echo "<br>";
 echo $Qual;
 echo "<br>";
 echo $Type;
 echo "<br>";
 echo $Sub1;
 echo "<br>";
 echo $Sub2;
 echo "<br>";
 ?>

 <?php



 //$query = mysql_query("INSERT INTO user_data () VALUES ('{$ClassName}')");




  ?>
