<?php
session_start();
include("connect_to_mysql.php");

$user_data = mysqli_query($con, "select * from user") or die(mysql_error());

$User_Info = mysqli_fetch_array($user_data);



$Fname = $User_Info["Firstname"];
$Lname = $User_Info["Lastname"];
$Email = $User_Info["Email_ID"];
$Add = $User_Info["Address"];
$Contact = $User_Info["Contact_No"];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <link rel="shortcut icon" type="image/png" href="images/logo.png"/>
            <title>E-Coffee Shop</title>
            <link href="css/slider.css" rel="stylesheet" type="text/css" />

            <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

            <link rel="stylesheet" type="text/css" href="css/styles.css" />

            <script language="javascript" type="text/javascript">

                function clearText(field)
                {
                    if (field.defaultValue == field.value)
                        field.value = '';
                    else if (field.value == '')
                        field.value = field.defaultValue;
                }
            </script>

        </head>

        <body id="home">

            <div id="main_wrapper">
                <div id="main_header">
                    <div id="site_title"><h1><a href="#" rel="nofollow">your site NAME & LOGO</a></h1></div>

                    <div id="header_right">

                    </div> <!-- END -->
                </div> 
                <div id="main_top"></div>
                <div id="main">

                    <!--<div id="sidebar">
                        <h3>Categories</h3>
                        <ul class="sidebar_menu">
                            <li><a href="index.php?cat=juice">Juice</a></li>				
                            <li><a href="index.php?cat=junkfood">Junk Food</a></li>
                            <li><a href="index.php?cat=dessert sprinkler">Dessert Sprinkler</a></li>
                            </ul>
                    </div> <!-- END of sidebar -->

                    <div id="content">
                        <h2><strong>User Info</strong></h2>
                        <form action="update_info.php" method="post">
                            <div class="col col_13 checkout">
                                First Name:                				
                                <input type="text"  style="width:300px;" name="fname" id="fname" value="<?php echo $Fname; ?>" required />
                                Last Name:                				
                                <input type="text"  style="width:300px;" name="lname" id="lname" value="<?php echo $Lname; ?>" required />
                                Address:
                                <input type="text"  style="width:300px;" name="add" id="add" value="<?php echo $Add; ?>" required />

                                Contact:
                                <input type="text"  style="width:300px;" name="contact" id="contact" value="<?php echo $Contact; ?>" maxlength="10" required />
                                E-MAIL
                                <input type="email"  style="width:300px;" name="email" id="email" value="<?php echo $Email; ?>" required />

                                <button type="submit" name="submit" value="submit"> Submit </button>
                            </div>
                        </form>


                    </div> <!-- end of content -->
                    <div class="cleaner"></div>
                </div> <!-- END of main -->

                <div id="main_footer">   
                    <div class="cleaner h40"></div>
                    <center>
                        Copyright © 2014
                    </center>
                </div> <!-- END of footer -->   

            </div>


            <script type='text/javascript' src='js/logging.js'></script>
        </body>
    </html>