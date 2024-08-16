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
                        <td><img src="item_images/<?php echo $row["image_path"]; ?>" width="150" height="150" /></td>
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
