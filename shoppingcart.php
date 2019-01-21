<?php
error_reporting(0);
session_start();
if ($_SESSION['userid'] == '') {
    ?>
    <script> location.replace("index.php");</script>
<?php
}
include("connect_to_mysql.php");

//setlocale(LC_MONETARY,"en_US");
$i = 0;
if (!empty($_GET['prodid'])) {
    $pid = $_GET['prodid'];


    $wasFound = false;
    #$i = 0;
    if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1 || (($_SESSION["cart_array"]) == "")) {
        $_SESSION["cart_array"] = array(0 => array("productID" => $pid, "quantity" => 1));
        //$_SESSION["cart_array"]=array(0=>array("productID"=>$pid,"quantity"=>1,"price"=>$prodPrice,"shippingCharge"=>$prodShipping));
    } else {
        foreach ($_SESSION["cart_array"] as $each_product) {
            $i++;
            while (list($key, $value) = each($each_product)) {
                if ($key == "productID" && $value == $pid) {
                    array_splice($_SESSION["cart_array"], $i - 1, 1, array(array("productID" => $pid, "quantity" => $each_product ['quantity'] + 1)));
                    $wasFound = true;
                }
            }
        }
        if ($wasFound == false) {
            array_push($_SESSION["cart_array"], array("productID" => $pid, "quantity" => 1));
        }
    }
    ?>
    <script> location.replace("shoppingcart.php");</script>
    //header("location:shoppingcart.php");

    <?php
    exit();
}
//-------------------------------------------------------------------------------------------------
if (isset($_POST['btnUpdate'])) {
    $submit = $_POST['btnUpdate'];
    if ($submit == "Update") {
        $x = 0;
        $i = 0;
        //echo $_POST['txtQuan2'];
        //echo $_POST['txtHoldProdId0'];
        foreach ($_SESSION["cart_array"] as $each_product) {
            $i++;
            $quantity = $_POST['txtQuan' . $x];
            $prodStock = $_POST['txtHoldQuan' . $x];
            $prodAdjustId = $_POST['txtHoldProdId' . $x++];
            if ($quantity < 1) {
                $quantity = 1;
            }
            if ($quantity > $prodStock) {
                $quantity = $prodStock;
            }
            while (list($key, $value) = each($each_product)) {
                array_splice($_SESSION["cart_array"], $i - 1, 1, array(array("productID" => $prodAdjustId, "quantity" => $quantity)));
            }
        }
    }
}
//-------------------------------------------------------------------------------------------------
if (!empty($_GET['cid']) || isset($_GET['cid'])) {
    $removeKey = $_GET['cid'];
    if (count($_SESSION["cart_array"]) <= 1) {
        unset($_SESSION["cart_array"]);
    } else {
        unset($_SESSION["cart_array"]["$removeKey"]);
        sort($_SESSION["cart_array"]);
    }
}
//-------------------------------------------------------------------------------------------------
$cartTitle = "";
$cartOutput = "";
$cartTotal = "";
if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1 || (($_SESSION["cart_array"]) == "")) {
    $_SESSION['cartCount'] = 0;
    $cartOutput = "<h2 align='center'> Your shopping cart is empty </h2>";
} else {
    $x = 0;
    $cartTitle .= '<form name="shoppingcart_form" action="shoppingcart.php" method="post" /><table class="table"><thead>
				<tr>
                        	<th>Image </th> 
                        	<th>Name </th> 
                       	  	<th>Quantity </th> 
							<th>Stock </th> 
                        	<th>Price </th>
							<th>Shipping Charge </th> 
                        	<th>Total </th> 
                        	<th></th>
							</tr></thead>';
    $i = 0;
    $cartCount = 0;
    foreach ($_SESSION["cart_array"] as $each_product) {
        $product_id = $each_product['productID'];
        $cartCount += $each_product['quantity'];
        $_SESSION['cartCount'] = $cartCount;
        $sql = mysqli_query($con, "select * from product_detail where Product_id='$product_id' limit 1");
        while ($row = mysqli_fetch_array($sql)) {
            //$prodNo = $row["prod_no"];
            $prodID = $row["product_id"];
            $prodName = $row["name"];
            $prodPrice = $row["Price"];
            $shippingCharge = $row["shippingCharge"];
            $prodQuan = $row["prod_quan"];
            $Product_image = $row["Product_image"];
        }
        //print_r($each_product);die

        $pricetotal = ($prodPrice * $each_product['quantity'] ) + $shippingCharge;
        $cartTotal = $pricetotal + $cartTotal;
        //$cartTotal= number_format($pricetotal+$cartTotal,2);

        $cartOutput .= '<tr><td><img style="border: 2px solid;" src="images/jbpics/' . $Product_image . '" width="150" height="120" /></td> 
				<td>' . $prodName . '</td> 
				<td><input type="hidden" name="txtHoldProdId' . $i . '" value="' . $prodID . '" /><input name="txtQuan' . $i . '" maxlength=3 type="text" value="' . $each_product['quantity'] . '" style="width: 40px; text-align: center" /> lb </td>
				<td><input type="hidden" name="txtHoldQuan' . $i . '" value="' . $prodQuan . '" /> ' . $prodQuan . 'lb</td> 
				<td>' . $prodPrice . '/lb</td>
				<td>' . $shippingCharge . '</td>
				<td>' . $pricetotal . '</td>
				<td> <a href="shoppingcart.php?cid=' . $i++ . '"><i class="glyphicon glyphicon-remove"></i></a> </td></tr>';

        $_SESSION['checkoutCartTotal'] = $cartTotal;
    }

    $cartOutput .= '<tr>
                        	<td colspan="3" align="right"  height="40px">Have you modified your basket? Please click here to <input class="btn_upd" type="submit" name="btnUpdate" value="Update" />&nbsp;&nbsp;</td>
                            <td align="right" style="background:#ccc; font-weight:bold"> Total: </td>
                            <td colspan="2" align="left" style="background:#ccc; font-weight:bold;">$' . $cartTotal . ' </td>
                            <td colspan="2" style="background:#ccc; font-weight:bold"> </td>
						</tr>
					</table>
                    <div style="float:right; width: 215px; margin-top: 20px;">
                    
                        <div class="checkout"><a class="btn btn-primary btn-mini" style="color:white" href="Shipping.php">Proceed to Checkout</a></div>
                    	
                    </div></form>';
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <link rel="shortcut icon" type="image/png" href="images/logo.png"/>
            <title>E-Coffee Shop - Shopping</title>
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
                                        <h4>Products</h4>
                                    </div>
                                    <?php echo $cartTitle; ?>
                                    <?php echo $cartOutput; ?>
                                </div>
                            </div>
                        </div>
                        <div class="footer"><div style="color:white;">While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy.
                        <strong>Copyright YYYY-YYYY by ABC Data. All Rights Reserved.</strong>.</div></div>
                                    </body>
                                    </html>