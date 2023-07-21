<?php


include("includes/db.php");
include("functions/function.php");

if(isset($_GET['c_id']))

{
    $customer_id=$_GET['c_id'];
}

$ip_addres=get_client_ip(); 


$total=0;

$sel_price="select * from cart where ip_addres='$ip_addres'";
$run_price=mysqli_query($db,$sel_price);

$status='pending';
$invoice_no= mt_rand();

$count_pro=mysqli_num_rows($run_price);

while($record= mysqli_fetch_array($run_price))
{
$pro_id= $record['p_id'];
$pro_price="select * from products where product_id='$pro_id'";
$run_pro_price=mysqli_query($db,$pro_price);
while($p_price=mysqli_fetch_array($run_pro_price))
{
$product_price = array($p_price['product_price']);
$values= array_sum($product_price);
$total +=$values;
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

$insert_order="INSERT INTO `customer_order`( `customer_id`, `due_amount`, `envoice_no`, `total_product`, `order_date`, `order_status`) VALUES ('$customer_id','$sub_total','$invoice_no','$count_pro','NOW()','$status')";

$run_order=mysqli_query($con,$insert_order);



    echo "<script>alert('order sucessfully submit, thank!')</script>";
    echo "<script>window.open('costomer/my_account.php')</script>";

    $empty_cart="delete from cart  where ip_asddres='$ip_addres'";
    $run_empty=mysqli_query($con,$empty_cart);

    $insert_to_pending_order="INSERT INTO `pending_order`(`customer_id`, `envoice_no`, `product_id`, `qty`, `order_status`) VALUES ('$customer_id','$invoice_no','$pro_id','$qty','$status')";

    $run_pendding_order=mysqli_query($con,$insert_to_pending_order);


?>