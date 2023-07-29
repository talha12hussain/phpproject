<?php


include("includes/db.php");


$c=$_SESSION['customer_email'];
$get_c="select * from customer where customer_email='$c'";
$run_c=mysqli_query($db,$get_c);
$row_c=mysqli_fetch_array($run_c);

    
        $customer_id= $row_c['customer_id'];

?>

<center><h3>All ORDER Details</h3></center>

<table width="750" align="center" bgcolor="#6699ff">

<tr>

<th>order no</th>
<th>Due Amount</th>
<th>envoive no</th>
<th>total product</th>
<th>order date</th>
<th>paid/upaid</th>
<th>status</th>

</tr>

<?php

$get_order="select * from customer_order where customer_id='$customer_id'";

$run_customer=mysqli_query($con,$get_order);
 
$i=0;

while($row_order=mysqli_fetch_array($run_customer))

{
        $order_id=$row_order['order_id'];
        $due_amount=$row_order['due_amount'];
        $envoice_no=$row_order['envoice_no'];
        $product=$row_order['total_product'];
        $date=$row_order['order_date'];
        $status=$row_order['order_status'];

        $i++;

        if($status=='pending')
        {
                $status ='unpaid';
        }
        else
        {
                $status='Paid';
        }

        echo "<tr align='center'>
        
        <td>$i</td>
        <td>$due_amount</td>
        <td>$envoice_no</td>
        <td>$product</td>
        <td>$date</td>
        <td>$status</td>
        <td><a href='confirm.php?order_id=$order_id'  target='_blank'>confirm if paid</a></td>
        
        
        
        </tr>
        ";
}

?>

</table>