<?php
echo basename(__DIR__);
	error_reporting(0);
	session_start();
	 $id = $_GET['id'];
	include("connect_to_mysql.php");
	$sqlallProd = mysqli_query($con,"select * from product_detail where product_id = '$id'") or die(mysql_error());
	while($getProdInfo = mysqli_fetch_array($sqlallProd)){
			$prodID = $getProdInfo["product_id"];
			 $prodImg = "../images/jbpics/".$getProdInfo["Product_image"];
			 $prodName = $getProdInfo["name"];
			$prodPrice = $getProdInfo["Price"];
			$size = $getProdInfo['Size'];
			$quantity = $getProdInfo['prod_quan'];
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" type="image/png" href="../images/logo.png"/>
        <title>E-Coffee Shop - Edit Product</title>
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
     
	  <a class="img-responsive" href="admin_list_all_product.php"><img src="../images/logo.png" alt="E-Shop" style="max-width:100%; height:auto;display:block;"/></a>
	</div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
		<li>
		<a href="../all_product_display.php"> Home</a>
		</li>
	  </ul>
    </div>
	</div><!-- /.container-fluid -->
</nav>
<div class="container-fluid">
	
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2>Product Information <span style="color: #a11; font-size: 13px; margin-left: 50px;"></span></h2>
			<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
			<form name="editdelete_product_form" method="post" action="update_product.php" enctype="multipart/form-data"  class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">Product Name:</label>
				<div class="col-sm-10">
					 <input type="text" name="name" id="name" class="form-control" value="<?php echo $prodName; ?>" required /><br />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Size:</label>
				<div class="col-sm-4">
				<select name="size" id="size" required class="form-control"/>
				 	<option value"S">S</option>
				 	<option value"M">M</option>
				 	<option value"L">L</option>
				 	<option value"X">X</option>
				 </select>
				</div>
				<label class="col-sm-2 control-label">Quantity:</label>
				<div class="col-sm-4">
					 <input type="text" name="quantity" id="quantity" value="<?php echo $quantity; ?>" required class="form-control"/> lb<br />
				</div>
			</div>
			<input type="hidden" name="prod_id" id="prod_id" value="<?php echo $prodID ?>" />
			<div class="form-group">
				<label class="col-sm-2 control-label">Price:</label>
				<div class="col-sm-10">
					<input type="Number"  style="width:300px;" name="price" id="price" value="<?php echo $prodPrice; ?>" required class="form-control"/>/lb
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Product Image:</label>
				<div class="col-sm-10">
					<input type="file" name="img" id="img" class="form-control"/>
				</div>
			</div>
            <button type="submit" class="btn btn-default" name="submit" value="submit">Update Product</button>
            </form>
		   </div>
		   <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
		   <img  style="width:300px;" name="img" id="img" src="<?php echo $prodImg; ?>" height="200" width="100" />
           </div> 
            
		 <!-- end of content -->
        
			</div>
			<div class="cleaner"></div>
			
			

			</form>
		</div><!-- end of content -->
		<div class="cleaner"></div>
	</div><!-- end of con -->
	<div class="footer"><div style="color:white;">While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy.
	<strong>Copyright YYYY-YYYY by ABC Data. All Rights Reserved.</strong>.</div></div>
</body>
</html>