<?php

require_once 'controller/autor.php';
require_once 'controller/login.php';
require_once 'controller/register.php';

class IndexController {

    function showStart(){
        $this->loadTemplate();
        include 'view/welcome.php';
    }

    function showAutors(){
        $this->loadTemplate();
        $controller = new AutorController();
        $controller->show();
    }

    public function showLoginScreen(){
        $this->loadTemplate();
        $controller = new LoginController();
        $controller->showLoginScreen('');
    }

    public function checkLogin(){
        $controller = new LoginController();
        if($controller->checkLogin()) {
            $_SESSION['user'] = $_SESSION['mail'];
            $this->showStart();
        }
        else
            $controller->showLoginScreen('error');
    }

    public function showRegister(){
        $this->loadTemplate();
        $controller = new RegisterController();
        $controller->showRegister();
    }

    private function loadTemplate(){
        include "view/default/header.php"; // Show the default Page Header
        include "view/default/menu.php"; // Show the menu
    }
}