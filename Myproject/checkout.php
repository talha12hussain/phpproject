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
<?php
   
   if(!isset($_SESSION['customer_email']))

   {

    echo "<b><welcome guest!</b>  <b style='color:yellow'>Shoping Cart</b>";

   }

   else
   {
    echo "<b>welcome: " . "<span style='color:skyblue'>" .  $_SESSION['customer_email'] . "</span>" . "</b>" . "<b style='color:yellow'>Your Shoping Cart</b>";
   }

    ?>
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
<?php 
if(!isset($_SESSION['customer_email']))
{
    
    include("costomer/customer_login.php");


}
else
{
    
    include("payment_option.php");
}


?>


</div>
</div>
<div class="footer">
    <h1 style="color:#OOO; padding-top:30px; text-align:center;">$copy;2023 -By www.Myshop.com</h1>
</div>
</div>
</body>
</html>