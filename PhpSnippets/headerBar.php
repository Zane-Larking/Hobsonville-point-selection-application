<?php
  session_start();

  if (!isset($_SESSION['access_token'])) {
    header('Location: Login.php');
    exit();
  }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {

    }
?>
<script>
    function changeEventHandler(event) {

        // The styling was bugged when I used the form in the headerbar, so I create it only when I need to submit 'Qual'.
        var form = document.createElement("form");
        form.setAttribute("method", "get");

        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", document.querySelector("#YearLevel").name);
        hiddenField.setAttribute("value", document.querySelector("#YearLevel").value);

        form.appendChild(hiddenField);


        document.body.appendChild(form);
        form.submit();
    }
</script>
<header>
    <div id="grid-container">
        <div id ="SchoolLogo" class = "Logo">
            <img src="Images/HPSSLogo.png" height="25rem">
        </div>
        <div id ="ZealussLogo" class = "Logo">
            <img src="Images/ZealussLogo.png" height="25rem">
        </div>
        <nav>
            <a href="ModulesAndSpins.php">Modules & Spins</a>
            <a href="floortimes.php">FloorTimes</a>
            <a href="projects.php">Projects</a>
            <a href="index.php">Home</a>
        </nav>
        <select id="YearLevel" name="Qual" onchange="changeEventHandler();">
            <option value="0" <?php if (isset($_GET["Qual"]) && $_GET["Qual"]==0){echo "selected";}?>>FF</option>
            <option value="1" <?php if (isset($_GET["Qual"]) && $_GET["Qual"]==1){echo "selected";}?>>Q1</option>
            <option value="2" <?php if (isset($_GET["Qual"]) && $_GET["Qual"]==2){echo "selected";}?>>Q2</option>
            <option value="3" <?php if (isset($_GET["Qual"]) && $_GET["Qual"]==3){echo "selected";}?>>Q3</option>
        </select>
        <script>
        function drop() {
            document.getElementById("dropdown").classList.toggle("show");
        }



        </script>
        <div id ="ProfileDropdown">
          <!--"Images/Portrait_Placeholder.png"-->
            <img src= <?php echo $_SESSION['picture'] ?> height="25rem" >
            <a href="logout.php"><div>Logout</div></a>
            <div id ="dropdownArrow1"></div>
            <div></div>
        </div>
        <div class ='profileDropdownAbsolute'>
            <div class='dropdown-content'>
                <!-- links to go here -->
            </div>
        </div>
    </div>
</header>
