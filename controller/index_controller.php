<?php

require_once 'controller/autor.php';
require_once 'controller/login.php';

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
            ChromePhp::log("Setting mail");
            $_SESSION['user'] = $_SESSION['mail'];
            ChromePhp::log("Done!");
            $this->showStart();
        }
        else
            $controller->showLoginScreen('error');
    }

    private function loadTemplate(){
        include "view/default/header.php"; // Show the default Page Header
        include "view/default/menu.php"; // Show the menu
    }
}