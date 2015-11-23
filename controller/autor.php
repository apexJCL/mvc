<?php

require_once 'model/autores.php';

class AutorController {

    function show(){
        include "view/autores/search_menu.php";
        if(isset($_GET['autor'])){

        }
        else {
            $autores = new Autores();
            $lista_autores = $autores->getAutores();
        }
        include 'view/autores/autores.php';
    }

}