<?php

require_once 'model/logManager.php';

class LoginController {

    function showLoginScreen($status){
        if($status != '')
            $_GET['status'] = $status;
        include 'view/login.php';
    }

    function checkLogin(){
        $logman = new LogManager();
        return $logman->login($_POST['mail'], $_POST['pass']);
    }

    function closeSession(){
        $logman = new LogManager();
        $logman->logout();
    }

}