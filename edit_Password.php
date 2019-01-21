<?php
session_start();
include("connect_to_mysql.php");

if($_SESSION['log']==1) {


	$id=$_SESSION['userid'];
	$a=$_POST["old"];
	$b=$_POST["new"];
	$c=$_POST["confirm"];
	//$a=sha1($a);

	$result1=mysqli_query($con,"select * from user where user_name='$id'");
	$detail=mysqli_fetch_array($result1);
	$ab=$detail["password"];
	
	if(($a==$ab)&&($b==$c)) {
	
		//$b=sha1($b);
		$query="update user set password='$b' where user_name='$id'";
		$result = mysqli_query($con, $query);

		if($result){
			header("location:View_profile.php");
		} else {
			header("location:Error2.php");
		} 
	}else {
		header("location:error.php");
	}
} else {
header('location:error.php');
}



?>