<?php
	session_start();
	extract($_POST);
	
	
	include("connect_to_mysql.php");
	
		 $fname.$lname.$add.$contact.$email;
				
				$query = mysqli_query($con, "UPDATE `barotj_janu09`.`user` SET `Firstname` = '$fname', `Lastname` = '$lname', `Email_ID` = '$email', `Contact_No` = '$contact' WHERE `user`.`User_ID` = 1;") or die(mysql_error());	
				mysqli_query($con, $query);
					
                                        //echo '<div align="center" style="width:500px;border-style:solid;border-color:#F00;border-radius:20px;color:#00C;">Your account succesfully created</div>';
					echo"<script> alert('your are Successfully Update');</script>";
					echo "<script>window.location='User_Update.php'</script>";
                
	
		 
		
		
		
		
		
	
	
?>

