<?php

require_once 'controller/autor.php';
require_once 'controller/login.php';

class IndexController {

    function showStart(){
        include 'view/welcome.php';
    }

    function showAutors(){
        $controller = new AutorController();
        $controller->show();
    }

    public function showLoginScreen(){
        $controller = new LoginController();
        $controller->showLoginScreen();
    }

    public function checkLogin(){
        $controller = new LoginController();
        $valid = $controller->checkLogin();
    }
}