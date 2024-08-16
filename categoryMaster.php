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
                                      
                                        <td><h3> <img src="images/icon/Open Folder-100.png" width="50" height="50" > Category Master</h3><hr></td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>

                        <div class="row">
                            <form name="form1" method="post" action="categoryMaster.php">
                                <table width="50%" border="0">
                                    <tr>
                                        <td width="50%" align="right">Category (Item Name)</td>
                                      <td width="50%"><input type="text" name="description" id="description"></td>
                                    </tr>
                                    <tr>
                                        <td align="right">Status</td>
                                        <td><select name="status" id="status">
                                                <option value="ACTIVE">Active</option>
                                                <option value="DEACTIVE">Deactive</option>

                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><input type="submit" name="btnBrand" id="button" value="Add Brand"></td>
                                    </tr>
                                </table>
                                <br>
                            </form>

                            <?php
                            include '_functions.php';
                            if (isset($_POST['btnBrand'])) {
                                $conn = getDBConnection();

                                $sql = " INSERT INTO category
            (description,
             status
             )
VALUES ('" . $_POST['description'] . "',
        '" . $_POST['status'] . "'); ";

                                if (mysqli_query($conn, $sql)) {
                                    $last_id = mysqli_insert_id($conn);
                                    echo "<p class=\"bg-success\"> New record created successfully </p>";
                                } else {
                                    echo "<p class=\"bg-danger\"> Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
                                }

                                mysqli_close($conn);
                            }
                            ?>

                        </div>

                        <div class="row">
                            <table width="100%" border="1">
                                <tr>
                                    <td width="31%"><strong>Category (Item Name)</strong></td>
                                    <td width="62%"><strong>Status</strong></td>
                                    <td width="7%">&nbsp;</td>
                                </tr>

                                <?php
                                $conn = getDBConnection();
                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }
                                $sql = "SELECT * FROM category";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>

                                        <tr>
                                            <td><?php echo $row["description"] ?></td>
                                            <td><?php echo $row["status"] ?></td>
                                            <td><a href="#">update</a></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "0 results";
                                }
                                mysqli_close($conn);
                                ?>




                            </table>

                        </div>





                        <!--//outer-wp-->
                    </div>
                    <!--footer section start
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
                    <?php include 'profile.php'; ?>
                </div>
                <!--//down-->
                <div class="menu">
                    <?php include 'menu-admin.php'; ?>
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
