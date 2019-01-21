<?php 

extract($_GET);
	
 $id = $_GET['id'];
	
	
	include("connect_to_mysql.php");
	
		
				
                                
                               
				 $query = mysqli_query($con,"DELETE FROM product_detail WHERE Product_id = '$id'") or die(mysql_error());	
				 mysqli_query($query);
				?>	
                                        <script> alert('Delete Successfully');
												window.location='admin_list_all_product.php';
												</script>
                                
                                
                                