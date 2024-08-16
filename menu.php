<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ($_SESSION['role'] == 'Admin') {
    include './menu-admin.php';
} else if ($_SESSION['role'] == 'Employee') {
    include './menu-employee.php';
}
?>