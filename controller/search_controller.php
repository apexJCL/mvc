<?php

require_once 'model/search.php';

class SearchController{

    public function getSearchResults(){
        $search = new Search();
        $results = $search->searchAutor($_POST['searchstring']);
        include 'view/autores/search_menu.php';
        include 'view/autores/autores.php';
    }

}