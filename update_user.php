<?php
$role = $_POST['role'];
$id = $_POST['id'];

include("connect_to_mysql.php");

$query = mysqli_query($con, "UPDATE user SET usertype_id = (SELECT usertype_id FROM usertype WHERE usertype_name = '$role' ) WHERE user_id = '$id'") or die(mysql_error());
mysqli_query($con, $query);
?>	
<script>
    alert('Changed User Role Successfully');
    window.location = 'user_manage.php';
</script>
