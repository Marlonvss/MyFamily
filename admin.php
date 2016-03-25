<?php

error_reporting(E_ERROR);
session_start();
if (isset($_GET['page'])) {
    $_SESSION['page'] = $_GET['page'];
}

if (isset($_SESSION['adm'])) {
    if (isset($_SESSION['page'])) {
        include_once './admin_' . $_SESSION['page'] . '.php';
    } else {
        include_once './admin_dashboard.php';
    }
} else {
    unset($_SESSION['page']);
    include_once './admin_login.php';
}
?>