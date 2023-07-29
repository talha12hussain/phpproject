
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
        <td colspan="3"><h2></h2>View All Category</td>
    </tr>
<tr>
    <th>Category Id </th>
    <th>Category Titel</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>
<?php

include("includes/db.php");
$get_cats="select * from categories";
$run_cats=mysqli_query($con,$get_cats);
while($row_cat=mysqli_fetch_array($run_cats))
{
    $cat_id=$row_cat['cat_id'];
    $cat_titel=$row_cat['cat_titel'];

?>
<tr align="center">
    <td><?php echo $cat_id; ?></td>
    <td><?php echo $cat_titel; ?></td>
    <td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
    <td><a href="delete_cat.php?delete_cat=<?php echo $cat_id; ?>">Delete</a></td>
</tr>
<?php } ?>
</table>
</body>
</html>

<?php }  ?>