<?php

require_once 'model/logManager.php';

class LoginController {

    function showLoginScreen(){
        include 'view/login.php';
    }

    function checkLogin(){
        $logman = new LogManager();
        $ans = $logman->login($_SESSION['mail'], $_SESSION['pass']);
        echo $ans;
    }

}