<?php
@session_start();

include("includes/db.php");

if(isset($_GET['edit_account']))

{

    
$customer_email=$_SESSION['customer_email'];
$get_customer="select * from customer where customer_email='$customer_email'";
$run_customer=mysqli_query($con,$get_customer);
$row=mysqli_fetch_array($run_customer);

$id=$row['customer_id'];
    $name=$row['customer_name'];
    $email=$row['customer_email'];
    $password=$row['customer_password'];
    $country=$row['customer_country'];
    $city=$row['customer_city'];
    $contact=$row['customer_contact'];
    $addres=$row['customer_addres'];
    $image=$row['customer_image'];
  

}

?>

    

<form action="" method="post" enctype="multipart/form-data" >

<table width="600" align="center">

<tr>
<td colspan="8" align="center"><h2>Update Your  Account:</h2></td>
</tr>

<tr>
<td align="right"><b>customer Name</b></td>
<td><input type="text" name="c_name" value="<?php echo $name; ?>"></td>

</tr>

<tr>
<td align="right"><b>customer Email</b></td>
<td><input type="text" name="c_email" value="<?php echo $email; ?>" ></td>

</tr>
<tr>
<td align="right"><b>customer Password</b></td>
<td><input type="password" name="c_password" value="<?php echo $password; ?>"></td>

</tr>

<tr>
<td align="right"><b>customer country</b></td>
<td>
    <select name="c_country" >
       
    <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
    <option>Pakistan</option>
    <option>India</option>
    <option>Afghanistan</option>
    <option>China</option>
    <option>Jpan</option>
    <option>Iran</option>
    <option>Soudia Arabia</option>
    <option>south africa</option>
    <option>Unite State</option>


</select>
</td>

</tr>

<tr>
<td align="right"><b>customer City</b></td>
<td><input type="text" name="c_city" value="<?php echo $city; ?>"></td>

</tr>

<tr>
<td align="right"><b>customer Contact</b></td>
<td><input type="text" name="c_contact" value="<?php echo $contact; ?>"></td>

</tr>

<tr>
<td align="right"><b>customer Addres</b></td>
<td><input type="text" name="c_addres" size="60" value="<?php echo $addres; ?>"></td>

</tr>

<tr>
<td align="right"><b>customer image</b></td>
<td><input type="file" name="c_image" size="60"> <img src="customer_photos/<?php echo $image;  ?>" width="60" height="60"></td>

</tr>

<tr>
 <td align="center" colspan="8"><input type="submit" name="update_account" value="Update" /></td>
</tr>
</table>

</form>

<?php

if(isset($_POST['update_account']))

{

    $update_id=$id;

    $c_name=$_POST['c_name'];
    $c_email=$_POST['c_email'];
    $c_password=$_POST['c_password'];
    $c_country=$_POST['c_country'];
    $c_city=$_POST['c_city'];
    $c_contact=$_POST['c_contact'];
    $c_addres=$_POST['c_addres'];
    $c_image=$_FILES['c_image']['name']; 
    $c_image_tmp=$_FILES['c_image']['tmp_name'];

    move_uploaded_file($c_image_tmp,"customer_photos/$c_image");
   
    $update_c="UPDATE customer SET customer_name='$c_name',customer_email='$c_email',customer_password='$c_password',customer_country='$c_country',customer_city='$c_city',customer_contact='$c_contact',customer_addres='$c_addres',customer_image='$c_image' where customer_id='$update_id'";
$run_c=mysqli_query($con,$update_c);

if($run_c)
{
    echo "<script>alert('your account has been updated!')</script>";

    echo "<script>window.open('my_account.php','_self' )</script>";
}


}

?>