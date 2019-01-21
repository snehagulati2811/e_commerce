<?php 
session_start();
error_reporting(0);
if($_SESSION['userid']==''){ ?>
		<script> location.replace("index.php"); </script>
	<?php }

//Session started

if($_SESSION['log']==1){


//connection to the database
include("connect_to_mysql.php");
$id=$_SESSION['userid'];
$result=mysqli_query($con,"SELECT us.*, ust.usertype_name FROM user us INNER JOIN usertype ust ON us.usertype_id = ust.usertype_id  where us.user_name='$id'");
$detail=mysqli_fetch_array($result);
$a=$detail["user_name"];
$b=$detail["first_name"];
$c=$detail["last_name"];
$d=$detail["email_id"];
$e=$detail["usertype_name"];


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
<title>E-Coffee Shop - Profile</title>
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
			<center><div class="page-header">
			  <h2>Manage Profile</h2>
			</div>
			</center>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <center><a style="color:white" class="btn btn-primary btn-mini" href="my_orders.php" >My orders </a></center>
            <br/>
		<table class="table table-hover" align="center">
			<tr><td width="120">User name:</td><td><?php echo $a; ?></td></tr>
			<tr><td width="120">First name: </td><td><?php echo $b;?></td></tr>
			<tr><td width="120">Last name: </td><td><?php echo $c;?></td></tr>
			<tr><td width="120">Email Address: </td><td><?php echo $d;?></td></tr>
			<tr><td width="120">User Type: </td><td><?php echo $e;?></td></tr>
		</table>
		<center><a style="color:white" class="btn btn-primary btn-mini" href="Edit_profile.php"><i class="glyphicon glyphicon-user"></i> Edit Profile</a></center>
	</div>
	</center>
	<br/><br/>
</div></div>
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
</div>
<div class="footer"><div style="color:white;">While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy.
<strong>Copyright YYYY-YYYY by ABC Data. All Rights Reserved.</strong>.</div></div>
</body>
</html>
<?php
}
else

header('location:error.php')

?>