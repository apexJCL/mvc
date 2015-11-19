<?php

require_once 'dbconn.php';

class RegManager{

    public function register($username, $city, $sex, $mail, $pass){
        $conn = new DatabaseConnection();
        $username = $conn->quoteConcat($username);
        $city = $conn->quoteConcat($city);
        $sex = $conn->quoteConcat($sex);
        $mail = $conn->quoteConcat($mail);
        $pass = $conn->quote($pass);
        $sentence = 'SELECT registro('.$username.$city.$sex.$mail.$pass.")";
        ChromePhp::log("Sentence: ".$sentence);
        return $conn->singleton($sentence);
    }

}