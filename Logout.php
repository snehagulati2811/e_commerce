<?php

session_start();
$_SESSION['log']=0;
$_SESSION['userid']="";
$_SESSION['usertype']="";
$_SESSION['shippingName']="";
$_SESSION['shippingAddress']="";
$_SESSION['shippingTelNo']="";
$_SESSION['billingName']="";
$_SESSION['billingAddress']="";
$_SESSION['customer_id']="";
$_SESSION['cart_array']="";

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
//header("location:all_product_display.php");
?>
<script> location.replace("all_product_display.php"); </script>

//

//?>