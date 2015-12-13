<?php

require_once 'model/books.php';

class BookController {

    function showBooks(){
        $model = new Books();
        $books = $model->getBookList();
        include 'view/libro/search_menu.php';
        include 'view/libro/libros.php';
    }

    function showBook(){
        $model = new Books();
        $data = $model->getBookData();
        include 'view/libro/libro.php';
    }

}