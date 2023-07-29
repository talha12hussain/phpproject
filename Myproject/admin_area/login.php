<?php

session_start();

include("includes/db.php");




?>






<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Animated Login Form | CodingNepal</title>
    <link rel="stylesheet" href="login.css" media="all" />
  </head>
  <body>
    <div class="center">
      <h1> Admin Login</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" name="admin_email" required />
          <span></span>
          <label>Admin Email</label>
        </div>
        <div class="txt_field">
          <input type="password" name="admin_password" required />
          <span></span>
          <label>Password</label>
        </div>
        <input type="submit" name="login" value="Admin Login" />
       
      </form>
    </div>
    <h2 style="color:white; text-align:center; padding:20px;"><?php echo @$_GET['logout'];  ?></h2>
  </body>
</html>

<?php

if(isset($_POST['login']))
{
    $user_email=$_POST['admin_email'];
    $user_pass=$_POST['admin_password'];

    $sel_admin="select * from admins where admin_email='$user_email' and admin_pass='$user_pass'";
    $run_admin=mysqli_query($con,$sel_admin);
    $check_admin=mysqli_num_rows($run_admin);

    if($check_admin==1)
    {

        $_SESSION['admin_email']=$user_email;

        echo "<script>window.open('index.php?logged_in=you Succesfully Logged in')</script>";
    }
    else
    {
        echo "<script>alert('Admin Email OR password Is Incorrect')</script>";

    }
}


?>