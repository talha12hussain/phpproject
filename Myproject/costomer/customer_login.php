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
    <td colspan="4"><a href="checkout.php?forget_pass">forget password?</a></td>
</tr>

<tr align="center">
<td colspan="4"><input type="submit" name="c_login"  value="login"></td>
</tr>



</table>
</form>

<?php

if(isset($_GET['forget_pass']))
{
    echo "
    <div align='center'>
    <b>Enter Your Eamil below we will send your password to your email</b><br>
    <form action='' method='post'>
    <input type='text' name='c_email' placeholder='Enter Your Email' required ><br>
    <input type='submit' name='forget_pass' value='send me password'>
    </form>



    </div>
    
    
    ";

    if(isset($_POST['forget_pass']))
    {

        $c_email=$_POST['c_email'];
        $sel_c="select * from customer where customer_email='$c_email'";
        $run_c=mysqli_query($con,$sel_c);
        $check_c=mysqli_num_rows($run_c);

        $row_c=mysqli_fetch_array($run_c);
        $c_name=$row_c['customer_name'];
        $c_pass=$row_c['customer_password'];
        if($check_c==0)
        {
            echo "<script>alert('This email does not existed in our database, sorry!')</script>";
            exit();
        }

        else
        {
            $from='admin@gmaial.com';
            $subject='Your Password';
            $massage=
            "
            <html>


            <h3>Dear $c_name</h3>
            <p>You Requested Your Password at www.mysite.com</p>
            <b>Your Password is</b><span style='color:red;'>$c_pass</span>
            <h3>Thank You For Using For Our Website</h3>



            </html>
            
            
            
            ";
            
            mail($c_email,$subject,$massage,$from);

            echo "<script>alert('password was sent to your email, please check your inbox!')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
            
            
        }
       

    }
}

?>

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