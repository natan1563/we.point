<?php

use Controller\ControllerLogin;
use Controller\ControllerRegister;

require_once(__DIR__ . '/../vendor/autoload.php');

$lobbyRoutes = [
    '/',
    '/login',
    '/register'
];

if (in_array($_SERVER['REQUEST_URI'], $lobbyRoutes) && isset($_SESSION['login'])) {
    header('Location: /home');
    $_SESSION['msg'] = 'Ops! Parece que você já está logado';
}

// Controla o login

$routes = [
    '/',
    '/login',
];

$endPoint = (isset($_SERVER['PATH_INFO']))? 
                   $_SERVER['PATH_INFO']  : 
                   $_SERVER['REQUEST_URI'];

if (in_array($endPoint, $routes) && isset($_POST['email']) && 
    isset($_POST['pass'])){

        $post = new ControllerLogin();
        $post->autheticable($_POST['email'], $_POST['pass']);

    }

if(isset($_POST['btnCad']) && $endPoint === '/register'){

    $register = new ControllerRegister();
    $register->register();
    
}
