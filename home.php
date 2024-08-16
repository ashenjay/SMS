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

            .tileIcon{
                margin: 10px;
				width: 40px;
				height: 40px;
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

                    <!-- //header-ends -->
                    <div class="outter-wp">


                        <div class="row">
                            <table border="0" width='100%'>
                                <tbody>
                                    <tr>
                                        <td style="width: 80%"><h1> &nbsp;SMS Enterprises</h1> <hr>
                                        
                                        
                                        </td>
                                        <td> <a href="alertView.php"> <button type="button" class="btn btn-default btn-lg btn-block" > <?php
                                            $conn = getDBConnection();
                                            if (!$conn) {
                                                die("Connection failed: " . mysqli_connect_error());
                                            }

                                            $sql = "SELECT COUNT(*) AS cnt FROM table_alert WHERE DATE(altdate) = DATE(NOW())";
                                            $result = mysqli_query($conn, $sql);

                                            if (mysqli_num_rows($result) > 0) {
                                                // output data of each row
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo 'Reminder Alert:' . $row["cnt"] ;

                                                    if ($row['cnt'] > 0) {
                                                        ?>
                                                        <audio autoplay>
                                                            <source src="asset/alert.mp3" type="audio/mpeg">
                                                        </audio>                                            
                                                        <?php
                                                    }
                                                }
                                            } else {
                                                //                                                echo "0 results";
                                            }

                                            mysqli_close($conn);
                                            ?> 
                                            
                                       </button> 
                                            </a>
                                            </td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>

                        <div class="row"> 

                           
                           



<?php
if ($_SESSION['role'] == 'Admin') {
 ?>
 <table width="100%" border="0">
  <tr align="center">
    <td><strong>Add Item</strong></td>
    <td><strong>Stock Update</strong></td>
    <td><strong>Category</strong></td>
    <td><strong>Brand</strong></td>
    <td><strong>Area</strong></td>
    <td><strong>Search Explorer</strong></td>
    <td><strong>Cart</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td width="13%"><a href="itemAdd.php"><img src="images/icon/Engine-96.png" class="tileIcon" title="Add Item"/></a></td>
    <td width="13%"><a href="stockUpdate.php"><img src="images/icon/Box-80.png" class="tileIcon" title="Stock Update"/></a></td>
    <td width="13%"><a href="categoryMaster.php"><img src="images/icon/Open Folder-100.png" class="tileIcon" title="Category Master"/></a></td>
    <td width="13%"><a href="brandMaster.php"><img src="images/icon/Engineering-96.png" class="tileIcon" title="Brand Master"/></a></td>
    <td width="13%"><a href="stockAreaMaster.php"><img src="images/icon/Booking-80.png" class="tileIcon" title="Brand Master"/></a></td>
    <td width="12%"><a href="searchExplorer.php"><img src="images/icon/Search Property-96.png" class="tileIcon" title="Brand Master"/></a></td>
    <td width="20%"><a href="cartExplorer.php"><img src="images/icon/Shopping Cart Loaded-96.png" class="tileIcon" title="Brand Master"/></a></td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr align="center">
    <td><strong>History</strong></td>
    <td><strong>Alert</strong></td>
    <td><strong>Password</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td><a href="salesHistory.php"><img src="images/icon/Book-96.png" class="tileIcon" title="Brand Master"/></a></td>
    <td><a href="alertManager.php"><img src="images/icon/Electrical Sensor-80.png" class="tileIcon" title="Brand Master"/></a></td>
    <td><a href="changePAssword.php"><img src="images/icon/Password-80.png" class="tileIcon" title="Brand Master"/></a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
 
 <?php
} else if ($_SESSION['role'] == 'Employee') {
?>
<table width="100%" border="0">
  <tr align="center">
    <td width="13%"><strong>History</strong></td>
    <td width="13%"><strong>Alert</strong></td>
    <td width="13%"><strong>Password</strong></td>
    <td width="13%"><strong>Cart</strong></td>
    <td width="13%">&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr align="center">
    <td><a href="salesHistory.php"><img src="images/icon/Book-96.png" class="tileIcon" title="Brand Master"/></a></td>
    <td><a href="alertManager.php"><img src="images/icon/Electrical Sensor-80.png" class="tileIcon" title="Brand Master"/></a></td>
    <td><a href="changePAssword.php"><img src="images/icon/Password-80.png" class="tileIcon" title="Brand Master"/></a></td>
    <td><a href="cartExplorer.php"><img src="images/icon/Shopping Cart Loaded-96.png" class="tileIcon" title="Brand Master"/></a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
 <?php
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
        <!--js -->


        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>


        <style type="text/css">
            #containerDiv{
                margin-left: 20px;
            }
        </style>

    </body>
</html>
