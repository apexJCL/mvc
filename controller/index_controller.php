<?php

require_once 'controller/autor.php';
require_once 'controller/login.php';

class IndexController {

    function showStart(){
        include 'view/welcome.php';
        ChromePhp::log(session_status());
        ChromePhp::log('El chido se la come');
    }

    function showAutors(){
        $controller = new AutorController();
        $controller->show();
    }

    public function showLoginScreen(){
        $controller = new LoginController();
        $controller->showLoginScreen('');
    }

    public function checkLogin(){
        $controller = new LoginController();
        if($controller->checkLogin()) {
            session_start();
            $this->showStart();
        }
        else
            $controller->showLoginScreen('error');
    }
}