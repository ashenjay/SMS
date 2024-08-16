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
	color: #003366;
	font-size: small;
}
        </style>
        
        
        <script src="js/JsBarcode.ean-upc.min.js" type="text/javascript"></script>
        
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
                    <div class="outter-wp" id="containerDiv">

                        <div class="row">
                            <table border="0" width='100%'>
                                <tbody>
                                    <tr>
                                        <td><h3><img src="images/icon/Engine-96.png" width="50" height="50" > Item Manager</h3><hr></td>
                                      
                                    </tr>
                                </tbody>
                            </table>


                        </div>

                        <div class="row">
                         
                            <table width="100%" border="0">
                                <tr>
                                    <td width="50%">

                                        <form name="form1" method="post" action="itemAdd.php" enctype="multipart/form-data">
                                            <table width="100%"  border="0">
                                                <tr>
                                                    <td width="24%" align="right"><strong>Category (Item Name)</strong></td>

                                                    <td width="26%">
                                                        <select name="category_id" id="category_id" required>
                                                            <option value="">--select--</option>
                                                            <?php
                                                            // get category list
                                                            include './_functions.php';
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
                                                    <td><select name="brand_id" id="brand_id" required>
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
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><strong>Model</strong></td>
                                                  <td><input type="text" name="model" id="model" required></td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><strong>Selling Price</strong></td>
                                                  <td><input type="text" name="selling_price" id="selling_price" required></td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><strong>Min Price</strong></td>
                                                  <td><input type="text" name="min_price" id="min_price" required></td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><strong>Store Area</strong></td>
                                                    <td><select name="store_area" id="store_area" required>
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
                                                            mysqli_close($conn);
                                                            ?>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><strong>Image</strong></td>
                                                  <td><input type="file" name="image" id="image" required></td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><strong>Description</strong></td>
                                                  <td><textarea name="description" id="description"></textarea></td>
                                                </tr>
                                                <tr>
                                                  <td align="right"><strong>Qty</strong></td>
                                                  <td><input name="qty" type="text" id="qty" value="0" required></td>
                                              </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><input type="submit" name="btnAddItem" id="btnAddItem" value="Add Item"></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </table>

                                        </form>



                                        <?php
//                                    if (isset($_FILES['image'])) {
//                                        $errors = array();
//                                        $file_name = $_FILES['image']['name'];
//                                        $file_size = $_FILES['image']['size'];
//                                        $file_tmp = $_FILES['image']['tmp_name'];
//                                        $file_type = $_FILES['image']['type'];
//                                        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
//
//                                        $expensions = array("jpeg", "jpg", "png");
//
//                                        if (in_array($file_ext, $expensions) === false) {
//                                            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
//                                        }
//
//                                        if ($file_size > 2097152) {
//                                            $errors[] = 'File size must be excately 2 MB';
//                                        }
//
//                                        if (empty($errors) == true) {
//                                            move_uploaded_file($file_tmp, "item_images/" . $file_name);
//                                            
//                                            
//                                            
//                                            //add data into item table
//                                            
//                                            echo 'Item name: ';$_FILES['item_name'];
//                                            
//                                            
//                                            echo "Success";
//                                        } else {
//                                            print_r($errors);
//                                        }
//                                    }



                                        if (isset($_POST['btnAddItem'])) {


                                            $errors = array();
                                            $file_name = $_FILES['image']['name'];
                                            $file_size = $_FILES['image']['size'];
                                            $file_tmp = $_FILES['image']['tmp_name'];
                                            $file_type = $_FILES['image']['type'];
                                            $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

                                            $expensions = array("jpeg", "jpg", "png");

                                            if (in_array($file_ext, $expensions) === false) {
                                                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                                            }

                                            if ($file_size > 2097152) {
                                                $errors[] = 'File size must be excately 2 MB';
                                            }
                                            if (empty($errors) == true) {
                                                move_uploaded_file($file_tmp, "item_images/" . $file_name);
                                                //add data into item table
//                                                echo "Success";
                                                $item_id = addItem($file_name);
//                                                $_SESSION['itemID'] = $item_id;
                                            } else {
                                                print_r($errors);
                                            }
                                        }
                                        ?>


                                    </td>
                                    <td width="50%" valign="top"> 


                                        <?php
                                         include './_itemService.php';
                                        if (isset($item_id)) {
                                            //search the item by ID 
//                                            echo "Last ID :" . $item_id;
                                           

                                            $result = getItemByID($item_id);
                                            if (mysqli_num_rows($result) > 0) {
                                                // output data of each row
                                                while ($row = mysqli_fetch_assoc($result)) {
//                                                    echo "brand: ";
//                                                    echo $row["brand"] . " - model: " . $row["model"] . "<br>";
                                                    ?>

                                                    <table width="100%" border="0">
                                                        <tr>
                                                            <td width="50%" align="right">Category (Item Name)</td>
                                                            <td width="50%"><?php echo $row["category"]; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right">Brand</td>
                                                            <td><?php echo $row["brand"]; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right">Model</td>
                                                            <td><?php echo $row["model"]; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right">Selling Price</td>
                                                            <td><?php echo $row["selling_price"]; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right">Min Price</td>
                                                            <td><?php echo $row["min_price"]; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right">Store Area</td>
                                                            <td><?php echo $row["description"]; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right">Description </td>
                                                            <td><?php echo $row["description"]; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td> <svg class="barcode"
                                                 jsbarcode-format="ean13"
                                                 jsbarcode-value="<?php echo $row["bcn"]; ?>"
                                                 jsbarcode-textmargin="0"
                                                 jsbarcode-fontoptions="bold">
                                          </svg> </td>
                                                            <td><img src="item_images/<?php echo $row["image_path"]; ?>" width="150" height="150" /></td>
                                                        </tr>
                                                    </table>

                                                    <?php
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
                                                <td><?php echo $row['selling_price'];?></td>
                                                <td><?php echo $row['description'];?></td>
                                                <td><a href="#" onclick="popupItemDetails(<?php echo $row['id']; ?>)"><i class="fa fa-eye" aria-hidden="true" ></i></a>
                                                    <a href="stockUpdate.php?itemID=<?php echo $row['id']; ?>">Stock Update</a></td>
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
        <!--js 
        <link rel="stylesheet" href="css/vroom.css">
        <script type="text/javascript" src="js/vroom.js"></script>
        <script type="text/javascript" src="js/TweenLite.min.js"></script>
        <script type="text/javascript" src="js/CSSPlugin.min.js"></script>
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
-->
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <script>
        
        function popupItemDetails(id){
//            window.open("itemView.php");
            window.open("itemView.php?id="+id, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=500,height=500");
        }
        
        </script>
        
        <style type="text/css">
            #containerDiv{
                margin-left: 20px;
            }
        </style>
        
    </body>
</html>
