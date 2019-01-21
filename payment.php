<?php
session_start();
error_reporting(0);
if ($_SESSION['userid'] == '') {
    ?>
    <script> location.replace("index.php");</script>
<?php } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/png" href="images/logo.png"/>
        <title>E-Coffee Shop - Payment</title>
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
                                <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="E-Shop" width=110px; height=30px;/></a>
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

                            <?php
// define variables and set to empty values
                            $firstNameErr = $lastNameErr = $cardNoErr = $secNoErr = $expErr = $billingAddressErr = $address2Err = $address1Err = $cityErr = $zipErr = $stateErr = "";
                            $firstName = $lastName = $cardNo = $secNo = $address1 = $address2 = $city = $zip = $state = "";

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (empty($_POST["firstName"])) {
                                    $firstNameErr = "First name is required";
                                } else {
                                    $firstName = $_POST["firstName"];
                                    // check if name only contains letters and whitespace
                                    if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {
                                        $firstNameErr = "Only letters and white space allowed in first name";
                                    }
                                }


                                if (empty($_POST["lastName"])) {
                                    $lastNameErr = "Last name is required";
                                } else {
                                    $lastName = $_POST["lastName"];
                                    // check if name only contains letters and whitespace
                                    if (!preg_match("/^[a-zA-Z ]*$/", $lastName)) {
                                        $lastNameErr = "Only letters and white space allowed in last name";
                                    }
                                }


                                if (empty($_POST["cardNo"])) {
                                    $cardNoErr = "Credit card number is required";
                                } else {
                                    $cardNo = $_POST["cardNo"];
                                    // check if name only contains letters and whitespace
                                    if (!preg_match("/^[0-9]{16}$/", $cardNo)) {
                                        $cardNoErr = "Only 16 letters allowed in credit card no";
                                    }
                                }

                                if ((empty($_POST["expMonth"])) || (empty($_POST["expYear"]))) {
                                    $expErr = "Expiring date is required";
                                } else {
                                    $exp = $_POST["expMonth"] . '/' . $_POST["expYear"];
                                }


                                if (empty($_POST["secNo"])) {
                                    $secNoErr = "Security code is required";
                                } else {
                                    $secNo = $_POST["secNo"];
                                    // check if name only contains letters and whitespace
                                    if (!preg_match("/^[0-9]{3}$/", $secNo)) {
                                        $secNoErr = "Only three numbers allowed in security code";
                                    }
                                }

                                if ($_POST["billingAddress"] == 'shipping') {
                                    $billingAddress = $_SESSION['shippingAddress'];
                                } else {


                                    if ((empty($_POST["address1"])) && (empty($_POST["address2"]))) {
                                        $address1Err = "Address is required";
                                    } else {
                                        $address1 = $_POST["address1"];
                                        $address2 = $_POST["address2"];
                                    }

                                    if (empty($_POST["city"])) {
                                        $cityErr = "City is required";
                                    } else {
                                        $city = $_POST["city"];
                                        // check if name only contains letters and whitespace
                                        if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
                                            $cityErr = "Only letters allowed in city.";
                                        }
                                    }

                                    if (empty($_POST["state"])) {
                                        $stateErr = "state is required";
                                    } else {
                                        $state = $_POST["state"];
                                    }

                                    if (empty($_POST["zip"])) {
                                        $zipErr = "Zip Code is required";
                                    } else {
                                        $zip = $_POST["zip"];
                                        if (!preg_match("/^[0-9]{5}([- ]?[0-9]{4})?$/", $zip)) {
                                            $zipErr = "Zip code is not valid";
                                        }
                                    }
                                    if (empty($address1Err) && empty($cityErr) && empty($stateErr) && empty($zipErr)) {
                                        $billingAddress = $address1 . "  " . $address2 . ", " . $city . ", " . $state . "  " . $zip;
                                        echo "cameee";
                                    } else {
                                        echo "cameee error";
                                        $billingAddressErr = "Billing Address is not valid";
                                    }
                                }


                                if (empty($firstNameErr) && empty($lastNameErr) && empty($cardNoErr) && empty($secNoErr) && empty($expErr) && empty($billingAddressErr)) {
                                    echo "success";
                                    $_SESSION['billingName'] = $firstName . "  " . $lastName;
                                    $_SESSION['billingAddress'] = $billingAddress;
                                    echo $_SESSION['billingName'];
                                    echo $_SESSION['billingAddress'];
                                    ?>
                                    //$_SESSION['payFill'] = 1;
                                    //$firstName = $lastName = $cardNo = $secNo =  $address1 = $address2 = $city = $zip  = $state = "";
                                    //header("Location:orderConfirm.php");
                                    <script> location.replace("orderConfirm.php");</script>
                                    <?php
                                    exit();
                                }
                            }
                            ?>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <div class="page-header">
                                    <h2>Enter Payement Details<small><span class="error" style="color:red;float:right;font-size:13px;">* required field.</span></small></h2>
                                </div>
                                <form method="post" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> 
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">First Name:<span style="color:red;float:right;">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="firstName" value='<?php echo $firstName; ?>'/>
                                            <span style="color:red;font-size:12px;margin:5px"><?php echo $firstNameErr; ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Last Name:<span style="color:red;float:right;">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="lastName" value='<?php echo $lastName; ?>'/>
                                            <span style="color:red;font-size:12px;margin:5px"><?php echo $lastNameErr; ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Credit Card Number:<span style="color:red;float:right;">* 6 letters</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="cardNo" maxlength="16" value='<?php echo $cardNo; ?>'/>
                                            <span style="color:red;font-size:12px;margin:5px"><?php echo $cardNoErr; ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Expiration<br/> Date:<span style="color:red;float:right;">*</span></label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-4">
                                                <select name='expMonth' class="form-control">
                                                    <option value=''>Month</option>
                                                    <option value='1'>01</option>
                                                    <option value='2'>02</option>
                                                    <option value='3'>03</option>
                                                    <option value='4'>04</option>
                                                    <option value='5'>05</option>
                                                    <option value='6'>06</option>
                                                    <option value='7'>07</option>
                                                    <option value='8'>08</option>
                                                    <option value='9'>09</option>
                                                    <option value='10'>10</option>
                                                    <option value='11'>11</option>
                                                    <option value='12'>12</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <select name='expYear' class="form-control">
                                                    <option value=''>Year</option>
                                                    <option value='2016'>2016</option>
                                                    <option value='2017'>2017</option>
                                                    <option value='2018'>2018</option>
                                                    <option value='2019'>2019</option>
                                                    <option value='2020'>2020</option>
                                                    <option value='2021'>2021</option>
                                                    <option value='2022'>2022</option>
                                                    <option value='2023'>2023</option>
                                                    <option value='2024'>2024</option>
                                                    <option value='2025'>2025</option>
                                                    <option value='2026'>2026</option>
                                                </select>
                                            </div>
                                            <span style="color:red;font-size:12px;margin:5px"><?php echo $expErr; ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Security Code (xxx):<span style="color:red;float:right;">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" name="secNo" maxlength="3" value='<?php echo $secNo; ?>' class="form-control"/>
                                            <span style="color:red;font-size:12px;margin:5px"><?php echo $secNoErr; ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Billing Address</label>
                                        <div class="col-sm-6">
                                            <input type = 'Radio' Name ='billingAddress' id='billingAdress' value= 'shipping' class="form-control" checked onchange='visibleAddress(value)'><?php echo "Same as shipping :" . "  " . $_SESSION['shippingAddress']; ?>
                                                <input type = 'Radio' Name ='billingAddress' id='billingAdress' value= 'newBilling' class="form-control" onchange='visibleAddress(value)'>
                                                    </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">New Address : Address 1</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" id='address1' disabled name="address1" value='<?php echo $address1; ?>' class="form-control"/> 
                                                            <span style="color:red;font-size:12px;margin:5px"><?php echo $address1Err; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Address 2</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" id='address2' disabled name="address2" value='<?php echo $address2; ?>' class="form-control"/>
                                                            <span style="color:red;font-size:12px;margin:5px"><?php echo $address2Err; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">City</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" disabled id='city' name="city" value='<?php echo $city; ?>' class="form-control"/>
                                                            <span style="color:red;font-size:12px;margin:5px"><?php echo $cityErr; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">State: <span style="color:red;float:right;">*</span></label>
                                                        <div class="col-sm-6">
                                                            <select disabled id='state' name='state' class="form-control">
                                                                <option value=''>Choose a State</option>
                                                                <option value='AK'>Alaska</option>
                                                                <option value='AL'>Alabama</option>
                                                                <option value='AR'>Arkansas</option>
                                                                <option value='AZ'>Arizona</option>
                                                                <option value='CA'>California</option>
                                                                <option value='CO'>Colorado</option>
                                                                <option value='CT'>Connecticut</option>
                                                                <option value='DC'>District of Columbia</option>
                                                                <option value='DE'>Delaware</option>
                                                                <option value='FL'>Florida</option>
                                                                <option value='GA'>Georgia</option>
                                                                <option value='HI'>Hawaii</option>
                                                                <option value='IA'>Iowa</option>
                                                                <option value='ID'>Idaho</option>
                                                                <option value='IL'>Illinois</option>
                                                                <option value='IN'>Indiana</option>
                                                                <option value='KS'>Kansas</option>
                                                                <option value='KY'>Kentucky</option>
                                                                <option value='LA'>Louisiana</option>
                                                                <option value='MA'>Massachusetts</option>
                                                                <option value='MD'>Maryland</option>
                                                                <option value='ME'>Maine</option>
                                                                <option value='MI'>Michigan</option>
                                                                <option value='MN'>Minnesota</option>
                                                                <option value='MO'>Missouri</option>
                                                                <option value='MS'>Mississippi</option>
                                                                <option value='MT'>Montana</option>
                                                                <option value='NC'>North Carolina</option>
                                                                <option value='ND'>North Dakota</option>
                                                                <option value='NE'>Nebraska</option>
                                                                <option value='NH'>New Hampshire</option>
                                                                <option value='NJ'>New Jersey</option>
                                                                <option value='NM'>New Mexico</option>
                                                                <option value='NV'>Nevada</option>
                                                                <option value='NY'>New York</option>
                                                                <option value='OH'>Ohio</option>
                                                                <option value='OK'>Oklahoma</option>
                                                                <option value='OR'>Oregon</option>
                                                                <option value='PA'>Pennsylvania</option>
                                                                <option value='PR'>Puerto Rico</option>
                                                                <option value='RI'>Rhode Island</option>
                                                                <option value='SC'>South Carolina</option>
                                                                <option value='SD'>South Dakota</option>
                                                                <option value='TN'>Tennessee</option>
                                                                <option value='TX'>Texas</option>
                                                                <option value='UT'>Utah</option>
                                                                <option value='VA'>Virginia</option>
                                                                <option value='VT'>Vermont</option>
                                                                <option value='WA'>Washington</option>
                                                                <option value='WI'>Wisconsin</option>
                                                                <option value='WV'>West Virginia</option>
                                                                <option value='WY'>Wyoming</option>
                                                            </select>
                                                            <span style="color:red;font-size:12px;margin:5px"><?php echo $stateErr; ?></span>

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Zip:</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="zip" id='zip' disabled value='<?php echo $zip; ?>' class="form-control"/>
                                                            <span style="color:red;font-size:12px;margin:5px"><?php echo $zipErr; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" class="btn btn-default">Submit</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                    </div>
                                                    </div>
                                                    <script type="text/javascript">
                                                        function visibleAddress(val) {
                                                            if (val == 'shipping') {
                                                                document.getElementById("address1").disabled = true;
                                                                document.getElementById("address2").disabled = true;
                                                                document.getElementById("city").disabled = true;
                                                                document.getElementById("state").disabled = true;
                                                                document.getElementById("zip").disabled = true;
                                                            } else {
                                                                document.getElementById("address1").disabled = false;
                                                                document.getElementById("address2").disabled = false;
                                                                document.getElementById("city").disabled = false;
                                                                document.getElementById("state").disabled = false;
                                                                document.getElementById("zip").disabled = false;

                                                            }
                                                        }

                                                    </script>
                                                    </div>
                                                    <div class="footer"><div style="color:white;">While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy.
                                                    <strong>Copyright YYYY-YYYY by ABC Data. All Rights Reserved.</strong>.</div></div>
                                                                </body>
                                                                </html>