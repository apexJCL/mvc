<?php

require_once 'dbconn.php';

class LogManager {

    function login($mail, $pass){
        $conn = new DatabaseConnection();
        $mail = "'".$mail."',";
        $pass = "'".$pass."'";
        $ans = $conn->check_login('SELECT check_login('.$mail.$pass.')');
        if($ans){
            $_SESSION['user'] = $mail;
        }
        return $ans;
    }

}