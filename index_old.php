<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <style type="text/css">
            #wapperDiv {
                width: 50%;
                margin-right: auto;
                margin-left: auto;
                margin-top: 150px;
            }

            body {
                background-image:url(images/bg-login.jpg);
                background-repeat: no-repeat;
                background-position: 0 0;
                background-size: cover;
            }
        </style>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>

    </head>
    <body>



        <div id="wapperDiv">


            <nav class="navbar navbar-default" style="text-align: center">
                <h2>SMS Enterprises</h2>
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"></a>
                    </div>


                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <form id="signin" class="navbar-form navbar-right" role="form" action="index.php" method="post">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="email" type="text" class="form-control" name="username" value="" placeholder="Username">                                        
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="password" type="password" class="form-control" name="password" value="" placeholder="Password">                                        
                            </div>

                            <button type="submit" class="btn btn-primary" name="btnSubmit">Login</button>
                        </form>

                    </div>
                </div>
                <?php
                if (isset($_POST['btnSubmit'])) {

                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    // Create connection
                    include './_functions.php';
                    $conn = getDBConnection();
// Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    $sql = "SELECT * FROM users WHERE username = '$username' AND PASSWORD = PASSWORD('$password')";

                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            $_SESSION['userid'] = $row["id"];
                            $_SESSION['username'] = $row["username"];
                            $_SESSION['role'] = $row["role"];
                            header('Location:home.php');
                        }
                    } else {
                        echo "Invalid username or password";
                    }

                    mysqli_close($conn);
                }
                ?>
            </nav>
        </div> <!-- end  wapperDiv-->




    </body>
</html>
