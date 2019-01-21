<?php
error_reporting(0);
session_start();
include("connect_to_mysql.php");

$_SESSION['log']=0;
$name=$_POST['username'];
$password=$_POST['password'];

echo "TESTING";

if(isset($_POST['submit'])) {
	$password=sha1($password);
        echo "SELECT us.*, ust.usertype_name FROM user us INNER JOIN usertype ust ON us.usertype_id = ust.usertype_id WHERE us.user_name='$name' AND us.password='$password'";exit;
	$sql1=mysqli_query($con, "SELECT us.*, ust.usertype_name FROM user us INNER JOIN usertype ust ON us.usertype_id = ust.usertype_id WHERE us.user_name='$name' AND us.password='$password'");
	
	if ($sql1) {
			
		$userInfo = mysqli_fetch_array($sql1);
		$_SESSION['usertype'] = $userInfo["usertype_name"];
		$_SESSION['userid']=$name;
		$_SESSION['log']=1;
		$_SESSION['customer_id'] = $userInfo["user_id"];?>
		//header("location:all_product_display.php");
		<script> location.replace("all_product_display.php"); </script>
	<?php	
	} else { ?>
		//header('location:index.php?code=password');
		<script> location.replace("index.php?code=password"); </script>
   <?php }
}



?>