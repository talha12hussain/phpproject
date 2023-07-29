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
border:3px groove #333;
}
        </style>
</head>
<body>
<table width="794" align="center" bgcolor="#ffcc9" >

<tr align="center">
    <td colspan="6"><h2>View All Payment</h2></td>
</tr>
    
<tr align="center">
    <th>Payment.No</th>
    <th>invoice.No</th>
    <th>Amount Paid</th>
    <th>Payment Meyhod</th>
    <th>Reference No</th>
    <th>Code</th>
    <th>Payment Date</th>
</tr>
<?php

include("includes/db.php");

$get_payment="select * from payment ";
$run_payment=mysqli_query($con,$get_payment);

$i=0;

while($row_payment=mysqli_fetch_array($run_payment))
{

   $payment_id=$row_payment['payment_id'];
   $invoice_no=$row_payment['envoice_no'];
   $amount=$row_payment['amount'];
   $payment_method=$row_payment['payment_mode'];
   $ref_no=$row_payment['ref_no'];
   $code=$row_payment['code'];
   $date=$row_payment['payment_date'];

$i++;
    



?>
<tr align="center">
    <td><?php echo $i; ?></td>
    <td bgcolor="#ffcccc"><?php echo $invoice_no; ?></td>
    <td><?php echo $amount; ?></td>
    <td><?php echo $payment_method; ?></td>
    <td><?php  echo $ref_no; ?></td>
    <td><?php  echo $code; ?></td>
    <td><?php  echo $date; ?></td>
</tr>
<?php } ?>
</table>

</body>
</html>

<?php } ?>

