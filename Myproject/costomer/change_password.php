<form action=" " method="post">

<table width="500" align="center">
<tr align="center">
    <td colspan="4"><h2>Change Your Password</h2></td>
</tr>
<tr>
    <td>Enter Current Password</td>
    <td><input type="password" name="old_pass" required></td>
</tr>

<tr>
    <td>Enter New Password</td>
    <td><input type="password" name="new_pass" required></td>
</tr>
<tr>
    <td>Enter New Password Again</td>
    <td><input type="password" name="new_pass_again" required></td>
</tr>

<tr align="center">
    <td colspan="4"><input type="submit" name="change_pass" value="Change_Password"></td>
</tr>
</table>


</form>

<?php

include("includes/db.php");

$c=$_SESSION['customer_email'];

if(isset($_POST['change_pass']))

{
    $old_pass=$_POST['old_pass'];
    $new_pass=$_POST['new_pass'];
    $new_pass_again=$_POST['new_pass_again'];
    $get_real_pass="select * from customer where customer_password='$old_pass'";
    $run_real_pass=mysqli_query($con,$get_real_pass);
    $check_pass=mysqli_num_rows($run_real_pass);

    if($check_pass==0)
    {
        echo "<script>alert('your current password is not valid, try again')</script>";
        exit();
    }

    if($new_pass!=$new_pass_again)
    {
        echo "<script>alert('New password match, try again')</script>";
        exit();
    }

    else
    {
        $update_password="update customer set customer_password='$new_pass' where customer_email='$c'";
        $run_pass=mysqli_query($con,$update_password);

        echo "<script>alert('your password has been succesfully change!')</script>";
        echo "<script>window.open('my_account.php','_self')</script>";
    }
}

?>