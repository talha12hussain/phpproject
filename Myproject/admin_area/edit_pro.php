
<?php


include("includes/db.php");



if(!isset($_SESSION['admin_email']))
{
    echo "<script>window.open('login.php','_self')</script>";
}

else
{

if(isset($_GET['edit_pro']))
{
    $edit_id=$_GET['edit_pro'];

    $get_edit="select * from products where product_id='$edit_id'";
    $run_edit=mysqli_query($con,$get_edit);
    $row_edit=mysqli_fetch_array($run_edit);
    $update_id=$row_edit['product_id'];
    $p_titel=$row_edit['product_titel'];
    $cat_id=$row_edit['cat_id'];
    $brand_id=$row_edit['brand_id'];
    $p_image1=$row_edit['product_image1'];
    $p_image2=$row_edit['product_image2'];
    $p_image3=$row_edit['product_image3'];
    $p_price=$row_edit['product_price'];
    $p_des=$row_edit['product_des'];
    $p_keywords=$row_edit['product_keywords'];


    
    $get_cat=" select * from categories where cat_id='$cat_id'";
    $run_cat=mysqli_query($con,$get_cat);
    $cat_row=mysqli_fetch_array($run_cat);
    $cat_edit_titel=$cat_row['cat_titel'];

    
    $get_brand="select * from brands where brand_id='$brand_id'";
    $run_brand=mysqli_query($con,$get_brand);
    $brand_row=mysqli_fetch_array($run_brand);
    $brand_edit_titel=$brand_row['brand_titel'];
    

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
</head>
<body bgcolor="#999999">
    <form method="post" action="" enctype="multipart/form-data">
        <table width="794" align="center" border="1" bgcolor="#3399CC">
            <tr align="center">
                <td colspan="2"><h1>Update or Edit Product</h1></td>
</tr>
            <tr>
            <td align="center"><b>product Titel</b></td>
                <td><input type="text" name="product_titel" size="50" value="<?php echo $p_titel; ?>"></td>
</tr>
<tr>
<td align="center"><b>product category</b></td>
                <td>
                    <select name="product_cat">
                        
                        <option value="<?php echo $cat_id; ?>"><?php echo $cat_edit_titel; ?></option>
                        <?php
$get_cata="SELECT * FROM `categories`";
$run_cata=mysqli_query($con,$get_cata);
while($row_cata=mysqli_fetch_array($run_cata)){

    $cat_id=$row_cata['cat_id'];
    $cat_titel=$row_cata['cat_titel'];
     echo"<option value='$cat_id'>$cat_titel</option>";
}
    ?>
</select>
                </td>
</tr>
<tr>
<td align="center"><b>product Brand</b></td>
                <td> <select name="product_brand">
                    <option value="<?php echo $brand_id; ?>"><?php echo $brand_edit_titel; ?></option>
                    <?php
$get_brand="SELECT * FROM `brands`";
$run_brand=mysqli_query($con,$get_brand);
while($row_brand=mysqli_fetch_array($run_brand)){

    $brand_id=$row_brand['brand_id'];
    $brand_titel=$row_brand['brand_titel'];
     echo"<option value='$brand_id'>$brand_titel</option>";
}
    ?>
</select>
                </td>
</tr>
<tr>
<td align="center"><b>product img 1</b></td>
                <td><input type="file" name="product_img1"><br> <img src="product_images/<?php  echo $p_image1;  ?>" width="80" height="80"></td>
</tr>
<tr>
<td align="center"><b>product img 2</b></td>
                <td><input type="file" name="product_img2"><br><img src="product_images/<?php  echo $p_image2; ?>" width="80" height="80"></td>
</tr>
<tr>
<td align="center"><b>product img 3</b></td>
                <td><input type="file" name="product_img3" ><br><img src="product_images/<?php  echo $p_image3; ?>" width="80" height="80"></td>
</tr>
<tr>
<td align="center"><b>product Price</b></td>
                <td><input type="text" name="product_price" value="<?php echo $p_price; ?>"></td>
</tr>
<tr>
<td align="center"><b>product Descripation</b></td> 
                <td><textarea type="text" name="product_desc" cols="35" rows="10" ><?php echo $p_des; ?></textarea></td>
</tr>
<tr>
<td align="center"><b> product_keyword</b></td>
                <td><input type="text" name="product_keyword" size="50" value="<?php echo $p_keywords; ?>"></td>
</tr>
<tr align="center">
                <td colspan="2" ><input type="submit" name="save" value="Update product"></td>
</tr>
</table>
</form>
</body>
</html>

<?php
if(isset($_POST['save']))
{
    $product_titel=$_POST['product_titel'];
    $product_cat=$_POST['product_cat'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
    $product_desc=$_POST['product_desc'];
    $status='on';
   
    $product_keyword=$_POST['product_keyword'];
    $product_img1=$_FILES['product_img1'] ['name'];
    $product_img2=$_FILES['product_img2'] ['name'];
    $product_img3=$_FILES['product_img3'] ['name'];

    $temp_img1=$_FILES['product_img1'] ['tmp_name'];
    $temp_img2=$_FILES['product_img2'] ['tmp_name'];
    $temp_img3=$_FILES['product_img3'] ['tmp_name'];

    if($product_titel=='' OR $product_cat=='' OR $product_brand=='' OR $product_price=='' OR $product_desc=='' OR $product_keyword=='' OR $product_img1=='')
{
    echo "<script>alert('please fill all the filed')</script>";
    exit();
    
}
else
{
    move_uploaded_file($temp_img1,"product_images/$product_img1");
    move_uploaded_file($temp_img2,"product_images/$product_img2");
    move_uploaded_file($temp_img3,"product_images/$product_img3");

    $update_product="UPDATE products SET cat_id='$product_cat',brand_id='$product_brand',date='NOW()',product_titel='$product_titel',product_image1='$product_img1',product_image2='$product_img2',product_image3='$product_img1',product_price='$product_price',product_des='$product_desc',product_keywords='$product_keyword'  WHERE  product_id='$update_id'" ;
    $run_u=mysqli_query($con,$update_product);
    if($run_u)
    {
        echo "<script>alert('product update sucessfully')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
    }
}



}

?>

<?php } ?> 