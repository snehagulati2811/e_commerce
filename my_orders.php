<?php
session_start();
error_reporting(0);
include("connect_to_mysql.php");
$id = $_SESSION['user_id'];

$allmyorders = mysqli_query($con, "SELECT * FROM customer_order WHERE user_id = '$id' ") or die(mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/png" href="images/logo.png"/>
        <title>E-Coffee Shop - My Order</title>
        <link href="css/slider.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
            <link rel="stylesheet" type="text/css" href="css/styles.css" />
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
            <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />

            <script type='text/javascript' src='js/jquery.min.js'></script>
            <script type='text/javascript' src='js/bootstrap.min.js'></script>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
                </head>
                <body style="background-color:white">
                    <nav class="navbar navbar-inverse"> 
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="img-responsive" href="index.php"><img src="images/logo.png" alt="E-Shop" style="max-width:100%; height:auto;display:block;"/></a>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                    <div class="container-fluid">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <center><h2>Manage Orders<h2></center>
                                        <form name="editdelete_user_form" method="post" action="update_user.php" enctype="multipart/form-data">
                                            <div></div>
                                            <div class="cleaner"></div>


                                            <table style="width:100%;border: 1px;border-color: white;background-color: white;" align="left" class="table table-hover">
                                                <tr style="background-color:gray;">
                                                    <th>Order No</th>
                                                    <th>Order Date</th>
                                                    <th>Shipping Address</th>
                                                    <th>Total Amount</th>
                                                    <th>View</th>
                                                </tr>
                                                <?php
                                                $i = 0;
                                                while ($myorders = mysqli_fetch_array($allmyorders)) {
                                                    $orderno = $myorders ["order_no"];
                                                    $orderdate = $myorders ["order_date"];
                                                    $saddress = $myorders ["shipping_address"];
                                                    $tot = $myorders ["tot_amount"];
                                                    ?>		
                                                    <form name="editdelete_user_form" method="post" action="update_user.php" enctype="multipart/form-data">
                                                        <tr>
                                                            <td><?php echo $orderno; ?></td>
                                                            <td><?php echo $orderdate; ?></td>
                                                            <td><?php echo $saddress; ?></td>
                                                            <td>$<?php echo $tot; ?></td>
                                                            <td><a style="color:white" class="btn btn-primary btn-mini" href="order_details.php?orderno=<?php echo $orderno; ?>">View</a></td>
                                                        </tr>
                                                    </form>
                                                    <?php
                                                    $i++;
                                                }
                                                if ($i == 0) {
                                                    ?>
                                                    <tr>
                                                        <td colspan="5" align="center">No Orders Yet!!!</td>
                                                    </tr>
                                                <?php } ?>
                                            </table> 
                                        </form>
                                        </div>
                                        </div></div>
                                        </div>
                                                </div>
                                        <div class="footer"><div style="color:white;">While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy.
                                        <strong>Copyright YYYY-YYYY by ABC Data. All Rights Reserved.</strong>.</div></div>
                                                    </body>
                                                    </html>