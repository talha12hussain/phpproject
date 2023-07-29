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

$ip= get_client_ip();

$get_customer= "select * from customer where customer_ip='$ip'";
$run_customer=mysqli_query($con,$get_customer);

$customer= mysqli_fetch_array($run_customer);

$customer_id=$customer['customer_id'];

?>

<b>pay with</b> &nbsp: <a href="http://www.paypal.com"><img src="images/payment.png" width="200" height="80"></a><b>or<a href="order.php?c_id=<?php echo $customer_id ?>">pay offline</a></b><br><br><br>

<b>if you select "pay offline" then you chech email or account to find the invoice now for you order</b>
</div>

</body>
</html>
