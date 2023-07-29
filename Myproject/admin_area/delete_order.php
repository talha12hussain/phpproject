<?php

include("includes/db.php");


if(!isset($_SESSION['admin_email']))
{
    echo "<script>window.open('login.php','_self')</script>";
}

else
{

if(isset($_GET['delete_order']))

{
    $delete_id=$_GET['delete_order'];

    $delete_c="delete from pending_order where order_id='$delete_id' ";
    $run_delete=mysqli_query($con,$delete_c);

    if($run_delete)
    {
        echo "<script>alert('order has been deleted')</script>";
        echo "<script>window.open('index.php?view_order','_self')</script>";
    }

}




?>


<?php  } ?>