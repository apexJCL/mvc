<?php

require_once 'dbconn.php';

class LogManager {

    function login($mail, $pass){
        $conn = new DatabaseConnection();
        $mail = "'".$mail."'";
        $pass = ",'".$pass."'";
        $ans = $conn->singleton('SELECT check_login('.$mail.$pass.')');
        if($ans){
            $_SESSION['username'] = $conn->raw('CALL nombreLector('.$mail.')')->fetchColumn(0);
            session_regenerate_id();
        }
        return $ans;
    }

}