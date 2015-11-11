<?php

require_once 'dbconn.php';

class LogManager {

    function login($mail, $pass){
        $conn = new DatabaseConnection();
        $mail = "'".$mail."',";
        $pass = "'".$pass."'";
        $ans = $conn->functions('SELECT check_login('.$mail.$pass.')');
    }

}