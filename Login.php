<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="Styles/Login.css">

<?php
include "DataBase/Databaseconnect.php";
$name = $password = "";
$sql = "SELECT * FROM 'Users' WHERE name = $name AND password = $password";



//mysqli_query
?>

</head>
<body>
<font face = "Verdana">
<div style="background-color:White;width:60%;height:auto; margin-left:20%; border:1px solid black;padding:15px;">
<img src="Images/HPSSLogo.png" alt="HPSS Logo" style="height: 100px">
<p><form>
  <h1><font face ="Verdana">*PlaceHolderName*</font></h1>
  <center>
  Username:<br><br>
  <input class="inputboxes" type="text" name="Username"value="<?php echo $name ?>" ><br><br>
  Password:<br><br>
  <input class="inputboxes" type="text" name="Password"value="<?php echo $password ?>"><br><br>

<script>
var color = 'red';
var checkpassword = function(e){
  color = 'green';
  el = document.body.style.backgroundColor = "red";
}
</script>
<style>body {

background-color: color;
}
</style>
<button id="SubmitLogin" class="button" onclick="if(event.preventDefault) event.preventDefault(); checkpassword();" >Login</button>

<!--<button type="button" onclick="alert('Class Submitted')">Submit</button></p>      *don't need this anymore but pls don't remove*
</div>-->
</center>
</font>
<?php

echo $name;
echo $password;

?>

</body>
</html>
