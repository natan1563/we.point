<?php

use Controller\ControllerHome;

require_once(__DIR__ . '/../vendor/autoload.php');

$post = new ControllerHome;

$post->actionPost(
    '/list-data', 
    'list', 
    '/home'
);

$post->actionPost(
    '/point-register',
    'insertPoint',
    '/list-data',
    [
        'idUser' => (isset($_POST['newPoint'])) ? (int)$_POST['newPoint'] : ''
    ]
);

$post->actionPost(
    '/update',
    'update',
    '/list-data',
    [
        'idSchedule' => (isset($_GET['id_point'])) ? (int)$_GET['id_point'] : '',
        'idUser'     => (isset($_GET['id_user']))  ? (int)$_GET['id_user']  : ''
    ]
);


$post->actionPost(
    '/delete',
    'remove',
    '/list-data',
    [
        'idSchedule' => (isset($_GET['id_point'])) ? (int)$_GET['id_point'] : '',
        'idUser'     => (isset($_GET['id_user']))  ? (int)$_GET['id_user']  : ''
    ]
);

$post->actionPost(
    '/logout',
    'exit',
    '/login'
);