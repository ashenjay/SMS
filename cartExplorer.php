<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include './_functions.php';
include './_itemService.php';
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

                $("#chequeDiv").hide();
               

                $("#c").click(function () {
                     
                    $("#chequeDiv").hide();
                });

                $("#q").click(function () {
                    $("#chequeDiv").show();
                });
            });

        </script>
        <script>

            function popupItemDetails(id) {
//            window.open("itemView.php");
                window.open("cartItemView.php?id=" + id, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=500,height=500");
            }




        </script>
        <script>



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
                                        <td ><h3>Item Cart Explorer</h3><hr></td>

                                    </tr>
                                </tbody>
                            </table>


                        </div>




                        <a href="cartEmplty.php">Empty Cart</a>
                        <hr>
                        <?php
                        if (!isset($_SESSION['cart_items'])) {
                            echo 'No Cart item found';
                        } else {
                            ?>

                            <form action="salePaymant.php" method="post">

                                <table width="100%">
                                    <tr><td width="50%" valign="top">

                                            <table width="100%" border="1" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td><strong>Name</strong></td>
                                                    <td><strong>Qty</strong></td>
                                                    <td><strong>Price</strong></td>
                                                    <td><strong>Total</strong></td>
                                                    <td>&nbsp;</td>
                                                </tr>

                                                <?php
                                                $itemArray = $_SESSION['cart_items'];
                                                $itemArraylength = count($itemArray);

                                                for ($x = 0; $x < $itemArraylength; $x++) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $itemArray[$x]["name"]; ?></td>
                                                        <td><?php echo $itemArray[$x]["qty"]; ?></td>
                                                        <td><?php echo $itemArray[$x]["price"]; ?></td>
                                                        <td><?php echo $itemArray[$x]["price"] * $itemArray[$x]["qty"]; ?></td>
                                                        <td><a href="cartItemRemove.php?id=<?php echo $x; ?>">remove</a></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>Subtotal</td>
                                                    <td><?php
                                                        echo $_SESSION['total_price'];
                                                        ?></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td></td>
                                                    <td>&nbsp;</td>
                                                </tr>

                                            </table>

                                        </td><td width="50%" valign="top"><table width="100%" border="0">
                                                <tr>
                                                  <td>Customer Name : 
                                                  <input type="text" name="customerName" id="customerName" required></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="radio" name="mode" id="c" value="CASH" checked>
                                                        Cash 
                                                        <input type="radio" name="mode" id="q" value="CHEQUE">
                                                        Cheque</td>
                                                </tr>
                                                <tr>
                                                    <td><div id="chequeDiv">Cheque Details
                                                            <table width="100%" border="0">
                                                                <tr>
                                                                    <td width="31%">Cheque No</td>
                                                                    <td width="69%"><input type="text" name="chequeNo" id="chequeNo"></td>
                                                                </tr>
                                                                <tr>
                                                                  <td>Realize Date</td>
                                                                  <td><input type="date" name="realizeDate" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Bank Branch </td>
                                                                    <td><input type="text" name="bankBranch" id="bankBranch"></td>
                                                                </tr>
                                                            </table>
                                                  </div></td>
                                                </tr>
                                            </table>
                                            <input type="submit" name="btnPayment" id="btnPayment" value="Proceed To Bill Payment">


                                        </td></tr>
                                </table>

                            </form>




                            <?php
                        }
                        ?>
                        <hr>


                        <div class="row">




                            <table width="100%" border="0">
                                <tr>
                                    <td width="50%" valign="top">

                                        <form name="form1" method="post" action="">
                                            <table width="100%" border="0">
                                                <tr>
                                                    <td width="50%" align="right"><strong>Category (Item Name)</strong></td>
                                                    <td width="50%"><select name="category_id" id="category_id">
                                                            <option value="">--select--</option>
                                                            <?php
                                                            // get category list
                                                            // Create connection
                                                            $conn = getDBConnection();
// Check connection
                                                            if (!$conn) {
                                                                die("Connection failed: " . mysqli_connect_error());
                                                            }
                                                            $sql = "SELECT * FROM category";
                                                            $result = mysqli_query($conn, $sql);

                                                            if (mysqli_num_rows($result) > 0) {
                                                                // output data of each row
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    ?>
                                                                    <option value="<?php echo $row["id"] ?>"><?php echo $row["description"] ?></option>
                                                                    <?php
                                                                }
                                                            } else {
                                                                echo "0 results";
                                                            }
                                                            ?>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><strong>Brand</strong></td>
                                                    <td><select name="brand_id" id="brand_id">
                                                            <option value="">--select--</option>
                                                            <?php
                                                            // get category list
// Check connection
                                                            if (!$conn) {
                                                                die("Connection failed: " . mysqli_connect_error());
                                                            }
                                                            $sql = "SELECT * FROM brand";
                                                            $result = mysqli_query($conn, $sql);

                                                            if (mysqli_num_rows($result) > 0) {
                                                                // output data of each row
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    ?>
                                                                    <option value="<?php echo $row["id"] ?>"><?php echo $row["description"] ?></option>
                                                                    <?php
                                                                }
                                                            } else {
                                                                echo "0 results";
                                                            }
                                                            ?>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><strong>Store Area</strong></td>
                                                    <td><select name="store_area" id="store_area">
                                                            <option value="">--select--</option>
                                                            <?php
                                                            // get category list
