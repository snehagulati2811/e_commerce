<?php
error_reporting(0);
extract($_GET);
$id = $_GET['id'];
include("connect_to_mysql.php");
$query = mysqli_query($con,"DELETE FROM user WHERE user_id = '$id'") or die(mysql_error());
mysqli_query($con, $query);
?>	
<script> alert('Deleted User Successfully');
    window.location = 'user_manage.php';
</script>