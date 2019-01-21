<?php
error_reporting(0);
session_start();
$_SESSION['favcolor'] = 'green';
include("connect_to_mysql.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/png" href="images/logo.png"/>
        <title>E-Coffee Shop - Add New Product</title>
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
                            <h2>Product Information <span style="color: #a11; font-size: 13px; margin-left: 50px;"></span></h2>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            </div>
                            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                <form name="editdelete_product_form" method="post" action="add_product_to_db.php" enctype="multipart/form-data" class="form-horizontal">
                                    <h2><strong>Add Product</strong></h2>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Product Name:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" id="name" class="form-control" required /><br />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Size:</label>
                                        <div class="col-sm-4">
                                            <select name="size" id="size" required class="form-control"/>
                                            <option value"S">S</option>
                                            <option value"M">M</option>
                                            <option value"L">L</option>
                                            <option value"X">X</option>
                                            </select>
                                        </div>
                                        <label class="col-sm-2 control-label">Quantity:</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="quantity" id="quantity" required class="form-control"/> lb<br />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Price:</label>
                                        <div class="col-sm-10">
                                            <input type="Number"  style="width:300px;" name="price" id="price" value="<?php echo $prodPrice; ?>" required class="form-control"/>/lb
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Product Image:</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="img" id="img" required class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Category:</label>
                                        <div class="col-sm-4">
                                            <?php
                                                $catOptions = "";
                                                    
                                                $sqlGetCategory = mysqli_query($con, "select * from product_category where Active=1") or die(mysql_error());
                                                    if (mysqli_num_rows($sqlGetCategory) > 0) {
                                                        while ($getCategoryInfo = mysqli_fetch_array($sqlGetCategory)) {
                                                            $catID = $getCategoryInfo["ProductCategory_Id"];
                                                            $catName = $getCategoryInfo["ProductCategory_Name"];
                                                            $catOptions .= '<option value="'. $catID . '">' . $catName . '</option>';
                                                        }
                                                    }
                                            ?>
                                            <select name="category" id="category" required class="form-control"/>
                                            <?php
                                                echo $catOptions;
                                            ?>
                                           
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Description:</label>
                                        <div class="col-sm-10">
                                            <textarea height="50" width="30" name="desc" id="desc" required class="form-control"></textarea>           				
                                        </div>
                                    </div>
                                    <center><button type="submit" name="submit" class="btn btn-default" value="submit">Add Product </button></center>
                                </form>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                </div>
                                <div class="footer"><div style="color:white;">While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy.
                                <strong>Copyright YYYY-YYYY by ABC Data. All Rights Reserved.</strong>.</div></div>
                                            </body>
                                            </html>