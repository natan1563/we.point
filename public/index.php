<?php

use Controller\ControllerRegister;
session_start();

if (isset($_SESSION['msg'])) { 
    echo "<script>alert('". $_SESSION['msg'] ."');</script>";
    unset($_SESSION['msg']);
}

$pathRoutes = __DIR__    . '/../routes/';
require_once( __DIR__    . '/../vendor/autoload.php');
require_once($pathRoutes . 'routes-access.php');
require_once($pathRoutes . 'routes-post-system.php');
require_once($pathRoutes . 'routes-lobby.php');
require_once($pathRoutes . 'routes-system.php');


