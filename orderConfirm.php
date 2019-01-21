<?php session_start();
error_reporting(0);
if($_SESSION['userid']==''){ ?>
		<script> location.replace("index.php"); </script>
	<?php } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
<title>E-Coffee Shop -  Order Confirm</title>
<link href="css/slider.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
	
	<script type='text/javascript' src='js/jquery.min.js'></script>
	<script type='text/javascript' src='js/bootstrap.min.js'></script>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color:white">
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  <a class="img-responsive" href="index.php"><img src="images/logo.png" alt="E-Shop" style="max-width:100%; height:auto;display:block;"/></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
		<li>
		  	<?php 
				
				if($_SESSION['log']== 1){
					echo "<p class='navbar-text'>Welcome"." " .$_SESSION['userid']."!!</p>"; 
				} 
				?>
		
		</li>
		<li>
			  	<?php 
				
				if($_SESSION['log']== 1){
				
					echo '<a href=Logout.php>Logout</a>' ;
				} 
				
				if(($_SESSION['usertype']== 'Employee') || ($_SESSION['usertype']== 'Business_Manager') ) {
					echo '<a href="admin/admin_list_all_product.php"> Employee</a>';
				}
				
				if(($_SESSION['usertype']== 'Administrator') || ($_SESSION['usertype']== 'Business_Manager')){
					echo '<a href="user_manage.php"> Admin</a>';
				}
				?>
		
		</li>
        <li>
				<?php 
				if($_SESSION['log']==1){
					echo '<a href="View_profile.php"> My Account</a>';  }
				else {
					echo '<a href="index.php"> My Account</a>';
				}
				?>
		
		</li>
		<li>
		<?php 
				if(isset($_SESSION['cartCount'])){ 
					echo '<a href="shoppingcart.php"> Cart('.
						$_SESSION['cartCount'].')</a>';
				} else {
					$_SESSION['cartCount'] = 0;
					echo '<a href="shoppingcart.php"> Cart('.
						$_SESSION['cartCount'].')</a>';
				}
				?>
      
		</li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

<center><h2>Order Confirmation <h2></center>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
	<table class="table table-hover">
        <tr> 
            <th>Name</th> 
            <th>Quantity</th> 
            <th>Price</th>
			<th>Shipping Charge</th>	
            <th>Items Price</th>
		</tr> 
        <?php 
		include("connect_to_mysql.php");
		$totalprice=0;
		foreach($_SESSION["cart_array"] as $each_product){
			$product_id = $each_product['productID'];
			$sql=mysqli_query($con, "select * from product_detail where Product_id='$product_id' limit 1");
			while($row=mysqli_fetch_array($sql)){
				$subtotal=($each_product['quantity']*$row['Price']) + $row['shippingCharge'];
				$totalprice+=$subtotal; 
		?> 
		<tr> 
			<td><?php echo $row['name'] ?></td> 
			<td><?php echo $each_product['quantity'] ?></td> 
			<td>$<?php echo $row['Price'] ?></td>
			<td>$<?php echo $row['shippingCharge'] ?></td> 
			<td>$<?php echo $subtotal ?></td>
		</tr> 
        <?php 
				} 
			}					
		?> 
		<tr> 
			<td>Total Price:</td> 
			<td></td>
			<td></td>
			<td></td>
			<td>$<?php echo $totalprice ?></td>
		</tr> 
		<tr>
			<td>Shipping Name</td>
			<td><?php echo $_SESSION['shippingName'] ?></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Shipping Address</td>
			<td><?php echo $_SESSION['shippingAddress'] ?></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
    </table>
	<center>
	    <button type="submit" name="submit" class="btn btn-default">Order Confirm</button>
	</center>
    <br/>
</form>
</div>
</div>
	
<?php
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		include("connect_to_mysql.php");
		$user = $_SESSION['user_id'];
		$shippingAdd = $_SESSION['shippingAddress'];
		$receiverName = $_SESSION['shippingName'];
		$checkoutTot = $_SESSION['checkoutCartTotal'];
		$currentTime = date("Y-m-d H:i:s");
		$order_no = time().$_SESSION['user_id'];
		//echo "userId:" . $_SESSION['userid'] . "\nShippingAddress:" . $_SESSION['shippingAddress'] . "\nCheckoutCart:" .  $_SESSION['checkoutCartTotal'] . "\nCurrentTIME:" .  $currentTime . "\norderNO:" . $order_no;
		//echo "testieng the posqt" .  mysqli_query($con, "INSERT INTO customer_order (order_id, order_no, user_id, order_date, shipping_address,receiver_name,tot_amount) VALUES (null, '$order_no','$user' ,CURRENT_TIMESTAMP , '$shippingAdd', '$receiverName', '$checkoutTot')") . ":test";
		//$user_ID = mysqli_query($con, "");
		
		$result = mysqli_query($con, "INSERT INTO customer_order (order_id, order_no, user_id, order_date, shipping_address,receiver_name,tot_amount) VALUES (null, '$order_no','$user' ,CURRENT_TIMESTAMP , '$shippingAdd', '$receiverName', '$checkoutTot')") or die ( mysqli_error() );
       
		if($result)	{
			foreach($_SESSION['cart_array'] as $each_product){
		//			echo "New: " . $each_product['productID'] . " : quantity: " . $each_product['quantity'];  	
				 $id = $each_product['productID'];
				 $quantity = $each_product['quantity'];
				 $result2 = mysqli_query($con, "INSERT INTO order_details (record_id, order_no, product_id, sold_quantity) VALUES (null, '$order_no' ,'$id' ,'$quantity')") or die(mysql_error());
				 $result3 = mysqli_query($con, "UPDATE product_detail SET prod_quan = prod_quan - '$quantity' WHERE product_id = '$id'")or die(mysql_error());
			 } ?>
			  
			<script> location.replace("orderCompletion.php?order_no=<?php echo $order_no ?>");</script>
			
				
		<?php } else {
			echo "Unsuccessful order completion";
		}
	}
?>
</div>
</div>
<div class="footer"><div style="color:white;">While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy.
<strong>Copyright YYYY-YYYY by ABC Data. All Rights Reserved.</strong>.</div></div>

</body>
</html>