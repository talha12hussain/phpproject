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
    <td colspan="6"><h2>View All Order</h2></td>
</tr>
    
<tr align="center">
    <th>Order.No</th>
    <th>Customer</th>
    <th>invoice.No</th>
    <th>Product Id</th>
    <th>Qty</th>
    <th>status</th>
    <th>Delete</th>
</tr>
<?php

include("includes/db.php");

$get_order="select * from pending_order ";
$run_order=mysqli_query($con,$get_order);

$i=0;

while($row_order=mysqli_fetch_array($run_order))
{

   $order_id=$row_order['order_id'];
   $c_id=$row_order['customer_id'];
   $invoice_no=$row_order['envoice_no'];
   $p_id=$row_order['product_id'];
   $qty=$row_order['qty'];
   $status=$row_order['order_status'];

$i++;
    



?>
<tr align="center">
    <td><?php echo $i; ?></td>
    <td> <?php 
    
    $get_costomer="select * from customer where customer_id='$c_id'";
    $run_customer=mysqli_query($con,$get_costomer);
    $row_customer=mysqli_fetch_array($run_customer);

    $customer_email=$row_customer['customer_email'];
    echo $customer_email;
    ?></td>
    <td bgcolor="#ffcccc"><?php echo $invoice_no; ?></td>
    <td><?php echo $p_id; ?></td>
    <td><?php echo $qty; ?></td>
    <td><?php 
    
    if($status=='pending')
    {
         echo $status='pending';
    }

else
{
    echo $status='complete';
}

    ?></td>
    <td><a href="delete_order.php?delete_order=<?php echo $order_id ?>">Delete</td>
</tr>
<?php } ?>
</table>

</body>
</html>
<?php } ?>