<?php

include 'database-connect.php';

if ($_POST['register'])
{
 //get form data
 $username = addslashes(strip_tags($_POST['username']));
 $password = addslashes(strip_tags($_POST['password']));
 $email = addslashes(strip_tags($_POST['email']));

 if (!$username||!$password||!$email)
    echo "Please fill out all fields";
 else
 {
    //encrypt password
    $password = md5($password);

    //check if username already taken
    $resukt = mysql_query("SELECT * FROM users WHERE username='$username'");
    if (mysql_num_rows($check)>=1)
       echo "Username already taken";
    else
    {
       //generate random code
       $code = rand(11111111,99999999);

       //send activation email
       $subject = "Activate your account";
       $headers = "From: Admin@hobsonvillepoint.school.nz";
       $body = "Hello $username,\n\nYou registered and need to activate your account. Click the link below or paste it into the URL bar of your browser\n\nhttp://phpacademy.info/tutorials/emailactivation/activate.php?code=$code\n\nThanks!";

       if (!mail($email,$subject,$body,$headers))
           echo "We couldn't sign you up at this time. Please try again later.";
       else
       {
           //register into database
           $register = mysql_query("INSERT INTO users VALUES ('','$username','$password','$email','$code','0')");
           echo "You have been registered successfully! Please check your email ($email) to activate your account";
       }

    }
 }
}
else
{

?>

<form action='register.php' method='POST'>
Choose username:<br />
<input type='text' name='username'><p />
Choose password:<br />
<input type='password' name='password'><p />
Email:<br />
<input type='text' name='email'><p />
<input type='submit' name='register' value='Register'>
</form>

<?php

}

?>
