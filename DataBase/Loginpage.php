<?php

include 'connect.php';

$session_username = $_SESSION['username'];

if ($_POST['login'])
{
   //get form data
   $username = addslashes(strip_tags($_POST['username']));
   $password = addslashes(strip_tags($_POST['password']));

   if (!$username||!$password)
      echo "Enter a username and password";
   else
   {
    //log in
    $login = mysql_query("SELECT * FROM users WHERE username='$username'");
    if (mysql_num_rows($login)==0)
       echo "No such user";
    else
    {
      while ($login_row = mysql_fetch_assoc($login))
      {

       //get database password
       $password_db = $login_row['password'];

       //encrypt form password
       $password = md5($password);

       //check password
       if ($password!=$password_db)
          echo "Incorrect password";
       else
       {
          //check if active
          $active = $login_row['active'];
          $email = $login_row['email'];

          if ($active==0)
             echo "You haven't activated your account, please check your email ($email)";
          else
          {
           $_SESSION['username']=$username; //assign session
           header("Location: index.php"); //refresh
          }
       }


      }
    }
   }
}
else
{

  if (isset($session_username))
  {
   echo "You are logged in, $session_username. <a href='logout.php'>Log out</a>";
  }
  else
  {
   echo "
   <form action='index.php' method='POST'>
   Username:

   <input type='text' name='username'><p />
   Password:

   <input type='password' name='password'><p />
   <input type='submit' name='login' value='Log in'>
   </form>
   ";
  }

}

?>
