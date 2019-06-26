<?php

include 'connect.php';

$code = $_GET['code'];

if (!$code)
    echo "No code supplied";
else
{
    $check = mysql_query("SELECT * FROM users WHERE code='$code' AND active='1'");
    if (mysql_num_rows($check)==1)
        echo "You have already activated your account";
    else
    {
        $activate = mysql_query("UPDATE users SET active='1' WHERE code='$code'");
        echo "Your account has been activated!";
    }

}
?>
