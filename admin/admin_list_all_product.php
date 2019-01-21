<?php
error_reporting(0);
session_start();
include("connect_to_mysql.php");
$sqlallProd = mysqli_query($con, "select * from product_detail") or die(mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/png" href="images/logo.png"/>
        <title>E-Coffee Shop</title>
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
                                <a class="img-responsive" href="admin_list_all_product.php"><img src="../images/logo.png" alt="E-Shop" style="max-width:100%; height:auto;display:block;"/></a>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <li>
                                        <a href="../all_product_display.php"> Home</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.container-fluid -->
                    </nav>
                    <div class="container-fluid">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            </div>
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                <h2>Product Information <span style="color: #a11; font-size: 13px; margin-left: 50px;"></span><a class="btn btn-primary btn-mini" style="color:white" href="admin_addnew_product.php">Add New</a></h2>
                                <br/>
                                <div class="cleaner"></div>
                                <table style="width:100%" align="left" class="table table-hover">
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Size</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                    $i = 0;
                                    while ($getProdInfo = mysqli_fetch_array($sqlallProd)) {
                                        $prodID = $getProdInfo["product_id"];
                                        $prodImg = $getProdInfo["Product_image"];
                                        $prodName = $getProdInfo["name"];
                                        $prodQty = $getProdInfo["prod_quan"];
                                        $size = $getProdInfo["Size"];
                                        $prodPrice = $getProdInfo["Price"];
                                        ?>		
                                        <tr>
                                            <td><?php echo $i = $i + 1; ?></td>
                                            <td><?php echo $prodName; ?></td>
                                            <td><img width="100" height="100" src="<?php echo "../images/jbpics/" . $prodImg; ?>"/></td>
                                            <td><?php echo $prodPrice; ?></td>
                                            <td><?php echo $prodQty; ?></td>
                                            <td><?php echo $size; ?></td>
                                            <td>
                                                <a class="btn btn-primary btn-mini" style="color:white" href="delete_product.php?id=<?php echo $prodID; ?>">Delete</a>
                                                <a class="btn btn-primary btn-mini" style="color:white" href="edit_product.php?id=<?php echo $prodID; ?>">Edit</a>
                                            </td>
                                        </tr><?php } ?>
                                </table> 
                                <!--<div><button>Add New</button></div>-->
                            </div><!-- end of content -->
                            <div class="cleaner"></div>
                            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            </div>
                        </div><!-- end of con -->
                        <div class="footer"><div style="color:white;">While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy.
                        <strong>Copyright YYYY-YYYY by ABC Data. All Rights Reserved.</strong>.</div></div>
                                    </body>
                                    </html>