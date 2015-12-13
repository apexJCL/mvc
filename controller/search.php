<?php

require_once 'model/search.php';

class SearchController{

    public function getAutorSearchResults(){
        $search = new Search();
        $results = $search->searchAutor($_POST['searchstring']);
        include 'view/autores/search_menu.php';
        include 'view/autores/autores.php';
    }

    public function getBookSearchResults(){
        $search = new Search();
        $books = $search->searchBook($_POST['searchstring']);
        include 'view/libro/search_menu.php';
        include 'view/libro/libros.php';
    }

}