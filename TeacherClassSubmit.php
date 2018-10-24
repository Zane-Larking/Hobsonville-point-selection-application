<DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <title>Teacher Student Class Check</title>
  <link rel="stylesheet" type="text/css" href="Styles/CreateClassesStyle.css">
  <link rel="stylesheet" type="text/css" href="Styles/nav.css">
<?php
include "DataBase/Databaseconnect.php";
include "HTMLSnippets/classesConstants.php";
?>

  </head>
  <body>
    <?php

      include "HTMLSnippets/headerBar.php";
    ?>
    <font face = "Verdana">
    <div id = "main">
    <img src="images/HPSSLogo.png" alt="HPSS Logo" style="height: 100px">
    <h1><font face ="Verdana">Class Submissions</font></h1>


<?php
  //defines variables and set them to empty strings
  $ClassNameErr = $CodeErr = $QualErr = $Teacher1Err = $Teacher2Err = $TypeErr = $Sub1Err = $Sub2Err = "";
  $ClassName = $Code = $Qual = $Description = $Teacher1 = $Teacher2 = $Type = $Sub2 = $Sub1 = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Name
    if (empty($_POST["name"])) {
      $ClassNameErr = "Name is required";
    } else {
      $ClassName = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z1234567890 ]*$/",$ClassName)) {
        $ClassNameErr = "Only letters and white space allowed";
      }
    }

    //Code
    if (empty($_POST["code"])) {
      $NameErr = "Email is required";
    } else {
      $Code = test_input($_POST["code"]);
      // check if e-mail address is well-formed
      if (!filter_var($Code, FILTER_VALIDATE_EMAIL)) {
        $CodeErr = "";
      }
    }

    //teacher1
    if (empty($_POST["teacher1"])) {
      $Teacher1 = "";
    } else {
      $Teacher1 = test_input($_POST["teacher1"]);
      // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
      if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$Teacher1)) {
        $Teacher1Err = "";
      }
    }

    //teacher2
    if (empty($_POST["teacher2"])) {
      $Teacher2 = "";
    } else {
      $Teacher2 = test_input($_POST["teacher2"]);
      // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
      if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$Teacher2)) {
        $Teacher2Err = "";
      }
    }

    //description
    if (empty($_POST["description"])) {
      $Description = "";
    } else {
      $Description = test_input($_POST["description"]);
    }

    //qual
    if (empty($_POST["qual"])) {
      $QualErr = "qual is required";
    } else {
      $Qual = test_input($_POST["qual"]);
    }

    //type
    if (empty($_POST["typeName"]) || empty($_POST["typeCount"])) {
      $TypeErr = "Type is required";
    } else {
      $Type = test_input($_POST["typeName"]) . test_input($_POST["typeCount"]);
    }

    //sub1
    if (empty($_POST["sub1"])) {
      $Sub1Err = "       Subject 1 is required";
    } else {
      $Sub1 = test_input($_POST["sub1"]);
    }

    if (empty($_POST["sub2"])) {
    $Sub2Err = "       Subject 2 is required for spins";
    } else {
    $Sub2 = test_input($_POST["sub2"]);
    }
  }

  $sql = "insert into classes (`CODE`, `NAME`, `QUAL`, `TYPE`, `SUBJECT1`, `SUBJECT2`, `TEACHER1`, `TEACHER2`, `DESCRIPTION`) VALUES
  ('$Code', '$ClassName', $Qual, '$Type', '$Sub1', '$Sub2', '$Teacher1', '$Teacher2', '$Description');";

  $query = "select code from classes where code = '". $Code . "'";
  //echo $query;
  $result = mysqli_query($dbconnect, $query);
  $row = mysqli_fetch_array($result);
  //debugging
  

  // echo "<br> type: " . test_input($_POST['typeName']) . test_input($_POST['typeCount']);
  // echo "<br> \$_POST: " . json_encode($_POST);
  // echo "<br> <br> code values are equal: " . (string)($Code == $row['code']);
  // echo "<br> \$Code: \"" . $Code . "\"";
  // echo "<br> \$row['code']: " . json_encode($row['code']);

  // echo "<br> <br> \$query: \"" . $query . "\"";
  // echo "<br> mysqli_query(\$dbconnect, \$query): " . json_encode(mysqli_query($dbconnect, $query));
  // echo "<br> mysqli_fetch_array(\$result): " . json_encode(mysqli_fetch_array($result));
  
  if (!empty($_POST)){
    if (is_NULL($row['code'])){
      if (mysqli_query($dbconnect, $sql)) {
        echo "<script> alert('Class Submission Succesful!'); </script>";
      } else {
        echo "<script> alert('Class Submission failed!'); </script>";
      }
    }else {
        echo "<script> alert('Class Code already in use'); </script>";
    }
  }
  mysqli_close($dbconnect);

  //function to stop hackers entering malicious entries. (gets hoisted)
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

    <font face = "Verdana">
    <p><span class="error">Must Fill all Fields</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      
      Class Name: <br> 
      <input id="name" type="text" name="name" value="<?php echo $ClassName;?>">
      <span class="Classandteachers"> <?php echo $ClassNameErr;?></span>
      <br><br>

      Class Code: <br> 
      <input id="code" type="text" name="code" value="<?php echo $Code;?>">
      <span class="Classhandteachers"> <?php echo $CodeErr;?></span>
      <br><br>
      


      Qual: <br>
      <!-- inputs done together-->
      <?php
        for ($j = 0; $j <= 3; $j ++){
          echo "<input type='radio' name='qual'"; if (isset($Qual) && $Qual=='$j') echo 'checked'; echo "value='$j' onclick=\"
            j = $j
            switch (document.getElementById('TypeName').value) {
              case 'SPIN':
                if (CPYL['spins'][j] == 0) {
                  document.getElementById('TypeCount').disabled = true;
                  document.getElementById('TypeCount').innerHTML = '';
                }
                else {
                  document.getElementById('TypeCount').innerHTML = '"; for($i = 1; $i <= $CPYL['spins'][$j]; $i ++){echo "<option value=\'$i\'>$i</option>";} echo "';
                  document.getElementById('TypeCount').disabled = false;
                }
                break;
              case 'MODULE': 
                if (CPYL['modules'][j] == 0) {
                  document.getElementById('TypeCount').disabled = true;
                  document.getElementById('TypeCount').innerHTML = '';
                }
                else {
                  document.getElementById('TypeCount').innerHTML = '"; for($i = 1; $i <= $CPYL['modules'][$j]; $i++){echo "<option value=\'$i\'>$i</option>";} echo"';
                  document.getElementById('TypeCount').disabled = false;
                }
                break;
              case 'FLOORTIME': 
                if (CPYL['floorTimes'][j] == 0) {
                  document.getElementById('TypeCount').disabled = true;
                  document.getElementById('TypeCount').innerHTML = '';
                }
                else {
                  document.getElementById('TypeCount').innerHTML = '"; for($i = 1; $i <= $CPYL['floorTimes'][$j]; $i++){echo "<option value=\'$i\'>$i</option>";} echo"';
                  document.getElementById('TypeCount').disabled = false;
                }
                break;
              case 'PROJECT':
                document.getElementById('TypeCount').disabled = true;
                document.getElementById('TypeCount').innerHTML = '';
                break;
            }
          
          \">$j
          ";
        }
      ?>
      <!-- inputs done separate-->
      <!--
      <input type="radio" name="qual" <?php if (isset($Qual) && $Qual=="0") echo "checked";?> value="0" onclick="
        switch (document.getElementById('TypeName').value) {
          case 'SPIN': 
            document.getElementById('TypeCount').innerHTML = '<?php for($i = 1; $i <= $CPYL['spins'][0]; $i ++){echo "<option value=\'$i\'>$i</option>";}?> ';
            document.getElementById('TypeCount').disabled = false;
            break;
          case 'MODULE': 
            document.getElementById('TypeCount').innerHTML = '<?php for($i = 1; $i <= $CPYL['modules'][0]; $i++){echo "<option value=\'$i\'>$i</option>";}?> ';
            document.getElementById('TypeCount').disabled = false;
            break;
          case 'FLOORTIME': 
            document.getElementById('TypeCount').innerHTML = '<?php for($i = 1; $i <= $CPYL['floorTimes'][0]; $i++){echo "<option value=\'$i\'>$i</option>";}?> ';
            document.getElementById('TypeCount').disabled = false;
            break;
          case 'PROJECT':
            document.getElementById('TypeCount').disabled = true;
            break;
        }
        
        ">0
      <input type="radio" name="qual" <?php if (isset($Qual) && $Qual=="1") echo "checked";?> value="1" onclick="
        switch (document.getElementById('TypeName').value) {
          case 'SPIN': 
            document.getElementById('TypeCount').innerHTML = '<?php for($i = 1; $i <= $CPYL['spins'][1]; $i++){echo "<option value=\'$i\'>$i</option>";}?> ';
            document.getElementById('TypeCount').disabled = false;
            break;
          case 'MODULE': 
            document.getElementById('TypeCount').innerHTML = '<?php for($i = 1; $i <= $CPYL['modules'][1]; $i ++){echo "<option value=\'$i\'>$i</option>";}?> ';
            document.getElementById('TypeCount').disabled = false;
            break;
          case 'FLOORTIME': 
            document.getElementById('TypeCount').innerHTML = '<?php for($i = 1; $i <= $CPYL['floorTimes'][1]; $i++){echo "<option value=\'$i\'>$i</option>";}?> ';
            document.getElementById('TypeCount').disabled = false;
            break;
          case PROJECT: 
            document.getElementById('TypeCount').disabled = true;
            break;
        }
        
        ">1
      <input type="radio" name="qual" <?php if (isset($Qual) && $Qual=="2") echo "checked";?> value="2" onclick="
        switch (document.getElementById('TypeName').value) {
          case 'SPIN': 
            document.getElementById('TypeCount').innerHTML = '<?php for($i = 1; $i <= $CPYL['spins'][2]; $i++){echo "<option value=\'$i\'>$i</option>";}?> ';
            document.getElementById('TypeCount').disabled = false;
            break;
          case 'MODULE': 
            document.getElementById('TypeCount').innerHTML = '<?php for($i = 1; $i <= $CPYL['modules'][2]; $i++){echo "<option value=\'$i\'>$i</option>";}?> ';
            document.getElementById('TypeCount').disabled = false;
            break;
          case 'FLOORTIME': 
            document.getElementById('TypeCount').innerHTML = '<?php for($i = 1; $i <= $CPYL['floorTimes'][2]; $i++){echo "<option value=\'$i\'>$i</option>";}?> ';
            document.getElementById('TypeCount').disabled = false;
            break;
          case 'PROJECT': 
            document.getElementById('TypeCount').disabled = true;
            break;
        }
        
        ">2
      <input type="radio" name="qual" <?php if (isset($Qual) && $Qual=="3") echo "checked";?> value="3" onclick="
        switch (document.getElementById('TypeName').value) {
          case 'SPIN':
            document.getElementById('TypeCount').innerHTML = '<?php for($i = 1; $i <= $CPYL['spins'][3]; $i++){echo "<option value=\'$i\'>$i</option>";}?> ';
            document.getElementById('TypeCount').disabled = false;
          break;
          case 'MODULE': 
            document.getElementById('TypeCount').innerHTML = '<?php for($i = 1; $i <= $CPYL['modules'][3]; $i++){echo "<option value=\'$i\'>$i</option>";}?> ';
            document.getElementById('TypeCount').disabled = false;
          break;
          case 'FLOORTIME': 
            document.getElementById('TypeCount').innerHTML = '<?php for($i = 1; $i <= $CPYL['floorTimes'][3]; $i++){echo "<option value=\'$i\'>$i</option>";}?> ';
            document.getElementById('TypeCount').disabled = false;
          break;
          case 'PROJECT': 
            document.getElementById('TypeCount').disabled = true;
            break;
        }
        
        ">3
      -->
      <span class="error">* <?php echo $QualErr;?></span>
      <br><br>

      Type: <br>
      <!-- radials -->
      <!--
      <input type="radio" name="type" <?php if (isset($Type) && $Type=="Module") echo "checked";?> value="Module" onclick="document.getElementById('sub2').disabled = false;">Module
      <input type="radio" name="type" <?php if (isset($Type) && $Type=="Spin") echo "checked";?> value="Spin" onclick = "document.getElementById('sub2').disabled = true;">Spin
      <input type="radio" name="type" <?php if (isset($Type) && $Type=="Floortime") echo "checked";?> value="Floortime" onclick="document.getElementById('sub2').disabled = false;">Floortime
      <input type="radio" name="type" <?php if (isset($Type) && $Type=="Project") echo "checked";?> value="Project" onclick="document.getElementById('sub2').disabled = false;">Project
      <span class="error">* <?php echo $TypeErr;?></span>
      <br><br>
      -->
      <script>
        var sub2Value, teacher2Value;
        var responsiveSub2 = function() {
          typeName = document.getElementById("TypeName").value;
          sub2 = document.getElementById('sub2'); 
          if (typeName == "SPIN") {
            document.getElementById('sub2').disabled = true;
            document.getElementById('teacher2').disabled = true;
            document.getElementById('hideTeacherText').style.display = "none";
            
            teacher2Value = typeof document.getElementById('teacher2').value === "undefined" ? "" : document.getElementById('teacher2').value;
            document.getElementById('teacher2').setAttribute("value", "")

            sub2Value = document.getElementById('sub2').value;
            document.getElementById('sub2').setAttribute("value", "");
          }   
          else {
            if (sub2.disabled == true) {
              document.getElementById('sub2').disabled = false;
              document.getElementById('teacher2').disabled = false;
              document.getElementById('hideTeacherText').style.display = "block";
              
              document.getElementById('teacher2').setAttribute("value", teacher2Value);
              document.getElementById('sub2').setAttribute("value", sub2Value);
            }
          }
        }
      </script>
      <select class="ClassType" id="TypeName" name="typeName" onMouseOut = "responsiveSub2();">
        <option value="MODULE">Module</option>
        <option value="SPIN">Spin</option>
        <option value="FLOORTIME">Floor Time</option>
        <option value="PROJECT">Project</option>
      </select>
      <select class="ClassType" id="TypeCount" name="typeCount">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
      <br><br>
        

      Teacher 1: <br> 
      <input id="teacher1" type="text" class="ClassandTeachers" name="teacher1" value="<?php echo $Teacher1;?>">
      <span class="ClassandTeachers"><?php echo $Teacher1Err;?></span>

      <div id = "hideTeacherText">
        <br>
        Teacher 2:
      </div>
      <input id="teacher2" type="text" class="ClassandTeachers" name="teacher2" value="<?php echo $Teacher2;?>">
      <span class="ClassandTeachers"><?php echo $Teacher2Err;?></span>
      <br><br>

      Subject1:
      <br>
      <select name="sub1" width="50%">
        <?php 
          foreach($curriculum as $key => $displayed){
            echo "<option value='$key'>$displayed</option>";
          }
        ?>
      </select>
      <br><br>

      Subject2:
      <br>
      <select id="sub2" name="sub2" width="50%">
      <?php 
          foreach($curriculum as $key => $displayed){
            echo "<option value='$key'>$displayed</option>";
          }
        ?>
      </select>
      <br><br>

      Description: 
      <br>
      <textarea class="TextAreas" type="text" name="description" placeholder="Write description.." value="<?php echo $Description;?>"></textarea>
      <br><br>

      <!--Submit-->
      <input class="button" type="submit" name="submit" value="Submit" onclick="bigFatFunction();">

    </form>

    <?php
      echo "<h2>Your Inputs:</h2>";
      echo $ClassName;
      echo "<br>";
      echo $Code;
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

  </body>
</html>