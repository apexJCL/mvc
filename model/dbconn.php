<?php
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

    /**
     * Calls a query and returns the object, also logs to ChromePHP logger
     *
     * @param $sentence
     * @return mixed
     */
    function raw($sentence){
        $this->openConn();
        $result = $this->conn->query($sentence);
        ChromePhp::log("Sentence: ".$sentence);
        return $result;
    }

    function quote($var){
        return  "'".$var."'";
    }

    function quoteConcat($var){
        return $this->quote($var).',';
    }

    function query($sentence){
        $this->openConn();
        $result = $this->conn->query($sentence)->fetchAll();
        $this->closeConn();
        return $result;
    }

    function singleton($sentence){
        $res = $this->openConn()->query($sentence)->fetchColumn(0);
        $this->closeConn();
        return $res;
    }
}