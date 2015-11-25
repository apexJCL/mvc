<?php

require_once 'dbconn.php';

class Autores{

    function getAutores(){
        $conn = new DatabaseConnection();
        return $conn->query('SELECT * FROM autor');
    }

    function getAutor($idAutor){
        $idAutor = "'".$idAutor."'";
        $conn = new DatabaseConnection();
        return $conn->query('SELECT * FROM autor WHERE id_autor = '.$idAutor);
    }

}