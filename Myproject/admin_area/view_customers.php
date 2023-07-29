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
th,tr
{
border:3px groove #333;
}
        </style>
</head>
<body>
<table width="794" align="center" bgcolor="#ffcc9" >

<tr align="center">
    <td colspan="6"><h2>View All Customer</h2></td>
</tr>
    
<tr align="center">
    <th>S.No</th>
    <th>Name</th>
    <th>Email</th>
    <th>Image</th>
    <th>Country</th>
    <th>Delete</th>
</tr>
<?php

include("includes/db.php");

$get_c="select * from customer ";
$run_c=mysqli_query($con,$get_c);

$i=0;

while($row_c=mysqli_fetch_array($run_c))
{

    $c_id=$row_c['customer_id'];
    $c_name=$row_c['customer_name'];
    $c_email=$row_c['customer_email'];
    $c_image=$row_c['customer_image'];
    $c_country=$row_c['customer_country'];

$i++;
    



?>
<tr align="center">
    <td><?php echo $i; ?></td>
    <td><?php echo $c_name; ?></td>
    <td><?php echo $c_email; ?></td>
    <td><img src="../costomer/customer_photos/<?php echo $c_image; ?>" width="50" height="50"></td>
    <td><?php echo $c_country ?></td>
    <td><a href="delete_c.php?delete_c=<?php echo $c_id ?>">Delete</td>
</tr>
<?php } ?>
</table>

</body>
</html>

<?php } ?>