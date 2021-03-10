<?php

use Controller\ControllerLogin;
use Model\Routes;

require_once(__DIR__ . '/../vendor/autoload.php');

$lobby = new ControllerLogin();

$lobby->htmlRender(
    Routes::get(
        '/', 
        'lobby/form-login.php',
        '/template/header-template.php',
        '/template/footer-template.php',
        [
            'title' => 'Login'
        ]
    )
);

$lobby->htmlRender(
    Routes::get(
        '/login', 
        'lobby/form-login.php',
        '/template/header-template.php',
        '/template/footer-template.php',
        [
            'title' => 'Login'
        ]
    )
);

$lobby->htmlRender(
    Routes::get(
        '/register', 
        'lobby/form-register.php',
        '/template/header-template.php',
        '/template/footer-template.php',
        [
            'title' => 'Cadastro'
        ]
    )
);