// Check connection
                                                            if (!$conn) {
                                                                die("Connection failed: " . mysqli_connect_error());
                                                            }
                                                            $sql = "SELECT * FROM store_area";
                                                            $result = mysqli_query($conn, $sql);

                                                            if (mysqli_num_rows($result) > 0) {
                                                                // output data of each row
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    ?>
                                                                    <option value="<?php echo $row["id"] ?>"><?php echo $row["description"] ?></option>
                                                                    <?php
                                                                }
                                                            } else {
                                                                echo "0 results";
                                                            }
                                                            ?>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><strong>Model</strong></td>
                                                    <td><input type="text" name="model" id="model"></td>
                                                </tr>
                                                <tr>
                                                    <td align="right">&nbsp;</td>
                                                    <td><input type="submit" name="btnSearchExplo" id="btnSearchExplo" value="Search"></td>
                                                </tr>
                                            </table>

                                        </form>
                                        
                                        <form method="post" action="">
                                        <table width="100%" border="0">
  <tr>
    <td width="50%">Search By Barcode </td>
    <td width="50%"><input type="text" name="bcn" id="bcn"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="btnBCNSearch" id="btnBCNSearch" value="Search"></td>
  </tr>
</table>
</form>




                                  </td>
                                    <td width="50%" valign="top">

                                        <?php
                                        if (isset($_GET['cartItemID'])) {
                                           // echo 'ready';


                                            $item_id = $_GET['cartItemID'];

                                            $result = getItemByID($item_id);
                                            if (mysqli_num_rows($result) > 0) {
                                                // output data of each row
						$index = 0;
                                                while ($row = mysqli_fetch_assoc($result)) {
//                                                    echo "brand: ";
//                                                    echo $row["brand"] . " - model: " . $row["model"] . "<br>";
                                                    ?>
                                                    <form action="cartAdd.php" method="post">
                                                        <table width="100%" border="0">
                                                            <tr>
                                                                <td width="50%" align="right"><strong>Category (Item Name)</strong></td>
                                                                <td width="50%"><?php echo $row["category"]; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><strong>Brand</strong></td>
                                                                <td><?php echo $row["brand"]; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><strong>Model</strong></td>
                                                                <td><?php echo $row["model"]; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><strong>Selling Price</strong></td>
                                                                <td><?php echo $row["selling_price"]; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><strong>Min Price</strong></td>
                                                                <td><?php echo $row["min_price"]; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><strong>Store Area</strong></td>
                                                                <td><?php echo $row["description"]; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><strong>Description </strong></td>
                                                                <td><?php echo $row["itmdescription"]; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><svg class="barcode"
                                                 jsbarcode-format="ean13"
                                                 jsbarcode-value="<?php echo $row["bcn"]; ?>"
                                                 jsbarcode-textmargin="0"
                                                 jsbarcode-fontoptions="bold">
                                          </svg></td>
                                                                <td><img src="item_images/<?php echo $row["image_path"]; ?>" width="150" height="150" />&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">


                                                                    <table width="50%" border="0" align="center">
                                                                        <tr><input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" /> <input type="hidden" name="itemID" value="<?php echo $row["id"]; ?>" />
                                                                        <td width="50%" align="right">Qty</td>
                                                                        <td width="50%"><input type="number" required name="qty" max="<?php echo $row["stock"]; ?>" placeholder="Available <?php echo $row["stock"]; ?>" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right">Model Name </td>
                                                                <td><input type="text" name="itemName" value="<?php echo $row["model"]; ?>" readonly/></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right">Price</td>
                                                                <td><input type="number" name="price" value="<?php echo $row["selling_price"]; ?>" min="<?php echo $row["min_price"]; ?>" placeholder="Min Value <?php echo $row["min_price"]; ?>"/></td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                                <td><input type="submit" value="Add To Bill "  /></td>
                                                            </tr>
                                                        </table>
                                                        <br>

                                                        </td>
                                                        </tr>
                                                        </table>
                                                    </form>


                                                    <?php
                                                    $index++;
                                                }
                                            } else {
                                                echo "0 results";
                                            }
                                        }
                                        ?>



                                    </td>
                                </tr>
                            </table>
                        </div>

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
                                    if (isset($_POST['btnSearchExplo'])) {
                                        $result2 = itemSearchExplorer();
                                    } if (isset($_POST['btnBCNSearch'])) {
                                        $result2 = itemBCNSearchExplorer();
                                    } else {
                                        $result2 = getAllItem();
                                    }

                                    if (mysqli_num_rows($result2) > 0) {
                                        // output data of each row
										$index = 0;
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
                                                    if ($row['stock'] > 0) {
                                                        ?>
                                                        <a href="cartExplorer.php?id=<?php echo $index; ?>&cartItemID=<?php echo $row['id']; ?>" >Add to bill</a>
                                                        <?php
                                                    } else {
                                                        echo '<span class="bg-danger">Out of stock</span>';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
											$index++;
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
