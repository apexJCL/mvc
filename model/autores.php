<?php

require_once 'dbconn.php';

class Autores{

    function getAutores(){
        $conn = new DatabaseConnection();
        return $conn->query('SELECT * FROM autor');
    }

    function getAutor($idAutor){
        $conn = new DatabaseConnection();
        $idAutor = $conn->quote($idAutor);
        return $conn->query('CALL datosAutor('.$idAutor.')');
    }

    public function getAutorBooks($autor_id){
        $conn = new DatabaseConnection();
        ChromePhp::log("Sentence: ".'CALL librosAutor('.$autor_id.')');
        return $conn->query('CALL librosAutor('.$autor_id.')');
    }

}