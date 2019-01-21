<?php
extract($_POST);


$name = $_POST['name'];
$quantity = $_POST['quantity'];
$size = $_POST['size'];
$price = $_POST['price'];
$category = $_POST['category'];
$desc = $_POST['desc'];

$prod_img = strtotime(date('Y-m-d H:i:s')) . ".jpg";

if (move_uploaded_file($_FILES["img"]["tmp_name"], "../images/jbpics/" . $prod_img)) {
    
}
include("connect_to_mysql.php");

$query = mysqli_query($con, "INSERT INTO product_detail (`ProductCategory_Id`, `Price`, `name`, `Description`, `Size`, `prod_quan`,`Product_image`) VALUES ('$category', '$price', '$name', '$desc', '$size', '$quantity', '$prod_img')") or die(mysql_error());
mysqli_query($con, $query);
?>	
<script> alert('Add Product Successfully');
    window.location = 'admin_list_all_product.php';
</script>



