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
tr,th
{
    border: 3px  groove #000;
}
</style>
</head>
<body>
    <table width="794" align="center" bgcolor="#ffcccc">

    <tr align="center">
        <td colspan="3"><h2></h2>View All Brand</td>
    </tr>
<tr>
    <th>Brand Id </th>
    <th>Brand Titel</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>
<?php

include("includes/db.php");
$get_brand="select * from brands";
$run_brand=mysqli_query($con,$get_brand);
while($row_brand=mysqli_fetch_array($run_brand))
{
    $brand_id=$row_brand['brand_id'];
    $brand_titel=$row_brand['brand_titel'];

?>
<tr align="center">
    <td><?php echo $brand_id; ?></td>
    <td><?php echo $brand_titel; ?></td>
    <td><a href="index.php?edit_brand=<?php echo $brand_id; ?>">Edit</a></td>
    <td><a href="delete_brand.php?delete_brand=<?php echo $brand_id; ?>">Delete</a></td>
</tr>
<?php } ?>
</table>
</body>
</html>

<?php  } ?>