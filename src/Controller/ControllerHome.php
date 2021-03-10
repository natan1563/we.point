<?php 

namespace Controller;

use Helpers\HtmlRenderTrait;
use interfaces\InterfaceRoutePost;
use Model\DataSystem;

class ControllerHome implements InterfaceRoutePost
{
    use HtmlRenderTrait;

    public function actionPost(string $route, string $action, string $destiny, array $params = []) {

        $endPoint = (isset($_SERVER['PATH_INFO'])) ? $_SERVER['PATH_INFO'] : $_SERVER['REQUEST_URI'];

        if ($endPoint !== $route)
            return;

        if(count($params) > 0)
            extract($params);
        
        $sql = new DataSystem();
        
        switch ($action) {
            
            case 'list':
                $return = $sql->listAll();
            break;

            case 'insertPoint':
                $return = $sql->insertPoint((int)$idUser);
            break;

            case 'update':
                $return = $sql->update((int)$idSchedule, (int)$idUser);
            break;

            case 'remove':
                $return = $sql->remove((int)$idSchedule, (int)$idUser);
            break;

            case 'exit':
                $return = $this->logout();
            default: 
                echo 'Metodo inexistente';
            break;

        }
         
        $this->redirectAfterProcessing($destiny, $action, $return);

    }

    private function redirectAfterProcessing(string $destiny, string $action, $actionValue) {   
        $_SESSION[$action] = $actionValue;
        header('Location: ' . $destiny);
        exit;
    }

    private function logout() {
        return session_destroy();
    }

    public function __destruct() {
        
        $endPoint = (isset($_SERVER['PATH_INFO'])) ? $_SERVER['PATH_INFO'] : $_SERVER['REQUEST_URI'];

        $routeExcept = [
            '/',
            '/login',
            '/register',
        ];

        if (!in_array($endPoint, $routeExcept) && 
            !isset($_SESSION['login']) && 
            !isset($_SESSION['id'])) {
                $_SESSION['error'] = 'Por favor realize o login';
                header('Location: /login');
                exit;
        } 
    }

}
