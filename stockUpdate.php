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

        <!--clock init-->
        <script src="js/css3clock.js"></script>
        <!--Easy Pie Chart-->
        <!--skycons-icons-->
        <script src="js/skycons.js"></script>

        <script src="js/jquery.easydropdown.js"></script>

        <!--datatable-->
        <script src="js/jquery-1.12.4.js" type="text/javascript"></script>
        <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
        <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        
               <script src="js/JsBarcode.ean-upc.min.js" type="text/javascript"></script>
               
        <style type="text/css">
        body,td,th {
	font-family: Roboto, sans-serif;
	font-size: small;
}
        </style>
        <script type="text/javascript">

            $(document).ready(function () {
                $('#example').DataTable();
				
				JsBarcode(".barcode").init();
				
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
                    <div class="outter-wp">

                        <div class="row">
                            <table border="0" width='100%'>
                                <tbody>
                                    <tr>
                                        <td><h3> <img src="images/icon/Box-80.png" width="50" height="50" > Stock Master</h3><hr></td>
                                 
                                    </tr>
                                </tbody>
                            </table>


                        </div>

                        <div class="row">
                        

                            <?php
                            include_once './_functions.php';
                            include_once './_itemService.php';
                            if (isset($_GET['itemID'])) {
                                $result_3 = getItemByID($_GET['itemID']);
                                
                                 while ($row = mysqli_fetch_assoc($result_3)) {
                                ?>
                                <table width="100%" border="0">
                                    <tr>
                                        <td width="25%">
                                        <img src="item_images/<?php echo $row["image_path"]; ?> " width="150" height="150"  /></td>
                                        <td width="75%"><form name="form1" method="post" action="">
                                          <table width="100%" border="0">
                                              <tr>
                                                <td width="31%" align="right">&nbsp;</td>
                                                <input type="hidden" name="itemID" value="<?php echo $row["id"]; ?>"/>
                                              <td width="35%" align="right"><strong>Category (Item Name)</strong></td>
                                              <td width="34%"><?php echo $row["category"]; ?></td>
                                            </tr>
                                            <tr>
                                              <td rowspan="7" align="right">
                                        <svg class="barcode"
                                                 jsbarcode-format="ean13"
                                                 jsbarcode-value="<?php echo $row["bcn"]; ?>"
                                                 jsbarcode-textmargin="0"
                                                 jsbarcode-fontoptions="bold">
                                          </svg> &nbsp;</td>
                                              <td align="right"><strong>Brand</strong></td>
                                              <td><?php echo $row["brand"]; ?></td>
                                            </tr>
                                            <tr>
                                              <td align="right"><strong>Model</strong></td>
                                              <td><?php echo $row["model"]; ?></td>
                                            </tr>
                                            <tr>
                                              <td align="right"><strong>Store Area</strong></td>
                                              <td><?php echo $row["description"]; ?></td>
                                            </tr>
                                            <tr>
                                              <td align="right"><strong>Selling Price</strong></td>
                                              <td><input type="text" name="selling_price" id="selling_price" value="<?php echo $row["selling_price"]; ?>"></td>
                                            </tr>
                                            <tr>
                                              <td align="right"><strong>Min Price</strong></td>
                                              <td><input type="text" name="min_price" id="min_price" value="<?php echo $row["min_price"]; ?>"></td>
                                            </tr>
                                            <tr>
                                              <td align="right"><strong>Stock Available</strong></td>
                                              <td><input type="text" name="stock" id="stock" value="<?php echo $row['stock'];?>" ></td>
                                            </tr>
                                            <tr>
                                              <td>&nbsp;</td>
                                              <td><input type="submit" name="btnUpdateItem" id="btnUpdateItem" value="Update Stock"></td>
                                            </tr>
                                          </table>
                                      </form></td>
                                    </tr>
                                </table>
                                <?php
                                 }
                            }
                            ?>        


                            
                            
                            <?php
                            if(isset($_POST['btnUpdateItem'])){
                                updateStockData();
                            }
                            
                            
                            ?>
                        </div>


                        <div class="row">
                            
                               <table id="example" class="display" cellspacing="0" width="100%" border="1">
                                <thead>
                                    <tr>
                                        <th width="4%">ID</th>
                                        <th width="15%">category</th>
                                        <th width="10%">brand</th>
                                        <th width="11%">model</th>
                                        <th width="21%">store_area</th>
                                        <th width="21%">selling_price</th>
                                        <th width="35%">min_price</th>
                                        <th width="35%">available Stock</th>
                                        <th width="4%"></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>category</th>
                                        <th>brand</th>
                                        <th>model</th>
                                        <th>store_area</th>
                                        <th>selling_price</th>
                                        <th>min_price</th>
                                        <th>available Stock</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $result2 = getAllItem();
                                    if (mysqli_num_rows($result2) > 0) {
                                        // output data of each row
                                        while ($row = mysqli_fetch_assoc($result2)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id'];?></td>
                                                <td><?php echo $row['category'];?></td>
                                                <td><?php echo $row['brand'];?></td>
                                                <td><?php echo $row['model'];?></td>
                                                <td><?php echo $row['description'];?></td>
                                                <td><?php echo $row['selling_price'];?></td>
                                                <td><?php echo $row['min_price'];?></td>
                                                <td><?php echo $row['stock'];?></td>
                                                <td><a href="stockUpdate.php?itemID=<?php echo $row['id']; ?>">update</a></td>
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
        <!--js -->
        <link rel="stylesheet" href="css/vroom.css">
        <script type="text/javascript" src="js/vroom.js"></script>
        <script type="text/javascript" src="js/TweenLite.min.js"></script>
        <script type="text/javascript" src="js/CSSPlugin.min.js"></script>
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>
