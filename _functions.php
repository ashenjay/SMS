<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
getDBConnection();

function getDBConnection() {
    /**/
    $servername = "db";
    $username = "root";
    $password = "LKJlkj123@@";
    $db = "aspms_db";



    /* //PEEK
      $servername = "localhost";
      $username = "smsenter_root";
      $password = "123@com";
      $db = "smsenter_aspms_db";
     */

// Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        return $conn;
    }
}

function doLogin() {
    $conn = getDBConnection();


    //login hard-corded
    if ($_POST['username'] == 'admin' && $_POST['password'] == 'a') {
        $_SESSION['islog'] = true;
        $_SESSION['username'] = "admin";
        $_SESSION['role'] = "ADM";
        return true;
    } else if ($_POST['username'] == 'emp' && $_POST['password'] == 'a') {
        $_SESSION['islog'] = true;
        $_SESSION['username'] = "emp";
        $_SESSION['role'] = "EMP";
        return true;
    }
    return false;



    /*
      $sql = "SELECT * FROM USERS WHERE username = '".$_POST['username']."' AND password = PASSWORD('".$_POST['password']."')";
      echo 'sql:'.$sql;
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while ($row = mysqli_fetch_assoc($result)) {
      echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
      }
      } else {
      echo "0 results";
      }

      mysqli_close($conn);

     */
}

function addItem($file_name) {
    //insert into table
    $conn = getDBConnection();

    //get next barcode number
   $bcn =  getNextBarcodeNumber($conn);

    $sql = " INSERT INTO item
            (category_id,
             brand_id,
             model,
             selling_price,
             min_price,
             description,
             image_path,
             store_area,
			 stock,
             bcn)
VALUES ('" . $_POST['category_id'] . "',
        '" . $_POST['brand_id'] . "',
        '" . $_POST['model'] . "',
        '" . $_POST['selling_price'] . "',
        '" . $_POST['min_price'] . "',
        '" . $_POST['description'] . "',
        '$file_name',
        '" . $_POST['store_area'] . "', 
        '" . $_POST['qty'] . "',
		'" . $bcn . "'); ";

    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        echo "<p class=\"bg-success\">New record created successfully " . $last_id . "</p>";
    } else {
        echo "<p class=\"bg-danger\">Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }

    mysqli_close($conn);

    return $last_id;
}

function getNextBarcodeNumber($conn) {
    $barcode = "";
    $sql = "SELECT * FROM barcode WHERE status = 'ACT' ORDER BY id ASC LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
//            echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
            $id = $row["id"];
            $barcode = $row["bcn"];
            $sql_update = " UPDATE barcode SET status = 'DAC' WHERE id = $id ";
            mysqli_query($conn, $sql_update);
        }
    } else {
        echo "0 results";
    }
    return $barcode;
}

?>
