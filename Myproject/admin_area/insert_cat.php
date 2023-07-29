<?php



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
<style type="text/css">

form
{
    margin:15%;
}

</style>


</head>
<body>
   <form action="" method="post">

 <b>Inseret New Category</b> 
<input type="text" name="cat_titel">
<input type="submit" name="insert_cat" value="Insert Category">
    
   




</form>

<?php

include("includes/db.php");


if(isset($_POST['insert_cat']))
{
   $cat_titel=$_POST['cat_titel'] ;
   $insert_cat="insert into categories(cat_titel) values ('$cat_titel')";
   $run_cat=mysqli_query($con,$insert_cat);
   if($run_cat)
   
   {
    
    echo"<script>alert('New Categories Has Been Inserted')</script>";
    echo"<script>window.open('index.php?view_cats','_self')</script>";
   }

    


   
}


?>
</body>
</html>

<?php } ?>