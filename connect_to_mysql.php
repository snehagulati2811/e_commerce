<?php

$con = mysqli_connect("localhost", "gulatis1_gulatis", "dbuser12345");
if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }

#connect to database

  $db_select = mysqli_select_db($con, "gulatis1_e_com_coffee_db");
 
    if (!$db_select) {
        die("Database selection failed: " . mysqli_connect_error());
    }

    ignore_user_abort(true);
    set_time_limit(0);
?>
