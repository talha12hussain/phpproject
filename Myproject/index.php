<?php

include("includes/db.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css" style="text/css">
</head>
<body>
    <div class="main_wrapper">
        <div class="header_wapper">
        <img src="images/log.jpg" style="float:left;">
        <img src="images/banner.jpg" style="float:right;">
       

        
</div>
<div id="navbar">
    <ul id="menu">
        <li><a href="">Home</a></li>
        <li><a href="">All Product</a></li>
        <li><a href="">My Account</a></li>
        <li><a href="">Sing up</a></li>
        <li><a href="">Shopping Cart</a></li>
        <li><a href="">Contact</a></li>


</ul>
<div id="form">
    <form action="result.php" method="get" enctype="multipart/form-data">
        <input type="text" name="user_qurey" placeholder="search for product"/>
        <input type="submit" name="search" value="search"/>
</form>

</div>

 </div>

            <div class="content_wrapper">
                <div id="left_slidebar">

<div id="slidebar_titel">Categories</div>
<ul id="cata">
    <?php
$get_cata="SELECT * FROM `categories`";
$run_cata=mysqli_query($con,$get_cata);
while($row_cata=mysqli_fetch_array($run_cata)){

    $cat_id=$row_cata['cat_id'];
    $cata_titel=$row_cata['cat_titel'];
     echo"<li><a href='index.php?cat=$cat_id'>$cata_titel</a></li>";
}
    ?>
</ul>
<div id="slidebar_titel">Brands</div>
<ul id="cata">
<?php
$get_brand="SELECT * FROM `brands`";
$run_brand=mysqli_query($con,$get_brand);
while($row_brand=mysqli_fetch_array($run_brand)){

    $brand_id=$row_brand['brand_id'];
    $brand_titel=$row_brand['brand_titel'];
     echo"<li><a href='index.php?cat=$cat_id'>$brand_titel</a></li>";
}
    ?>
        
</ul>
</div>
<div id="right_content">
</div>

</div>
<div class="foooter">
    <h1 style="color:#OOO; padding-top:30px; text-align:center;">$copy;2023 -By www.Myshop.com</h1>
</div>
</div>
    
</body>
</html>