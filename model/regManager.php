<?php

require_once 'dbconn.php';

class RegManager{

    public function register($username, $city, $sex, $mail, $pass, $ver_pass){
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
            return 'badmail';
        else if($pass != $ver_pass){
            return 'passdontmatch';
        }
        else if(sizeof($username) < 1)
            return 'nameerror';
        else {
            $conn = new DatabaseConnection();
            $username = $conn->quoteConcat($username);
            $city = $conn->quoteConcat($city);
            $sex = $conn->quoteConcat($sex);
            $mail = $conn->quoteConcat($mail);
            $pass = $conn->quote($pass);
            $sentence = 'SELECT registro(' . $username . $city . $sex . $mail . $pass . ")";
            $conn->singleton($sentence);
            return 'good';
        }
    }

}