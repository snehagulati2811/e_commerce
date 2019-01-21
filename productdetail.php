<?php
session_start();
error_reporting(0);
if ($_SESSION['userid'] == '') {
    ?>
    <script> location.replace("index.php");</script>
    <?php
}
include("connect_to_mysql.php");
//include("admin/php/myFunctions.php");

$prodID = $_GET['prodid'];
$prodAvail = "";
$txtQuanDisable = "";
$otherProdList = "";
$otherProdCtr = 0;
if (!empty($prodID)) {
    $sqlSelectSpecProd = mysqli_query($con, "select * from product_detail where Product_id = '$prodID'") or die(mysql_error());

    $getProdInfo = mysqli_fetch_array($sqlSelectSpecProd);

    $sqlSelectSpecProd1 = mysqli_query($con, "select * from product_category where ProductCategory_Id = '$prodID'") or die(mysql_error());

    $getProdInfo1 = mysqli_fetch_array($sqlSelectSpecProd);


    $prodNo = $getProdInfo["Product_id"];
    $prodid = $getProdInfo["Product_id"];
    $prodName = $getProdInfo["name"];
    $ProdImg = $getProdInfo["Product_image"];
    $prodDescr = $getProdInfo1["ProductCategory_Name"];
    $prodCat = $getProdInfo["ProductCategory_Id"];
    $prodPrice = $getProdInfo["Price"];
    $prodQuan = $getProdInfo["prod_quan"];
    $desc = $getProdInfo["Description"];

    if ($prodQuan >= 1) {
        $prodAvail = "In Stock";
    } else {
        $prodAvail = "Out of Stock";
        $txtQuanDisable = "disabled";
    }
    $sqlSelectOtherProduct = mysqli_query($con, "select * from product_detail order by date_added desc") or die(mysql_error());
    $sqlCountOtherProduct = mysqli_num_rows($sqlSelectOtherProduct);
    if ($sqlCountOtherProduct >= 1) {
        while ($getOtherProductInfo = mysqli_fetch_array($sqlSelectOtherProduct)) {
            $otherProdNo = $getOtherProductInfo["Product_id"];
            $otherProdId = $getOtherProductInfo["Product_id"];
            $otherProdImg = $getOtherProductInfo["Product_image"];
            $otherProdName = $getOtherProductInfo["Price"];
            $otherProdPrice = $getOtherProductInfo["prod_quan"];

            $otherProdList .= '<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 product_gallery" style="">
				<a href="productdetail.php?prodid=' . $otherProdId . '"><img src="images/jbpics/' . $otherProdImg . '" width="170" height="150"" /></a>
				<h3 style="color:#A79898">' . $otherProdName . '</h3>
				<p style="padding:5px;font-weight:bold;background-color:#ccc">$ ' . $otherProdPrice . '</p>
				<a class="btn btn-primary btn-mini" href="shoppingcart.php?prodid=' . $otherProdId . '" style="color:white"><i class="glyphicon glyphicon-shopping-cart"></i> Add to Cart</a></div>';

            if (++$otherProdCtr >= 3) {
                $otherProdList .= '<a href="all_product_display.php" class="btn btn-primary btn-mini" style="color:white" >View all</a>';
                break;
            }
        }
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <link rel="shortcut icon" type="image/png" href="images/logo.png"/>
            <title>E-Coffee Shop - Product Details</title>
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

        function clearText(field)
        {
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
                    $leftNavigation .= '<a href="all_product_display.php?cat='. $catID .'" class="list-group-item"> ' . $catName .'</a>';
                }
            }
        ?>

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
                            <h4>Product Details</h4>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <a href="images/jbpics/<?php echo $prodNo; ?>.jpg" title="Lady Shoes"><img src="images/jbpics/<?php echo $ProdImg; ?>" style="width:350px; height: 300px; margin-left:15px; border: 2px double;" alt="Image 10" /></a>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <table class="table table-hover">
                                    <tr>
                                        <td height="30" width="160">Price:</td>
                                        <td> <?php echo $prodPrice; ?></td>
                                    </tr>
                                    <tr>
                                        <td height="30">Availability:</td>
                                        <td><?php echo $prodAvail; ?></td>
                                    </tr>
                                    <tr>
                                        <td height="30">Name:</td>
                                        <td><?php echo $prodName; ?></td>
                                    </tr>
                                    <tr>
                                        <td height="30">Category:</td>
                                        <td><?php echo $prodCat; ?></td>
                                    </tr>
                                    <tr>
                                        <td height="30">Description:</td>
                                        <td>test <?php echo $desc; ?></td>
                                    </tr>
                                </table>
                                <div>
                                    <a class="btn btn-primary btn-mini" href="shoppingcart.php?prodid=<?php echo $prodid; ?>" style="color:white"><i class="glyphicon glyphicon-shopping-cart"></i> Add to Cart</a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <p><?php echo $prodDescr; ?></p>	
                                <div class="page-header">
                                    <h4>Other Products</h4>
                                </div>
                                <?php echo $otherProdList; ?>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer"><div style="color:white;">While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy.
            <strong>Copyright YYYY-YYYY by ABC Data. All Rights Reserved.</strong>.</div></div>

                        </body>
                        </html>