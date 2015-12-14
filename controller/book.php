<?php

require_once 'model/books.php';
require_once 'controller/comments.php';


class BookController {

    function showBooks(){
        $model = new Books();
        $books = $model->getBookList();
        include 'view/libro/search_menu.php';
        include 'view/libro/libros.php';
    }

    function showBook(){
        $model = new Books();
        $comment_section = new CommentsController();
        $data = $model->getBookData();
        include 'view/libro/libro.php';
        $comment_section->showComments();
    }

}