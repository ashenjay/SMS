<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php session_start(); ?>
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
                            <table border="0" width='100%'>
                                <tbody>
                                    <tr>
                                        <td style="width: 80%">Item Activate/De-activate</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>

                        <?php
                        include_once './_functions.php';
                        include_once './_itemService.php';


                        if (isset($_GET['status'])) {

                            // Create connection
                            $conn = getDBConnection();
// Check connection
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            $sql = "UPDATE item SET itmstatus = '".$_GET['status']."' WHERE id = '".$_GET['itemID']."'";

                            if (mysqli_query($conn, $sql)) {
                                echo "Item Status Changed successfully";
                            } else {
                                echo "Error updating record: " . mysqli_error($conn);
                            }

                            mysqli_close($conn);
                        }
                        ?>
                        <div class="row">
                            <table id="example" class="display" cellspacing="0" width="100%" border="1">
                                <thead>
                                    <tr>
                                        <th>Item ID</th>
                                        <th>Category (Item Name)</th>
                                        <th>Brand</th>
                                        <th>Model</th>
                                        <th>Selling Price</th>
                                        <th>Store Area</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Item ID</th>
                                        <th>Category (Item Name)</th>
                                        <th>Brand</th>
                                        <th>Model</th>
                                        <th>Selling Price</th>
                                        <th>Store Area</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
<?php
$result2 = getAll();
if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result2)) {
        ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['category']; ?></td>
                                                <td><?php echo $row['brand']; ?></td>
                                                <td><?php echo $row['model']; ?></td>
                                                <td><?php echo $row['selling_price']; ?></td>
                                                <td><?php echo $row['description']; ?></td>
                                                <td>

        <?php
        if ($row['itmstatus'] == 'ACT') {
            ?>
                                                        <a href="itemRemove.php?itemID=<?php echo $row['id']; ?>&status=DACT">Activate</a>
                                                        <?php
                                                    }

                                                    if ($row['itmstatus'] == 'DACT') {
                                                        ?>
                                                        <a href="itemRemove.php?itemID=<?php echo $row['id']; ?>&status=ACT">Deactivate</a>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                </tbody>
                            </table>

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
