<?php

require_once 'controller/autor.php';
require_once 'controller/login.php';
require_once 'controller/search.php';

if(!isset($_SESSION['username']))
    require_once 'controller/register.php';
else{
    require_once 'controller/profile.php';
}

class IndexController {

    function showStart(){
        $this->loadTemplate();
        include 'view/welcome.php';
    }

    function showAutor(){
        $this->showAutors();
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

    public function showProfile(){
        $this->loadTemplate();
        $controller = new ProfileController();
        $controller->showProfile();
    }

    public function checkLogin(){
        $controller = new LoginController();
        if($controller->checkLogin())
            $this->showStart();
        else {
            $this->loadTemplate();
            $controller->showLoginScreen('error');
        }
    }

    public function search(){
        if(isset($_POST['searchstring'])){
            $this->loadTemplate();
            $controller = new SearchController();
            $controller->getSearchResults();
        }
    }

    public function register(){
        $controller = new RegisterController();
        if($controller->RegisterUser())
            $this->showLoginScreen();
        else
            $this->showStart();
    }

    public function showRegister(){
        $controller = new RegisterController();
        $this->loadTemplate();
        $controller->showRegisterScreen();
    }

    public function logout(){
        session_destroy();
        header('Location: index.php');
    }

    private function loadTemplate(){
        include "view/default/header.php"; // Show the default Page Header
        include "view/default/menu.php"; // Show the menu
    }
}