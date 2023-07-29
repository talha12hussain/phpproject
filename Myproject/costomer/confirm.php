<?php

session_start();

include("includes/db.php");

if(isset($_GET['order_id']))

{
    $order_id=$_GET['order_id'];

    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body bgcolor="#000000">

<form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post">

<table width="500" align="center" border="2" bgcolor="#cccccc">

<tr align="center">
<td colspan="5">
    <h2>Plese Comfirm your payment</h2>

</td>

</tr>



<tr >
<td align="right">Invoice Number</td>
<td><input type="text" name="envoice_no"></td>

</tr>

<tr>
<td align="right">Amount sent</td>
<td><input type="text" name="amount"></td>

</tr>


<tr>
<td align="right">Select Payment Method</td>
<td>
<select name="payment_method">

<option>select payment</option>
<option>Bank Transfer</option>
<option>Easy PISA/UBL only </option>
<option>Westeran unoin</option>

</select>

</td>

</tr>

<tr>
<td align="right">Transpasation reference id</td>
<td><input type="text" name="tr"></td>
</tr>

<tr>
<td align="right">EasiyPaisa/ublONIT CODE</td>
<td><input type="text" name="code"></td>
</tr>

<tr>
<td align="right">Payment Date</td>
<td><input type="text" name="date"></td>

</tr>
<tr align="center">

<td colspan="5"><input type="submit" name="confirm" value="Confirm Payment"></td>

</tr>



</table>

</form>
    
</body>
</html>


<?php

if(isset($_POST['confirm']))

{
    $update_id=$_GET['update_id'];
    $envoice=$_POST['envoice_no'];
    $amount=$_POST['amount'];
    $payment_method=$_POST['payment_method'];
    $ref_no=$_POST['tr'];
    $code=$_POST['code'];
    $date=$_POST['date'];

$complete= 'complete';

    $insert_payment="INSERT INTO payment (envoice_no, amount, payment_mode, ref_no, code, payment_date) VALUES ('$envoice','$amount','$payment_method','$ref_no','$code','$date')";
    $run_payment=mysqli_query($con,$insert_payment);

    $update_order="UPDATE customer_order SET order_status='$complete' WHERE order_id='$update_id'";
    $run_order=mysqli_query($con,$update_order);

    $update_pending_order="update pending_order set order_status='$complete' where order_id='$update_id'";
    $run_pending_order=mysqli_query($con,$update_pending_order);

    if($run_payment)
    {
        echo "<h2 style='color:white;' align='center';>Payment Recive Your Order Will Be Compete With IN 24 Horus</h2>";

    }

   
}


?>