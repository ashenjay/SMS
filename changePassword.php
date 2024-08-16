<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include_once './_functions.php';
?>
<html>
    <head>
        <title>SMS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <!-- Custom CSS -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <!-- Graph CSS -->
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <!-- jQuery -->
        <!-- lined-icons -->
        <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
        <!-- //lined-icons -->



        <!--datatable-->
        <script src="js/jquery-1.12.4.js" type="text/javascript"></script>
        <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
        <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <style type="text/css">
            body,td,th {
                font-family: Roboto, sans-serif;
                font-size: small;
            }
        </style>
        <script type="text/javascript">

            $(document).ready(function () {
                $('#example').DataTable();
            });

        </script>
    </head>
    <body>
        <div class="page-container">
            <!--/content-inner-->
            <div class="left-content">
                <div class="inner-content">
                    <!-- header-starts -->
                    <div class="header-section">

                    </div>
                    <!-- //header-ends -->
                    <div class="outter-wp" id="containerDiv">

                        <div class="row">
<!--                            <table border="0" width='100%'>
                                <tbody>
                                    <tr>
                                        <td style="width: 80%">Home</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>-->


                        </div>

                        <div class="row">
                            <h4> Change Password</h4>
                            <form name="form1" method="post" action="">
                                <table width="50%" border="0">
                                    <tr>
                                        <td width="50%" align="right"><strong>Current password</strong></td>
                                        <td width="50%"><input type="password" name="cpword" id="cpword" required></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><strong>New password</strong></td>
                                        <td><input type="password" name="npword" id="npword" required></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><strong>Retype new password</strong></td>
                                        <td><input type="password" name="rnpword" id="rnpword" required></td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                        <td><input type="submit" name="btnPword" id="button" value="Change Password"></td>
                                    </tr>
                                </table>
                            </form>


                            <?php
                            if (isset($_POST['btnPword'])) {

                                if (($_POST['npword'] == $_POST['rnpword']) && $_POST['npword'] >= 6) {
                                    //changing the password
                                    // Create connection
                                    $conn = getDBConnection();
// Check connection
                                    if (!$conn) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }


                                    $sql = "SELECT * FROM  users WHERE PASSWORD=PASSWORD('" . $_POST['cpword'] . "') AND id = '" . $_SESSION['userid'] . "'";
                                    
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {


                                        $sql = "UPDATE users SET PASSWORD=PASSWORD('" . $_POST['npword'] . "') WHERE PASSWORD=PASSWORD('" . $_POST['cpword'] . "') AND id = '" . $_SESSION['userid'] . "'";

                                        if (mysqli_query($conn, $sql)) {
                                            echo "Password Changed successfully";
                                        } else {
                                            echo "Error updating record: " . mysqli_error($conn);
                                        }
                                        
                                    } else {
                                        echo "Invalid password";
                                    }



                                    mysqli_close($conn);
                                } else {
                                    echo 'Password should be at lease 6 characters';
                                }
                            }
                            ?>



                        </div>







                        <!--//outer-wp-->
                    </div>
                    <!--footer section start-->
                    <footer>
                        <p> &copy 2017 SMS. All Rights Reserved | Design for <a href="#" target="_blank">SMS </a></p>
                    </footer>
                    <!--footer section end-->
                </div>
            </div>
            <!--//content-inner-->
            <!--/sidebar-menu-->
            <div class="sidebar-menu"> 
                <header class="logo">
                    <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.html"> <span id="logo"> <h1> <img src="images/sms_logo.jpg" width="50" height="50" >SMS</h1></span> 
                        <!--<img id="logo" src="" alt="Logo"/>--> 
                    </a> 
                </header>
                <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
                <!--/down-->
                <div class="down">	
                    <?php include './profile.php'; ?>
                </div>
                <!--//down-->
                <div class="menu">
                    <?php include './menu.php'; ?>
                </div>
            </div>
            <div class="clearfix"></div>		
        </div>
        <script>
            var toggle = true;

            $(".sidebar-icon").click(function () {
                if (toggle)
                {
                    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                    $("#menu span").css({"position": "absolute"});
                } else
                {
                    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                    setTimeout(function () {
                        $("#menu span").css({"position": "relative"});
                    }, 400);
                }

                toggle = !toggle;
            });
        </script>


        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>


        <style type="text/css">
            #containerDiv{
                margin-left: 20px;
            }
        </style>
    </body>
</html>
