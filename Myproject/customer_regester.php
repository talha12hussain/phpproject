
<?php


session_start();


include("includes/db.php");

include("functions/function.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Project</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css"  media="all">
</head>
<body>
    <div class="main_wrapper">
        <div class="header_wapper">
      <a href="index.php">  <img src="images/log.jpg" style="float:left;"></a>
        <img src="images/banner.jpg" style="float:right;">
           
</div>
<div id="navbar">
    <ul id="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="all_product.php">All Product</a></li>
        <li><a href="my_account.php">My Account</a></li>
        <li><a href="user_rejester.php">Sing up</a></li>
        <li><a href="cart.php">Shopping Cart</a></li>
        <li><a href="contact.php">Contact</a></li>


</ul>
<div id="form">
    <form  method="get" action="results.php" enctype="multipart/form-data">
        <input type="text" name="user_qurey" placeholder="search for product"/>
        <input type="submit" name="search" value="search"/>
</form>

</div>

 </div>

            <div class="content_wrapper">
                <div id="left_slidebar">

<div id="slidebar_titel">Categories</div>
<ul id="cata">
    <?php getcata(); ?>
</ul>
<div id="slidebar_titel">Brands</div>
<ul id="cata">
<?php
getbrand();
?>
        
</ul>
</div>

<div id="right_content">
<?php

cart();

?>


<div style="color:#fff; background:#000; width:780px; height:35px; float:right; padding:10px;">
<div id="guest">
    <b>welcome guesrt</b>
    <b style="color:yellow;">shoping cart</b>
    <span>- Items: <?php items(); ?> - Total Price:  <?php total_price();  ?> - <a href="cart.php" style="color:white; text-decoration: none;">Go To Cart</a> 

    &nbsp;


<?php

if(!isset($_SESSION['customer_email']))

{
echo "<a href='checkout.php' style='color:#f93;'>login</a>";
}

else{
    echo "<a href='logout.php' style='color:#f93;'>logout</a>";  
}

?>


</span>
</div>
</div>

<div>

<form action="customer_regester.php" method="post" enctype="multipart/form-data" >

<table width="750" align="center">

<tr align="center">
<td colspan="5"><h2>Create an Account</h2></td>
</tr>

<tr>
<td align="right"><b>customer Name</b></td>
<td><input type="text" name="c_name" required /></td>

</tr>

<tr>
<td align="right"><b>customer Email</b></td>
<td><input type="text" name="c_email" required></td>

</tr>
<tr>
<td align="right"><b>customer Password</b></td>
<td><input type="password" name="c_password" required></td>

</tr>

<tr>
<td align="right"><b>customer country</b></td>
<td>
    <select name="c_country" >
       
    <option>Select A country</option>
    <option>Pakistan</option>
    <option>India</option>
    <option>Afghanistan</option>
    <option>China</option>
    <option>Jpan</option>
    <option>Iran</option>
    <option>Soudia Arabia</option>
    <option>south africa</option>
    <option>Unite State</option>


</select>
</td>

</tr>

<tr>
<td align="right"><b>customer City</b></td>
<td><input type="text" name="c_city" required></td>

</tr>

<tr>
<td align="right"><b>customer Contact</b></td>
<td><input type="text" name="c_contact" required></td>

</tr>

<tr>
<td align="right"><b>customer Addres</b></td>
<td><input type="text" name="c_addres" required></td>

</tr>

<tr>
<td align="right"><b>customer image</b></td>
<td><input type="file" name="c_image" required></td>

</tr>

<tr align="center">
 <td colspan="5"><input type="submit" name="register" value="Submit" /></td>
</tr>
</table>

</form>




</div>
</div>
<div class="footer">
    <h1 style="color:#OOO; padding-top:30px; text-align:center;">$copy;2023 -By www.Myshop.com</h1>
</div>
</div>
</body>
</html>


<?php


if(isset($_POST['register']))

{
    $c_name=$_POST['c_name'];
    $c_email=$_POST['c_email'];
    $c_password=$_POST['c_password'];
    $c_country=$_POST['c_country'];
    $c_city=$_POST['c_city'];
    $c_contact=$_POST['c_contact'];
    $c_addres=$_POST['c_addres'];
    $c_image=$_FILES['c_image']['name']; 
    $c_image_tmp=$_FILES['c_image']['tmp_name'];

    
    $c_ip= get_client_ip();

    $insert_customer="insert into customer (customer_name, customer_email, customer_password, customer_country, customer_city, customer_contact, customer_addres, customer_image, customer_ip) values ('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact','$c_addres','$c_image','$c_ip')";
    
    $run_customer=mysqli_query($con,$insert_customer);

    move_uploaded_file($c_image_tmp,"costomer/customer_photos/$c_image");
    
    $sel_cart="SELECT * FROM cart WHERE ip_addres='$c_ip'";
    $run_cart=mysqli_query($con,$sel_cart);
    $check_cart=mysqli_num_rows($run_cart);

    if($check_cart>0)

    {
        $_SESSION['customer_email']=$c_email;

        echo "<script>alert('account create succesfully,thankyou!')</script>";

        echo "<script>window.open('checkout.php','_self' )</script>";

    }

    else

    {
        $_SESSION['customer_email']=$c_email;

        echo "<script>alert('account create succesfully,thank you!')</script>";
        
        echo "<script>window.open('index.php', '_self')</script>";

    }


   
   
}

?>



