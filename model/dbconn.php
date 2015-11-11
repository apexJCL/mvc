<?php

include 'ChromePhp.php';

class DatabaseConnection {

    private $conn;
    private $user;
    private $pass;

    function __construct(){
        $this->conn = null;
        $this->user = 'lib_admin';
        $this->pass = '123';
    }

    private function openConn(){
        $this->conn = new PDO('mysql:host=localhost;dbname=libros', $this->user, $this->pass);
        return $this->conn;
    }

    private function closeConn(){
        $this->conn = null;
    }

    function query($sentence){
        $this->openConn();
        $result = $this->conn->query($sentence)->fetchAll();
        $this->closeConn();
        return $result;
    }

    function check_login($sentence){
        $res = $this->openConn()->query($sentence)->fetchColumn(0);
        $this->closeConn();
        return $res;
    }
}