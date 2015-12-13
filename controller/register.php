<?php

require_once 'model/regManager.php';

class RegisterController{

    public function showRegisterScreen($mode){
        include 'view/registro.php';
    }

    public function RegisterUser(){
        $regman = new RegManager();
        return $regman->register($_POST['username'], $_POST['city'], $_POST['sex'], $_POST['email'], $_POST['password'], $_POST['password_ver']);
    }

}