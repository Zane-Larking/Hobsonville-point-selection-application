<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    
	<?php
		include 'DataBase/database-connect.php';
    ?>
    <?php 
        $query = "Select `email` FROM `staff` WHERE `privileges` = 3";
        $result = mysqli_query($dbconnect, $query);
        $adminEmail = mysqli_fetch_array($result)["email"];
    ?>
    <script src="main.js"></script>
</head>
<body>
    <div class="main-content">
        <h1 class="page-title">Access Denied</h1>
        <p>You do not have access to this page.</p>
        <p>You can return to the homepage <a href="index.php">here</a>.</p>
        <p>If you think this is an error contact the system administator at <b><?php echo $adminEmail;?></b>.</p>
    </div>

</body>
</html>