
<?php
    /* reloads page to update a counter
    if(!isset($_GET['n'])){ 
        $_GET['n'] = 5; 
    } 

    if($_GET['n'] > 0){ 
        header('Refresh: 1; url=' . $_SERVER['PHP_SELF'].'?n=' . ($_GET['n']-1)  ); 
        echo "Redirecting to home in ".$_GET['n']." seconds" ; 
    } 
    else{ 
        header("Location: ModulesAndSpins.php");
    } 
    */

    header('Refresh: 3; url=' ."index.php"); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="Styles/main.css" />
    </head>
    <body>
        <article id="main">
            <div id="mainGrid">
                <center>
                    <div style="background-color: rgb(255,255,255); width: fit-content; padding: 50px;">
                        <h1>
                            Selections submitted successfully<br>
                            Redirecting to homepage in 3 seconds
                        </h1>
                    </div>
                </center>
            </div>
        </article>
    </body>
</html>