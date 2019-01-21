<?php

error_reporting(0);
session_start();

?>
   
    <?php

$registration = "";
$logout = "";                                        
if (isset($_GET["code"])) {
    if ($_GET["code"] == "success") {
        $registration = "User successfully registered, please login";
    } else if ($_GET["code"] == "logout") {
        $logout = "Successfully logged out, thanks for using the application.";
    } else if ($_GET["code"] == "password") {
        $logout = "Incorrect user or Password. Please try again.";
    }
}
$usernameErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (empty($_POST["username"])) {
        $usernameErr = "User Name is required";
    }
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
        
    }
   
    if (!empty($_POST["password"]) && !empty($_POST["username"]) && empty($passwordErr) && empty($usernameErr)) {
   
        include("connect_to_mysql.php");
      
        $_SESSION['log'] = 0;
        $name = $_POST['username'];
        $password = $_POST['password'];
        
        $sql1 = mysqli_query($con, "SELECT us.*, ust.usertype_name FROM user us INNER JOIN usertype ust ON us.usertype_id = ust.usertype_id WHERE us.user_name='$name' AND 	us.password='$password'");
        $count = mysqli_num_rows($sql1);
        $userInfo = mysqli_fetch_array($sql1);
        if ($count>0) {
              $_SESSION['usertype'] = $userInfo["usertype_name"];
              $_SESSION['userid'] = $name;
              $_SESSION['log'] = 1;
              $_SESSION['customer_id'] = $userInfo["user_id"];
              $_SESSION['user_id'] = $userInfo["user_id"];
          
            ?>
            <script> location.replace("all_product_display.php");</script>
        <?php } else {
            ?>
            <script> location.replace("index.php?code=password");</script>
            <?php
        }
    }
}


function is_empty(&$var){
    if(!isset($var)) return true;
 
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="images/logo.png"/>
        <title>E-Coffee Shop</title>
        <link rel="stylesheet" type="text/css" href="css/slider.css"/>
        <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
           
        <script type='text/javascript' src='js/jquery.min.js'></script>
        <script type='text/javascript' src='js/bootstrap.min.js'></script>
            
                </head>
                <body style="background-color:white">
                
                       <nav class="navbar navbar-inverse"> 
                        <div class="container-fluid">
                        
                            <div class="navbar-header">
                              
                                <a class="img-responsive" href="index.php"><img src="images/logo.png" alt="E-Shop" style="max-width:100%; height:auto;display:block;"/></a>
                            </div>

                           
                            <div class="collapse navbar-collapse" >
                                <ul class="nav navbar-nav navbar-right">
                                    <li>
                                        <?php
                                        if ($_SESSION['log'] == 1) {
                                            echo "<p class='navbar-text'>Welcome" . " " . $_SESSION['userid'] . "!!</p>";
                                        }
                                        ?>

                                    </li>
                                    <li>
                                        <?php
                                        if ($_SESSION['log'] == 1) {

                                            echo '<a href=Logout.php>Logout</a>';
                                        }

                                        if (($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Business_Manager')) {
                                            echo '<a href="admin/admin_list_all_product.php"> Employee</a>';
                                        }

                                        if (($_SESSION['usertype'] == 'Administrator') || ($_SESSION['usertype'] == 'Business_Manager')) {
                                            echo '<a href="user_manage.php"> Admin</a>';
                                        }
                                        ?>

                                    </li>
                                    <li>
                                        <?php
                                        if ($_SESSION['log'] == 1) {
                                            echo '<a href="View_profile.php"> My Account</a>';
                                        } else {
                                            echo '<a href="index.php"> My Account</a>';
                                        }
                                        ?>

                                    </li>
                                    <li>
                                        <?php
                                        if (isset($_SESSION['cartCount'])) {
                                            echo '<a href="shoppingcart.php"> Cart(' .
                                            $_SESSION['cartCount'] . ')</a>';
                                        } else {
                                            $_SESSION['cartCount'] = 0;
                                            echo '<a href="shoppingcart.php"> Cart(' .
                                            $_SESSION['cartCount'] . ')</a>';
                                        }
                                        ?>

                                    </li>

                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="container-fluid">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="page-header">
                                    <h2>Sign In<small><span class="error" style="color:red;float:right;font-size:13px;">* required field.</span></small></h2>
                                </div>
                                <center>
                                    <h4><?php echo $registration; ?></h4>
                                    <h4><?php echo $logout; ?></h4>

                                    <form class="form-horizontal"  action="index.php" method="POST">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Username: <span style="color:red;float:right;">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control"  name="username"/>
                                                <span style="color:red;font-size:12px;margin:5px"><?php echo $usernameErr; ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Password: <span style="color:red;float:right;">*</span></label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="password" type="password"/>
                                                <span style="color:red;font-size:12px;margin:5px"><?php echo $passwordErr; ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <input type="submit" class="btn btn-default" value="Login" /> 
                                                &nbsp;&nbsp;&nbsp;<a href="signup.php">Sign Up</a>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </center>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            </div>
                        </div>
                    </div>
                 
                                        
            <div class="footer"><div style="color:white;">While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy.
            <strong>Copyright YYYY-YYYY by ABC Data. All Rights Reserved.</strong>.</div></div>
        </body>
    </html>