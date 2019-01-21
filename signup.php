<?php
session_start();
error_reporting(0);
$registration="";
$logout="";
	if(isset($_GET["code"])){
	if($_GET["code"] == "empty") {
		$registration = "User successfully registered, please login";
	}else if($_GET["code"] == "invalidUsernme") {
		$logout = "Successfully logged out, thanks for using the application.";
	} else if($_GET["code"] == "invalidPassword") {
		$logout = "Incorrect user or Password. Please try again.";
	}  else if($_GET["code"] == "nullValue") {
		$logout = "* Fileds cannot be empty";
		//Header("Location:signup.php");
	}  else if($_GET["code"] == "invalidUsername") {
		$logout = "Invalid username ";
	} else if($_GET["code"] == "invalidPass") {
		$logout = "Invalid Password ";
	}else if($_GET["code"] == "invalidfname") {
		$logout = "Invalid first name ";
	} else if($_GET["code"] == "invalidlname") {
		$logout = "Invalid last name ";
	} else if($_GET["code"] == "invalidemail") {
		$logout = "Invalid email address ";
	}	else if($_GET["code"] == "passMismatch") {
		$logout = "Passwords are not matching";
	}	
	}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
<title>E-Coffee Shop - Sign up</title>
<link href="css/slider.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

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
		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
			<div class="page-header">
	<h1><center>Sign up<span class="error" style="color:red;float:right;font-size:13px;">* required field.</span></small></center></h1>
			</div>
	
<form action="signup_successfull.php" method="POST" class="form-horizontal">
	<div class="form-group">
			<label class="col-sm-2 control-label">Username: <span style="color:red;float:right;">*</span></label>
			<div class="col-sm-10">
				<input name="uname" class="form-control" type="text"/>
			</div>
    </div>
	<div class="form-group">
			<label class="col-sm-2 control-label">Password: <span style="color:red;float:right;">*</span></label>
			<div class="col-sm-10">
				<input name="password" class="form-control" type="password"/>
			</div>
    </div>
	<div class="form-group">
			<label class="col-sm-2 control-label">Re-enter Password: <span style="color:red;float:right;">*</span></label>
			<div class="col-sm-10">
				<input name="confirm" class="form-control" type="password"/>
			</div>
    </div>
	<div class="form-group">
			<label class="col-sm-2 control-label">First Name: <span style="color:red;float:right;">*</span></label>
			<div class="col-sm-10">
				<input name="fname" class="form-control" type="text"/>
			</div>
    </div>
	<div class="form-group">
			<label class="col-sm-2 control-label">Last Name: <span style="color:red;float:right;">*</span></label>
			<div class="col-sm-10">
				<input name="lname" class="form-control" type="text"/>
			</div>
    </div>
	<div class="form-group">
			<label class="col-sm-2 control-label">Email Address: <span style="color:red;float:right;">*</span></label>
			<div class="col-sm-10">
				<input name="email" class="form-control" type="text"/>
			</div>
    </div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		  <button type="submit" class="btn btn-default">sign up</button>
		</div>
	</div>
<center><h5 style="color:red;"><?php echo $registration; ?></h5></center>
<center><h5 style="color:red;"><?php echo $logout; ?></h5></center>

</form>
</div>
<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
<br/><br/><br/><br/><br/><br/>	
	<div class="list-group">
		<ul>
			<li>Username must contain only letters and should be atleast length of 5</li>
			<br/>
			<li>Password must contain only alphanumeric characters and should be atleast length of 5</li>
			<br/>
			<li>First name and last name should only contain letters</li>
			<br/>
		</ul>
	</div>
</div>
</div>
<div class="footer"><div style="color:white;">While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy.
<strong>Copyright YYYY-YYYY by ABC Data. All Rights Reserved.</strong>.</div></div>

</body>
</html>