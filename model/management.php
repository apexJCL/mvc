<?php

require_once 'dbconn.php';

class Management {

    function getBooksData(){
        $conn = new DatabaseConnection();
        return $conn->query('SELECT * FROM booksData');
    }

    function getAutorsData(){
        $conn = new DatabaseConnection();
        return $conn->query('SELECT * FROM autor');
    }

    public function getEditorials(){
        $conn = new DatabaseConnection();
        return $conn->query('CALL getEditorialsData()');
    }

    function getBookData($bookid){
        $conn = new DatabaseConnection();
        return $conn->query('SELECT * FROM booksData WHERE id_libro = '.$bookid);
    }

    function getAutorData($autorid){
        $conn = new DatabaseConnection();
        return $conn->query('SELECT * FROM autor WHERE id_autor = '.$autorid);
    }

    public function update() {
        switch($_GET['type']){
            case 'book':

                break;
        }
    }

}