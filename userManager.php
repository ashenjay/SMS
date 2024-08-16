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
                                        <td style="width: 80%"></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>

                        <div class="row">
                           <h4 class="titleStyle">Employee Registration</h4>
                                <form name="form1" method="post" action="">
                                    <span class="mandoField">*</span> fields are required | <strong><em>password will be same as the username, please change the password after user first login</em></strong>
<table width="50%" border="0" cellspacing="2" cellpadding="2">
                    <tr>
                                            <td width="34%" align="right"><strong>First Name</strong></td>
                                            <td width="2%"><span class="mandoField">*</span></td>
                                            <td width="64%"><input type="text" name="firstname" id="firstname"  class="form-control" required></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><strong>Last Name</strong></td>
                                            <td>&nbsp;</td>
                                            <td><input type="text" name="lastname" id="lastname"  class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><strong>Username</strong></td>
                                            <td><span class="mandoField">*</span></td>
                                            <td><input type="text" name="username" id="username"  class="form-control" required></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td><input type="submit" name="btnReg" value="Register" class="btn btn-warning"/>&nbsp;</td>
                                        </tr>
                                    </table>
                                </form>
                                
                                 <?php
                                if (isset($_POST['btnReg'])) {
                                    include './_functions.php';

                                    //validation 
                                      
                                        $conn = getDBConnection();
                                        // Check connection
                                        if (!$conn) {
                                            die("Connection failed: " . mysqli_connect_error());
                                        }

                                        $sql = " INSERT INTO users
            (`firstname`,
             `lastname`,
             `username`,
             `password`,
             `role`)
VALUES ('" . $_POST['firstname'] . "',
        '" . $_POST['lastname'] . "',
        '" . $_POST['username'] . "',
        PASSWORD('" . $_POST['username'] . "'),
        'Employee'); ";

                                        // echo $sql;
                                        if (mysqli_query($conn, $sql)) {
                                            ?>
                                            <div class="msgCenter">
                                                <span class="btn btn-success">Employee Registration successfully </span>
                                            </div><br>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="msgCenter">
                                                <span class="btn btn-danger">Duplicate or invalid entry found, please try again</span>
                                            </div><br>
                                            <?php
                                            echo "";
                                        }

                                        mysqli_close($conn);
                                    
                                }
                                ?>  
                                
                                
                                <hr>
                                
                                
                                 <?php
                include_once './_functions.php';
                $conn = getDBConnection();

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = " SELECT * FROM users ";
                $result = mysqli_query($conn, $sql);
				?>
                
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
  <tr>
    <td><strong>First Name</strong></td>
    <td><strong>Last Name</strong></td>
    <td><strong>Username</strong></td>
    <td><strong>Date Created</strong></td>
  
  
  </tr>
				
				
				<?php

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                       // echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
                        ?>
                      
  <tr class="active">
    <td><?php echo $row["firstname"] ?></td>
    <td><?php echo $row["lastname"] ?></td>
    <td><?php echo $row["username"] ?></td>
    <td><?php echo $row["datecreated"] ?></td>
    
  </tr>


                        <?php
                    }
					
					
					
					
                } else {
                    echo "0 results";
                }
				
				?>
                
                </table>
                
                <?php

                mysqli_close($conn);
                ?>

                            
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
