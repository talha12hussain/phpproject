
<?php



if(!isset($_SESSION['admin_email']))
{
    echo "<script>window.open('login.php','_self')</script>";
}

else
{




?>


<?php

include("includes/db.php");


if(isset($_GET['edit_cat']))
{
   $cat_id=$_GET['edit_cat'] ;
   $edit_cat="select * from categories where cat_id='$cat_id'";
   $run_edit=mysqli_query($con,$edit_cat);
   $row_edit=mysqli_fetch_array($run_edit);
   $cat_edit_id=$row_edit['cat_id'];
   $cat_titel=$row_edit['cat_titel'];
   

    
   
}


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

 <b>Edit This Category</b> 
<input type="text" name="cat_titel1" value="<?php echo $cat_titel; ?>">
<input type="submit" name="update_cat" value="Update Category">
    
   




</form>

</body>
</html>


<?php

if(isset($_POST['update_cat']))
{
    $cat_titel123=$_POST['cat_titel1'];
    $update_cat="update categories set cat_titel='$cat_titel123' where cat_id='$cat_edit_id' ";
    $run_cat=mysqli_query($con,$update_cat);

    if($run_cat)
    {
        echo "<script>alert('Categories Has Been Updated')</script>";
    echo "<script>window.open('index.php?view_cats','_self')</script>";
    }
}

?>



<?php  } ?>