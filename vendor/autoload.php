<?php 

spl_autoload_register(function(string $className) {

    $rawPath = __DIR__ . "\\..\\src\\" . $className;
    $path = str_replace('\\', '/', $rawPath);
    $path .= '.php';
    
    if (file_exists($path)) {
        require_once($path);
    }
});