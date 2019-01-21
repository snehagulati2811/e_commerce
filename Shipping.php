<?php session_start();
error_reporting(0); 
if($_SESSION['userid']==''){ ?>
		<script> location.replace("index.php"); </script>
	<?php }?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
<title>E-Coffee Shop - Shipping</title>
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
<script language="javascript" type="text/javascript">

	function clearText(field)
	{
		if (field.defaultValue == field.value) field.value = '';
		else if (field.value == '') field.value = field.defaultValue;
	}
</script>
<style>
.error {color: #FF0000;}
</style>
</head>
<body style="background-color:white">
<?php

if ($_SESSION['log'] != 1) { ?>
	//header("Location:index.php");
	<script> location.replace("index.php");</script>
<?php }

// define variables and set to empty values
$name = $address1 = $address2 = $city = $zip = $telno = $state = "";
$nameErr = $address1Err = $cityErr = $zipErr = $telnoErr = $stateErr ="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
   
  if ((empty($_POST["address1"])) && (empty($_POST["address2"])) ) {
    $address1Err = "Address is required";
  } else {
	  $address1 = $_POST["address1"];
	  $address2 = $_POST["address2"];	  
    
  }
    
  if (empty($_POST["city"])) {
    $cityErr = "City is required";
  } else {
    $city = $_POST["city"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
      $cityErr = "Only letters allowed. No spaces allowed";
    }
  }
  
  if (empty($_POST["state"])) {
	$stateErr = "state is required";
  } else {
	  $state = $_POST["state"];
	
  }
  
  if (empty($_POST["zip"])) {
    $zipErr = "Zip Code is required";
  } else {
    $zip = $_POST["zip"];
    if (!preg_match("/^[0-9]{5}([- ]?[0-9]{4})?$/",$zip)) {
      $zipErr = "Zip code is not valid";
    }
    
  }
  
  if (empty($_POST["telno"])) {
    $telnoErr = "Phone Number is required";
  } else {
    $telno = $_POST["telno"];
    // check if name only contains letters and whitespace
	if (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/",$telno)) {
      $telnoErr = "Phone Number is not valid";
    }
	
	if (empty($nameErr) && empty($address1Err) && empty($cityErr) && empty($zipErr)  && empty($telnoErr) && empty($stateErr)){
		echo "success";
		$_SESSION['shippingName'] = $name;
		$_SESSION['shippingAddress'] = $address1 .' '. $address2 .' '.$city.' '.$state. ' ' .$zip ;
		$_SESSION['shippingTelNo'] = $telno;
		$_SESSION['shipFill'] = 1;
		echo $_SESSION['shippingAddress']; ?>
		//$name = $address1 = $address2 = $city = $zip = $telno = $state = "";
		//header("Location:payment.php");
		<script> location.replace("payment.php"); </script>
		<?php exit();
	}
	
  }

   
}


?>

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
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="page-header">
		  <h4>Enter Shipping Details        <small><span class="error">* required field.</span></small></h4>
		</div>
			
		<form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal">
		  <div class="form-group">
			<label class="col-sm-2 control-label">Full Name: <span style="color:red;float:right;">*</span></label>
			<div class="col-sm-10">
				<input type="text" class="form-control"  name="name" value='<?php echo $name; ?>'/>
				<span style="color:red;font-size:12px;margin:5px"><?php echo $nameErr;?></span>
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-sm-2 control-label">Address 1: <span style="color:red;float:right;">*</span></label>
			<div class="col-sm-10">
				<input type="text" name="address1" class="form-control"  value='<?php echo $address1; ?>'/>
				<span style="color:red;font-size:12px;margin:5px"><?php echo $address1Err;?></span>
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-sm-2 control-label">Address 2: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control"  name="address2" value='<?php echo $address2; ?>'/>
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-sm-2 control-label">City: <span style="color:red;float:right;">*</span></label>
			<div class="col-sm-10">
				<input type="text" class="form-control"  name="city" value='<?php echo $city; ?>'/>
				<span style="color:red;font-size:12px;margin:5px"><?php echo $cityErr;?></span>
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-sm-2 control-label">State: <span style="color:red;float:right;">*</span></label>
			<div class="col-sm-10">
				<select name='state' class="form-control">
		   <option value=''>Choose a State</option>
		   <option value='AK'>Alaska</option>
		   <option value='AL'>Alabama</option>
		   <option value='AR'>Arkansas</option>
		   <option value='AZ'>Arizona</option>
		   <option value='CA'>California</option>
		   <option value='CO'>Colorado</option>
		   <option value='CT'>Connecticut</option>
		   <option value='DC'>District of Columbia</option>
		   <option value='DE'>Delaware</option>
		   <option value='FL'>Florida</option>
		   <option value='GA'>Georgia</option>
		   <option value='HI'>Hawaii</option>
		   <option value='IA'>Iowa</option>
		   <option value='ID'>Idaho</option>
		   <option value='IL'>Illinois</option>
		   <option value='IN'>Indiana</option>
		   <option value='KS'>Kansas</option>
		   <option value='KY'>Kentucky</option>
		   <option value='LA'>Louisiana</option>
		   <option value='MA'>Massachusetts</option>
		   <option value='MD'>Maryland</option>
		   <option value='ME'>Maine</option>
		   <option value='MI'>Michigan</option>
		   <option value='MN'>Minnesota</option>
		   <option value='MO'>Missouri</option>
		   <option value='MS'>Mississippi</option>
		   <option value='MT'>Montana</option>
		   <option value='NC'>North Carolina</option>
		   <option value='ND'>North Dakota</option>
		   <option value='NE'>Nebraska</option>
		   <option value='NH'>New Hampshire</option>
		   <option value='NJ'>New Jersey</option>
		   <option value='NM'>New Mexico</option>
		   <option value='NV'>Nevada</option>
		   <option value='NY'>New York</option>
		   <option value='OH'>Ohio</option>
		   <option value='OK'>Oklahoma</option>
		   <option value='OR'>Oregon</option>
		   <option value='PA'>Pennsylvania</option>
		   <option value='PR'>Puerto Rico</option>
		   <option value='RI'>Rhode Island</option>
		   <option value='SC'>South Carolina</option>
		   <option value='SD'>South Dakota</option>
		   <option value='TN'>Tennessee</option>
		   <option value='TX'>Texas</option>
		   <option value='UT'>Utah</option>
		   <option value='VA'>Virginia</option>
		   <option value='VT'>Vermont</option>
		   <option value='WA'>Washington</option>
		   <option value='WI'>Wisconsin</option>
		   <option value='WV'>West Virginia</option>
		   <option value='WY'>Wyoming</option>
				</select>
				<span style="color:red;font-size:12px;margin:5px"><?php echo $stateErr;?></span>
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-sm-2 control-label">Zip: <span style="color:red;float:right;">*</span></label>
			<div class="col-sm-10">
				<input  class="form-control" type="text" name="zip" value='<?php echo $zip; ?>'/>
				<span style="color:red;font-size:12px;margin:5px"><?php echo $zipErr;?></span>
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-sm-2 control-label">Phone Number: <span style="color:red;float:right;">*</span></label>
			<div class="col-sm-10">
				<input type="text"  class="form-control" name="telno" value='<?php echo $telno; ?>'/>
				<span style="color:red;font-size:12px;margin:5px"><?php echo $telnoErr;?></span>
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-default">Submit</button>
			</div>
		  </div>
		</form>
	</div>
</div>
<div class="footer"><div style="color:white;">While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy.
<strong>Copyright YYYY-YYYY by ABC Data. All Rights Reserved.</strong>.</div></div>

</body>
</html>