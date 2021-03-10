<?php 

namespace Model;

define("__VIEW__", __DIR__ . "/../../view/");

abstract class Routes
{

    public static function get(string $route, string $rawPathFile, string $rawTitle, string $rawFooter, array $params = []): array {
        $pathFile =  __VIEW__ .  $rawPathFile;
        $title    =  __VIEW__ .  $rawTitle;
        $footer   =  __VIEW__ .  $rawFooter;

        return [
            'route' => $route, 
            'path' => str_replace('\\', DIRECTORY_SEPARATOR, $pathFile),
            'params' => $params,
            'title' => $title,
            'footer' => $footer
        ];
    }
}