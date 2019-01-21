<?php
error_reporting(0);
    session_start();
	if($_SESSION['userid']==''){ ?>
		<script> location.replace("index.php"); </script>
	<?php }
include("connect_to_mysql.php");
$message = "";
if($_SESSION['log']==1)
{
$id=$_SESSION['userid'];
$result=mysqli_query($con,"select * from `user` where `user_name`='$id'");
$detail=mysqli_fetch_array($result);
$a=$detail["user_name"];
$b=$detail["password"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id=$_SESSION['userid'];
	$a=$_POST["old"];
	$b=$_POST["new"];
	$c=$_POST["confirm"];
	//$a=sha1($a);
	//$d=sha1($a);
	$d=$a;
	
	if (($a == "") || ($b == "") || ($c == ""))  {
		$message = "Fields cannot be empty" ;
	} else { 
		if (!preg_match('/^[a-zA-Z0-9]{5,10}$/', $b)){
			$message = "Invalid Password";	
		} else if ($b!=$c){
			$message = "Password mismatch";
		} else {
			$result1=mysqli_query($con, "select * from user where user_name='$id'");
			$detail=mysqli_fetch_array($result1);
			$ab=$detail["password"];
			if($d==$ab){
				//$b=sha1($b);
				$query="update user set password='$b' where user_name='$id'";
				$result = mysqli_query($con,$query);
				
				if($result){
					echo  '<script> alert("Changed password successfully");</script>';?>
					<script> location.replace("View_profile.php"); </script>
					//header("location:View_profile.php");
				<?php } else {
					echo  '<script> alert("Unsucceful Password change");</script>';
				} 
			} else {
				$message = "Old password is incorrect";
			}
		}
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
    <title>E-Coffee Shop - Change Password</title>
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
	<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
		<div class="page-header">
			<h1><center>Change Password<span class="error" style="color:red;float:right;font-size:13px;">* required field.</span></small></center></h1>
		</div>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" align="center" class="form-horizontal">
				<center><h5 style="color:red;"><?php echo $message; ?></h5></center>
				<div class="form-group">
					<label class="col-sm-2 control-label">User Name:</label>
					<div class="col-sm-10">
						<?php echo $_SESSION['userid']; ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Old Password: <span style="color:red;float:right;">*</span></label>
					<div class="col-sm-10">
						<input  type="password" name="old" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">New Password: <span style="color:red;float:right;">*</span></label>
					<div class="col-sm-10">
						<input  type="password" name="new" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Re-enter New Password: <span style="color:red;float:right;">*</span></label>
					<div class="col-sm-10">
						<input  type="password" name="confirm" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Change Password</button>
					</div>
				</div>

			</form>
	</div>
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
		<br/><br/><br/><br/><br/><br/>	
	<div class="list-group">
		<ul><li>Password must contain only alphanumeric characters and should be atleast length of 5</li></ul>
	</div>
</div>
</div>
</div>
	<div class="footer"><div style="color:white;">While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy.<strong>Copyright YYYY-YYYY by ABC Data. All Rights Reserved.</strong>.</div></div>
</body>
</html>
<?php
}
else

header('location:error.php')

?>