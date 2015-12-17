<?php

require_once 'model/autores.php';

class AutorController {

    function show(){
        include "view/autores/search_menu.php";
        $autores = new Autores();
        if(isset($_GET['autor'])){
            $data = $autores->getAutor($_GET['autor']);
            include 'view/autores/autor.php';
            $books = $autores->getAutorBooks($_GET['autor']);
            include 'view/libro/lista_libros.php';
        }
        else {
            $results = $autores->getAutores();
            include 'view/autores/autores.php';
        }
    }

}