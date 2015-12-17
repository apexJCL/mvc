<?php

require_once 'dbconn.php';

class Autores{

    function getAutores(){
        $conn = new DatabaseConnection();
        return $conn->query('CALL verAutores()');
    }

    function getAutor($idAutor){
        $conn = new DatabaseConnection();
        $idAutor = $conn->quote($idAutor);
        return $conn->query('CALL datosAutor('.$idAutor.')');
    }

    public function getAutorBooks($autor_id){
        $conn = new DatabaseConnection();
        return $conn->query('CALL librosAutor('.$autor_id.')');
    }

}