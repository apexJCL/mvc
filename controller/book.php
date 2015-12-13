<?php

require_once 'model/books.php';

class BookController {

    function show(){
        $model = new Books();
        $books = $model->getBookList();
        ChromePhp::log($books);
        include 'view/libro/search_menu.php';
        include 'view/libro/libros.php';
    }

}