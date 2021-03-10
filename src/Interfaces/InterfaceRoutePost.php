<?php 

namespace interfaces;

interface InterfaceRoutePost 
{
    public function actionPost(string $route, string $action, string $destiny, array $params);
}