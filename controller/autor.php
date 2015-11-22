<?php

require_once 'model/autores.php';

class AutorController {

    function show(){
        $autores = new Autores();
        $lista_autores = $autores->getAutores();
        include "view/autores/search_menu.php";
        include 'view/autores/autores.php';
    }

}