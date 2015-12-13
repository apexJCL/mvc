<?php

require_once 'controller/autor.php';
require_once 'controller/login.php';
require_once 'controller/search.php';
require_once 'controller/book.php';

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


    public function showBooks(){
        $this->loadTemplate();
        $controller = new BookController();
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

    public function search($what){
        if(isset($_POST['searchstring'])){
            $this->loadTemplate();
            ChromePhp::log($what);
            $controller = new SearchController();
            switch($what){
                case 'autor':
                    $controller->getAutorSearchResults();
                    break;
                case 'book':
                    $controller->getBookSearchResults();
                    break;
            }
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
        $controller = new LoginController();
        $controller->closeSession();
        session_destroy();
        header('Location: index.php');
    }

    private function loadTemplate(){
        include "view/default/header.php"; // Show the default Page Header
        include "view/default/menu.php"; // Show the menu
    }
}