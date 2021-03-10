<?php

use Controller\ControllerChangeImage;

require_once(__DIR__ . '/../vendor/autoload.php');

$test = new ControllerChangeImage();

if (isset($_POST['btnAtt'])) {
    $test->uploadProfilePicture();
}