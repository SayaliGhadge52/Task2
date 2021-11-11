<?php

include 'includes/_dbconnect.php';
include 'includes/function.php';

//ssession_start();


$coupon_code=get_safe_value($_POST['coupon_code']);

$res=mysqli_query($conn,"select * from coupon_code where coupon_code='$coupon_code'");
$count=mysqli_num_rows($res);
if($count>0){
	$row=mysqli_fetch_assoc($res);
	$cart_min_value=$row['cart_min_value'];
	$coupon_type=$row['coupon_type'];
	$coupon_value=$row['coupon_value'];
	$expired_on=strtotime($row['expired_on']);
	
	
	$arr=array('status'=>'success','msg'=>'Coupon Code applied');
	

} else{
	$arr=array('status'=>'error','msg'=>'Please enter valid Coupon code!!');	
}
echo json_encode($arr);


?>