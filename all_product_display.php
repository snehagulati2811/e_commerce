<?php
error_reporting(0);
session_start();

if ($_SESSION['userid'] == '') {
    ?>
    <script> location.replace("index.php");</script>
    <?php
}
include("connect_to_mysql.php");
$displayImages = "";

if (isset($_GET['cat'])) {
   
    $sqlSelProd = mysqli_query($con, "select * from product_detail where ProductCategory_Id = '$_GET[cat]'") or die(mysql_error());
   
}
else {
    $sqlSelProd = mysqli_query($con,"select * from product_detail where `Active`='1'") or die(mysql_error());
}

if (mysqli_num_rows($sqlSelProd) > 0) {
    while ($getProdInfo = mysqli_fetch_array($sqlSelProd)) {
        $prodID = $getProdInfo["product_id"];
        $prod_img = $getProdInfo["Product_image"];
        $prodName = $getProdInfo["name"];
        $prodPrice = $getProdInfo["Price"];
        $prodShipping = $getProdInfo["shippingCharge"];
        $displayImages .= '<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 product_gallery" style="">
			<a href="productdetail.php?prodid=' . $prodID . '"><img src="images/jbpics/' . $prod_img . '"  width="170" height="250" /></a>
			<h3 style="color:#000">' . $prodName . '</h3>
			<p style="padding:5px;font-weight:bold;background-color:#ccc">$ ' . $prodPrice . '</p>
			<a class="btn btn-primary btn-mini" href="shoppingcart.php?prodid=' . $prodID . '" style="color:white"><i class="glyphicon glyphicon-shopping-cart"></i> Add to Cart</a></div>';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="css/slider.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />

        <script type='text/javascript' src='js/jquery.min.js'></script>
        <script type='text/javascript' src='js/bootstrap.min.js'></script>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script language="javascript" type="text/javascript">
        function clearText(field) {
            if (field.defaultValue == field.value)
                field.value = '';
            else if (field.value == '')
                field.value = field.defaultValue;
        }
        </script>
        <?php
            $leftNavigation = "";
            
            $sqlGetCategory = mysqli_query($con, "select * from product_category where Active=1") or die(mysql_error());
            if (mysqli_num_rows($sqlGetCategory) > 0) {
                while ($getCategoryInfo = mysqli_fetch_array($sqlGetCategory)) {
                    $catID = $getCategoryInfo["ProductCategory_Id"];
                    $catName = $getCategoryInfo["ProductCategory_Name"];
                    $leftNavigation .= '<a class="list-group-item" href="all_product_display.php?cat='. $catID .'"> ' . $catName .'</a>';
                }
            }
        ?>
        <link rel="shortcut icon" type="image/png" href="images/logo.png"/>
        <title>E-Coffee shop - All Products</title>

    </head>
    <body style="background-color:white">

        <nav class="navbar navbar-inverse"> 
            <div class="container-fluid">
               
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="img-responsive" href="index.php"><img src="images/logo.png" alt="E-Shop" style="max-width:100%; height:auto;display:block;"/></a>
                </div>

               
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
                <div  class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="page-header">
                        <h4>Categories</h4>
                    </div>
                    <div class="list-group">
                        <a href="all_product_display.php" class="list-group-item">All Products</a>
                        <?php
                        echo $leftNavigation;
                        ?>
                       
                    </div>
                </div>
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <div class="page-header">
                        <h4>Products</h4>
                    </div>
                    <form action="products.php" method="post" name="search_form">
                        <div class="form-group col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <input type="text" value="Search" name="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="form-control"/>
                        </div>
                        <button type="submit" name="Search" id="searchbutton" title="Search" class="btn btn-primary">Search</button>
                    </form>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        
                        <?php
                        echo $displayImages;
                        if (mysqli_num_rows($sqlSelProd) == 0) {
                            ?> <h1> No Product </h1><?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
                <div style="color:white;">While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy.<strong>Copyright YYYY-YYYY by ABC Data. All Rights Reserved.</strong>.
                </div>
        </div>

    </body>
</html>