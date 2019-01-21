<?php



extract($_POST);


$name = $_POST['name'];
$quantity = $_POST['quantity']; 
$size = $_POST['size'];
 $price = $_POST['price'];
 $P_ID = $_POST['prod_id'];
 
 
  $prod_img = strtotime(date('Y-m-d H:i:s')).".jpg";
  $db_img = "../images/jbpics/".$prod_img;
 
                                move_uploaded_file($_FILES["img"]["tmp_name"],"../images/jbpics/".$prod_img);
                                    
 


include("connect_to_mysql.php");
	            
				 $query = mysqli_query($con,"UPDATE product_detail SET Price = '$price', name = '$name', Size = '$size', Product_image = '$prod_img',prod_quan = '$quantity' WHERE Product_id = $P_ID;") or die(mysql_error());	
				 mysqli_query($con, $query);
				?>	
                                        <script> alert('Update Successfully');
						window.location='admin_list_all_product.php';
												</script>
                                

?>