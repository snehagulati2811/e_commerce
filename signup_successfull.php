<?php

session_start();
include "connect_to_mysql.php";
$name=$_POST['uname'];
$password=$_POST['password'];
$crypt = $password;
//$crypt=sha1($password);
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$confirm=$_POST['confirm'];

if (($name == "") || ($password == "") || ($fname == "") || ($lname == "") || ($email == "") || ($confirm == "") ){
	header('location:signup.php?code=nullValue');
} else {
	if(!preg_match('/^[a-zA-Z]{5,20}$/', $name)){
			header('location:signup.php?code=invalidUsername');	
	} else if (!preg_match('/^[a-zA-Z0-9]{5,10}$/', $password)){
			header('location:signup.php?code=invalidPass');	
	} else if (!preg_match("/^[a-zA-Z ]*$/", $fname)){
		header('location:signup.php?code=invalidfname');	
	} else if (!preg_match("/^[a-zA-Z ]*$/", $lname)){
		header('location:signup.php?code=invalidlname');	
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header('location:signup.php?code=invalidemail');	
	} else if ($password!=$confirm) {
		header('location:signup.php?code=passMismatch');
	}else {
		echo 'testing the application';
		$query="insert into user (user_name,password,first_name,last_name,email_id)values('$name','$crypt','$fname','$lname','$email')";
			$result = mysqli_query($con, $query);
			if($result) {
				header("location:index.php?code=success");
			} else {
				$s=1;
				header("location:registration_fail.php?n=$s");
			}
			
	}
}







?>

