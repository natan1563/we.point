<?php 

namespace Controller;

use Helpers\HtmlRenderTrait;
use Model\Login;

class ControllerLogin extends Login
{
    use HtmlRenderTrait;

    public function autheticable(): bool {
       
        $routes = [
            '/',
            '/login'
        ];
        
        $endPoint = (isset($_SERVER['PATH_INFO'])) ? $_SERVER['PATH_INFO'] : $_SERVER['REQUEST_URI'];

        
        if (!in_array($endPoint, $routes) &&
            !isset($_POST['email']) && 
            !isset($_POST['pass'])
            )
            return false;
        
        $this->setEmail($_POST['email']);

        $login = $this->userVerify();
        $pass  = $this->passVerify($_POST['pass']);

        if ($login !== true || $pass !== true) {
            $_SESSION['error'] = 'Login ou senha incorretos';
            header('Location: /login');
            exit;
        }
        
        $_SESSION['id']    = $this->getId();
        $_SESSION['name']  = $this->getName();
        $_SESSION['photo'] = $this->getProfilePicture();
        $_SESSION['login'] = true;
        
        header('Location: /list-data');
        return true;
    }

   

}
