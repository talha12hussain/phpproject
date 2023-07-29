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
      <a href="../index.php">  <img src="../images/log.jpg" style="float:left;"></a>
        <img src="../images/banner.jpg" style="float:right;">
           
</div>
<div id="navbar">
    <ul id="menu">
        <li><a href="../index.php">Home</a></li>
        <li><a href="../all_product.php">All Product</a></li>
        <li><a href="costomer/my_account.php">My Account</a></li>
<?php
if(isset($_SESSION['customer_email']))
{
echo "<span style='display:none;' <li><a href='../user_rejester.php'>Sing up</a></li>></span>";
}

else
{
    echo "<li><a href='../user_rejester.php'>Sing up</a></li>";
}
?>





        <li><a href="../cart.php">Shopping Cart</a></li>
        <li><a href="../contact.php">Contact</a></li>


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

<div id="slidebar_titel">Manage Acccount</div>
<ul id="cata">
<?php

$user_session=$_SESSION['customer_email'];
$get_customer_pic="select * from customer where customer_email='$user_session'";

$run_customer=mysqli_query($con,$get_customer_pic);

$row_customer=mysqli_fetch_array($run_customer);
$customer_pic=$row_customer['customer_image'];

echo "<img src='customer_photos/$customer_pic' width='150' height='150'> ";
 
?>


<li><a href="my_account.php?my_order">My Orders</a></li>                         
<li><a href="my_account.php?edit_account">Edit Account</a></li>
<li><a href="my_account.php?change_account">Change Pass</a></li>
<li><a href="my_account.php?delet_account">Delete Account</a></li>
<li><a href="logout.php">Logout</a></li> 

</ul>

</div>

<div id="right_content">
<?php

cart();

?>


<div style="color:#fff; background:#000; width:780px; height:35px; float:right; padding:10px;">
<div id="guest">
<?php

if(isset($_SESSION['customer_email']))

{
    echo "<b>Welcome:" ."</b> &nbsp;"  . "<b style='color:yellow;'>" . $_SESSION['customer_email'] ."</b>";
}

?>


<?php
if(!isset($_SESSION['customer_email']))
{
echo "<a href='checkout.php' style='color:#f93;'>login</a>";
}
else{
    echo "<a href='logout.php' style='color:#f93;'>logout</a>";  
}
?>

</div>
</div>

<div>

<h2 style="background:#000; color:#FC9; padding:20px; text-align:center;  border-top: 2px; solid #fff; font-size:30px; ">Manage Your Account Here</h2>

<?php

getdefult();

?>


<?php







if(isset($_GET['my_order']))

{

    include("my_order.php");
}

if(isset($_GET['edit_account']))

{

    include("edit_account.php");
}

if(isset($_GET['change_account']))

{
    include("change_password.php");
}


if(isset($_GET['delet_account']))

{
    include("d_account.php");
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