<?php

use Controller\ControllerHome;
use Model\Routes;

require_once(__DIR__ . '/../vendor/autoload.php');

$system = new ControllerHome();

$system->htmlRender(
    Routes::get(
        '/home',
        'system/list-points.php',
        '/template/header-template.php',
        '/template/footer-template.php',
        [
            'title' => 'Check-Points'
        ]
    )
);

$system->htmlRender(
    Routes::get(
        '/change-profile',
        'system/form-change-profile.php',
        '/template/header-template.php',
        'template/toSystem/profile/footer-profile.php',
        [
            'title' => 'Alterar Foto de perfil'
        ]
    )
);


