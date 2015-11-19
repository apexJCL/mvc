<?php

require_once 'model/autores.php';

class AutorController {

    function show(){
        $autores = new Autores();
        $lista_autores = $autores->getAutores();
        include 'view/autores.php';
    }

}