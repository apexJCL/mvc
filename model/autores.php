<?php

require_once 'dbconn.php';

class Autores{

    function getAutores(){
        $conn = new DatabaseConnection();
        return $conn->query('SELECT * FROM autor');
    }

    function getAutor($nombre){
        $nombre = "'".$nombre."'";
        $conn = new DatabaseConnection();
        return $conn->query('SELECT * FROM autor WHERE nombre_autor = '.$nombre);
    }

}