<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getItemByID($itemID) {

    // Create connection
    $conn = getDBConnection();

// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "
SELECT brand.description AS brand ,category.description AS category,item.id,
item.model,item.selling_price,item.min_price,item.description AS itmdescription,item.image_path,store_area.description,item.stock,item.bcn FROM item INNER JOIN category
 ON item.category_id =  category.id 
 INNER JOIN brand ON item.brand_id = brand.id
 INNER JOIN store_area ON item.store_area =  store_area.id
 WHERE item.id = '$itemID' ";

    // echo $sql;
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getAllItem() {
    // Create connection
    $conn = getDBConnection();

// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "
SELECT brand.description AS brand ,category.description AS category,item.id,
item.model,item.selling_price,item.min_price,item.description,item.image_path,item.itmstatus,
store_area.description,item.stock FROM item INNER JOIN category
 ON item.category_id =  category.id 
 INNER JOIN brand ON item.brand_id = brand.id
 INNER JOIN store_area ON item.store_area =  store_area.id WHERE item.itmstatus = 'ACT'
 ";

    // echo $sql;
    $result = mysqli_query($conn, $sql);
    return $result;
}


function getAll() {
    // Create connection
    $conn = getDBConnection();

// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "
SELECT brand.description AS brand ,category.description AS category,item.id,
item.model,item.selling_price,item.min_price,item.description,item.image_path,item.itmstatus,
store_area.description,item.stock FROM item INNER JOIN category
 ON item.category_id =  category.id 
 INNER JOIN brand ON item.brand_id = brand.id
 INNER JOIN store_area ON item.store_area =  store_area.id 
 ";

    // echo $sql;
    $result = mysqli_query($conn, $sql);
    return $result;
}

function updateStockData() {
    $conn = getDBConnection();

// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = " UPDATE item SET selling_price = " . $_POST['selling_price'] . ", min_price = " . $_POST['min_price'] . " , stock = " . $_POST['stock'] . "  WHERE id = " . $_POST['itemID'] . " ";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

function itemSearchExplorer() {

    // Create connection
    $conn = getDBConnection();

// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = " SELECT brand.description AS brand ,category.description AS category,item.id,
item.model,item.selling_price,item.min_price,item.description,item.image_path,item.bcn,
store_area.description,item.stock FROM item INNER JOIN category
 ON item.category_id =  category.id 
 INNER JOIN brand ON item.brand_id = brand.id
 INNER JOIN store_area ON item.store_area =  store_area.id " . dynamicWhereBuilder();
// echo 'SQL :'. $sql;
    $result = mysqli_query($conn, $sql);
    return $result;
}

function itemBCNSearchExplorer() {

    // Create connection
    $conn = getDBConnection();

// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = " SELECT brand.description AS brand ,category.description AS category,item.id,
item.model,item.selling_price,item.min_price,item.description,item.image_path,item.bcn,
store_area.description,item.stock FROM item INNER JOIN category
 ON item.category_id =  category.id 
 INNER JOIN brand ON item.brand_id = brand.id
 INNER JOIN store_area ON item.store_area =  store_area.id WHERE item.bcn = '".$_POST['bcn']."' AND item.itmstatus = 'ACT' ";
// echo 'SQL :'. $sql;
    $result = mysqli_query($conn, $sql);
    return $result;
}

function dynamicWhereBuilder() {

    $sql = "";
    $x = 0;

    $category_id = $_POST['category_id'];
    $brand_id = $_POST['brand_id'];
    $store_area = $_POST['store_area'];
    $model = $_POST['model'];


    if ($_POST['model'] != "") {
        $sql = " item.model LIKE '%$model%' ";
        $x = 1;
    }

    if ($_POST['category_id'] != "") {
        if ($x == 1) {
            $sql = $sql . ' AND ';
        }
        $sql = $sql . " item.category_id = '$category_id' ";
        $x = 1;
    }


    if ($_POST['brand_id'] != "") {
        if ($x == 1) {
            $sql = $sql . ' AND ';
        }
        $sql = $sql . " item.brand_id = '$brand_id' ";
        $x = 1;
    }


    if ($_POST['store_area'] != "") {
        if ($x == 1) {
            $sql = $sql . ' AND ';
        }
        $sql = $sql . " item.store_area = '$store_area' ";
        $x = 1;
    }

    if ($sql != '') {
        $sql = " WHERE  item.itmstatus = 'ACT' AND " . $sql;
    }
    return $sql;
}

?>