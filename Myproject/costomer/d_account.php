<form action="" method="post">

<table align="center" width="600">
    <tr align="center">
        <td><h2>Do You really Want To Delete Account</h2></td>
    </tr>

    <tr align="center">
        <td>
            <input type="submit" name="yes" value="Yes I Want To Delete">
        <input type="submit" name="no" value="I Do Not Want To Delete">
</td>
    </tr>


</form>

<?php

include("includes/db.php");

$c=$_SESSION['customer_email'];

if(isset($_POST['yes']))
{
   $delet_customer=" DELETE FROM customer WHERE customer_email='$c' ";
   $run_delete=mysqli_query($con,$delet_customer);

if($run_delete)
{

    session_destroy();

    echo "<script>alert('your account has been deleted, good by!')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
}



}

if(isset($_POST['no']))
{
    echo "<script>window.open('my_account.php','_self')</script>";
}
?>