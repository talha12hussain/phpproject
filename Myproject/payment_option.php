<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment option</title>
</head>
<body>
  
<?php

include("includes/db.php");


?>


<div align="center" style=" padding:20px;">


<h2>payment option for you</h2>

<?php

$_ip= get_client_ip();

$get_customer= "select * from customer where customer_ip='$_ip'";
$run_customer=mysqli_query($con,$get_customer);

$customer= mysqli_fetch_array($run_customer);

$customer_id=$customer['customer_id'];

?>

<b>pay with</b> &nbsp: <a href="http://www.paypal.com"><img src="images/payment.png" with="200" height="80"></a><b>or<a href="order.php?c_id=<?php echo $customer_id ?>">pay offline</a></b></be></br>

<br>if younselect "pay offline" then you chech email or account to finf the invoice now for you order</br>
</div>

</body>
</html>
