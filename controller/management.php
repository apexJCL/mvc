<?php

require_once 'model/management.php';

class ManagementController {

    public function showManagement(){
        $controller = new Management();
        switch($_GET['type']){
            case 'autors':
                break;
            case 'books':
                $rows = $controller->getBooksData();
                include 'view/libro/search_menu.php';
                include 'view/management/books.php';
                break;
        }
    }

}