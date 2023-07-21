<?php


@session_start();

include("includes/db.php");



?>


<div>

<form action="checkout.php" method="post">
<table width="800" bgcolor="#66cccc" align="center">

<tr align="center">
    <td colspan="4"><h2 style="font-size:20px; color:black;"><b>Login Or Regester</b></h2></td>
</tr>

<tr>
<td align="right"><b>Your Email:</b></td>
<td><input type="text" name="c_email"></td>
</tr>

<tr>

<td align="right"><b style="color:black; ">Your Password</b></td>
<td><input type="password" name="c_password" ></td>
</tr>
<tr align="center">
    <td colspan="4"><a href="fro_pass.php">forget password</a></td>
</tr>

<tr align="center">
<td colspan="4"><input type="submit" name="c_login"  value="login"></td>
</tr>



</table>
</form>

<h2 style="float:right; padding:10px;"><a href="customer_regester.php">New Rejester Here</a></h2>

</div>

<?php

if(isset($_POST['c_login']))
{
    $customer_email=$_POST['c_email'];
    $customer_pass=$_POST['c_password'];
    $sel_customer="SELECT * FROM customer WHERE  customer_email='$customer_email' AND customer_password='$customer_pass'";
    $run_customer=mysqli_query($con,$sel_customer);
    $check_customer=mysqli_num_rows($run_customer);
    $get_ip=get_client_ip();
    $sel_cart="SELECT * FROM cart WHERE ip_addres='$get_ip'";
    $run_cart=mysqli_query($con,$sel_cart);
    $check_cart=mysqli_num_rows($run_cart);

    if($check_customer==0)
    {
        echo "<script>alert('password or email is not corret , try again!')</script>";
        exit();
    }
    if($check_customer==1 and $check_cart==0)

    {
        $_SESSION['customer_email']=$customer_email;
        
        echo "<script>window.open('costomer/my_account.php','_self')</script>";
    }

    else
    {
    
        $_SESSION['customer_email']=$customer_email;

        include("payment_option.php");
    }




   

}

?>