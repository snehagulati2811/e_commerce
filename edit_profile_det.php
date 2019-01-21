<?php

session_start();
include("connect_to_mysql.php");

if ($_SESSION['log'] == 1) {

   
    $id = $_GET['id'];
    $b = $_POST['fname'];
    $c = $_POST['lname'];
    $d = $_POST['email'];

    if (($b == "") || ($c == "") || ($d == "")) {
        header('location:Edit_profile.php?code=nullValue');
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/", $c)) {
            header('location:Edit_profile.php?code=invalidfname');
        } else if (!preg_match("/^[a-zA-Z ]*$/", $b)) {
            header('location:Edit_profile.php?code=invalidlname');
        } else if (!filter_var($d, FILTER_VALIDATE_EMAIL)) {
            header('location:Edit_profile.php?code=invalidemail');
        } else {
            $query = "update `user` set first_name='$b',last_name='$c',email_id='$d' where user_name='$id'";
            $result = mysqli_query($con, $query);

            if ($result) {
                header("location:View_profile.php");
            } else {
                header('location:Edit_profile.php?code=unsuccess');
            }
        }
    }
} else {
    header("location:View_profile.php");
}


?>