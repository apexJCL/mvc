<?php

require_once 'model/autores.php';

class AutorController {

    function show(){
        include "view/autores/search_menu.php";
        $autores = new Autores();
        if(isset($_GET['autor'])){
            $data = $autores->getAutor($_GET['autor']);
            ChromePhp::log('Datos: '.$data);
            include 'view/autores/autor.php';
        }
        else {
            $lista_autores = $autores->getAutores();
            include 'view/autores/autores.php';
        }
    }

}