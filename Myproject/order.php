<?php


include("includes/db.php");
include("functions/function.php");

if(isset($_GET['c_id']))

{
    $customer_id=$_GET['c_id'];
    $c_email="select * from customer where customer_id='$customer_id'";
    $run_email=mysqli_query($con,$c_email);
    $row_email=mysqli_fetch_array($run_email);
    $customer_email=$row_email['customer_email'];
    $customer_name=$row_email['customer_name'];

}

$ip_addres=get_client_ip(); 


$total=0;

$sel_price="select * from cart where ip_addres='$ip_addres'";
$run_price=mysqli_query($db,$sel_price);

$status='pending';
$invoice_no= mt_rand();

$i= 0;

$count_pro=mysqli_num_rows($run_price);

while($record=mysqli_fetch_array($run_price))
{
$pro_id= $record['p_id'];
$pro_price="select * from products where product_id='$pro_id'";
$run_pro_price=mysqli_query($db,$pro_price);

while($p_price=mysqli_fetch_array($run_pro_price))
{

    $product_name=$p_price['product_titel'];

$product_price = array($p_price['product_price']);
$values= array_sum($product_price);
$total +=$values;
$i++;

}
}

$get_cart="select * from cart where ip_addres='$ip_addres'";
$run_cart=mysqli_query($con, $get_cart);
$get_qty=mysqli_num_rows($run_cart);
$qty=$get_qty['qty'];

if($qty==0)
{
    $qty=1;
    $sub_total=$total;

}
else{
    $qty=$qty;
    $sub_total=$total*$qty;
}

$insert_order="INSERT INTO `customer_order`( `customer_id`, `due_amount`, `envoice_no`, `total_product`, `order_date`, `order_status`) VALUES ('$customer_id','$sub_total','$invoice_no','$count_pro',NOW(),'$status')";

$run_order=mysqli_query($con,$insert_order);



    echo "<script>alert('order sucessfully submit, thank!')</script>";
    echo "<script>window.open('costomer/my_account.php')</script>";

    $empty_cart="delete from cart  where ip_asddres='$ip_addres'";
    $run_empty=mysqli_query($con,$empty_cart);

    $insert_to_pending_order="INSERT INTO pending_order (customer_id, envoice_no, product_id, qty, order_status) VALUES ('$customer_id','$invoice_no','$pro_id','$qty','$status')";

    $run_pendding_order=mysqli_query($con,$insert_to_pending_order);


    $from='mysite@acadmin.com';
    $subject='Order Details';
    $massage=
    "
    <html>

    <p>Hello Dear<b style='color:blue;'>$customer_name</b>You Have  Order Some Products on our MySite.com, Please order Details
    Below And Pay The Dues AS soon As Possibel, So We C an Proceed Your Orders . Thank You!</p>

    <table width='600' align='center bgcolor='#ffcc99' border='2'>

<tr>

<td>your Order Detail For MySite.com<h2></h2></td>
</tr>
<tr>
<th><b>S.No</b></th>
<th><b>Product Nmae</b></th>
<th><b>Quantity</b></th>
<th><b>Total Price</b></th>
<th><b>Invoice No</b></th>
</tr>
<tr>

<td>$i</td>
<td>$product_name</td>
<td>$qty</td>
<td>$sub_total</td>
<td>$invoice_no;</td>

</tr>


</table>

    <h3>Please Go To Your And P;ay The Dues</h3>
    <h2><a href='mysite.com'>Click Here</a> TO Login To To Your Account</h2>

<h3>Thank You For Order on - www.mysite.com </h3>



    </html>
    ";

    mail($customer_email,$subject,$massage,$from);


?>