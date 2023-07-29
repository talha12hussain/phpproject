<?php

session_start();

if(!isset($_SESSION['admin_email']))
{
    echo "<script>window.open('login.php','_self')</script>";
}

else
{




?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style/style.css"  media="all">
</head>
<body>
<div class="wrapper">

<a href="index.php"><div class="header"></div></a>

<div class="right">
    <h2>Manage Content</h2>
    <a href="index.php?insert_product">Insert New Product</a>
    <a href="index.php?view_products">View All Product</a>
    <a href="index.php?insert_cat">Insert New category</a>
    <a href="index.php?view_cats">View All Category</a>
    <a href="index.php?insert_brand">Insert New Brand</a>
    <a href="index.php?view_brands">view All Brand</a>
    <a href="index.php?view_customers">view  customers</a>
    <a href="index.php?view_order">view order</a>
    <a href="index.php?view_payment">view  payment</a>
    <a href="logout.php">Admin Logout</a>
</div>

<div class="left">
<h2 style="color:red; text-align:center; padding:20px; font-size:20px;"><?php echo @$_GET['logged_in'];  ?></h2>

<?php


include("includes/db.php");

if(isset($_GET['insert_product']))
{
    include("insert_product.php");
}


if(isset($_GET['view_products']))
{
    include("view_product.php");
}


if(isset($_GET['edit_pro']))
{
    include("edit_pro.php");
}


if(isset($_GET['insert_cat']))
{
    include("insert_cat.php");
}


if(isset($_GET['view_cats']))
{
    include("view_cats.php");
}

if(isset($_GET['edit_cat']))
{
    include("edit_cat.php");
}

if(isset($_GET['insert_brand']))
{
    include("insert_brand.php");
}

if(isset($_GET['view_brands']))
{
    include("view_brands.php");
}

if(isset($_GET['edit_brand']))
{
    include("edit_brand.php");
}

if(isset($_GET['view_customers']))
{
    include("view_customers.php");
}


if(isset($_GET['view_order']))
{
    include("view_orders.php");
}

if(isset($_GET['view_payment']))
{
    include("view_payment.php");
}

?>
</div>
</div>
    
</body>
</html>


<?php  } ?>