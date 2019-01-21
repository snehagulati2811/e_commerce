<?php
error_reporting(0);
session_start();
if ($_SESSION['userid'] == '') {
    ?>
    <script> location.replace("index.php");</script>
<?php
}
include("connect_to_mysql.php");
$sqlallUsers = mysqli_query($con, "select us.*,ust.usertype_name from user us inner join usertype ust on us.usertype_id = ust.usertype_id order by us.user_id asc") or die(mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/png" href="images/logo.png"/>
        <title>E-Coffee Shop - User Manage</title>
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
                                        <a href="all_product_display.php"> Home</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.container-fluid -->
                    </nav>
                    <div class="container-fluid">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h2>User Information <span style="color: #a11; font-size: 13px; margin-left: 50px;"></span></h2>
                            <form name="editdelete_user_form" method="post" action="update_user.php" enctype="multipart/form-data">
                                <div></div>
                                <div class="cleaner"></div>
                                <table style="width:100%" align="left" class="table table-hover">
                                    <tr style="background-color:gray;">
                                        <th>User_ID</th>
                                        <th>Username</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>User Type</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                    $i = 0;
                                    while ($getUserInfo = mysqli_fetch_array($sqlallUsers)) {
                                        $userid = $getUserInfo["user_id"];
                                        $username = $getUserInfo["user_name"];
                                        $fname = $getUserInfo["first_name"];
                                        $laname = $getUserInfo["last_name"];
                                        $email = $getUserInfo["email_id"];
                                        $utype = $getUserInfo["usertype_name"];
                                        ?>		
                                        <form name="editdelete_user_form" method="post" action="update_user.php" enctype="multipart/form-data" class="form-horizontal">
                                            <tr>
                                                <td><input size="4" name='id' value="<?php echo $userid; ?>" readonly ></input></td>
                                                <td><?php echo $username; ?></td>
                                                <td><?php echo $fname; ?></td>
                                                <td><?php echo $laname; ?></td>
                                                <td><?php echo $email; ?></td>
                                                <td>
                                                    <select name='role'>
                                                        <option value='<?php echo $utype ?>' selected='selected'><?php echo $utype ?></option>
                                                        <option value='Client'>Client</option>
                                                        <option value='Employee'>Employee</option>
                                                        <option value='Administrator'>Administrator</option>
                                                        <option value='Business_Manager'>Business_Manager</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button class="btn btn-default">Save</button>
                                                    </form>
                                                    <a class="btn btn-primary btn-mini" style="color:white" href="delete_user.php?id=<?php echo $userid; ?>">Delete</a>
                                                </td>
                                            </tr><?php } ?>
                                </table> 
                        </div><!-- end of content --></div>
                        <div class="footer"><div style="color:white;">While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy.
                        <strong>Copyright YYYY-YYYY by ABC Data. All Rights Reserved.</strong>.</div></div>
                                    </body>
                                    </html>