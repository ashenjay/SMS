<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <script>

            function closeSelf() {
                // do something

                alert("conditions satisfied, submiting the form.");
                document.forms['certform'].submit();
                window.close();

            }


        </script>

        <script>
            window.onunload = refreshParent;
            function refreshParent() {
                window.opener.location.reload();
            }
        </script>


    </head>
    <body>
        <?php
        include './_functions.php';
        include './_itemService.php';

        //search the item by ID 
//                                            echo "Last ID :" . $item_id;

        $item_id = $_GET['id'];

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
                        <td><?php echo $row["itmdescription"]; ?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><img src="item_images/<?php echo $row["image_path"]; ?>" width="150" height="150" />&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2"><form  action="cartAdd.php" method="post" name="certform" id="certform">
                                <table width="50%" border="0" align="center">
                                    <tr><input type="hidden" name="id" value="<?php echo $index; ?>" />
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
                                        <td><input type="submit" value="Add To Bill "  onclick="closeSelf()"/></td>
                                    </tr>
                                </table>
                                <br>
                            </form></td>
                    </tr>
                </table>

                <?php
            }
        } else {
            echo "0 results";
        }
        ?>


    </body>
</html>
