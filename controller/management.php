<?php

require_once 'model/management.php';

class ManagementController {

    public function showManagement(){
        $controller = new Management();
        switch($_GET['type']){
            case 'authors':
                $rows = $controller->getAutorsData();
                include 'view/management/authors.php';
                break;
            case 'books':
                $rows = $controller->getBooksData();
                include 'view/management/books.php';
                break;
            case 'editorials':
                $rows = $controller->getEditorialsData();
                include 'view/management/editorials.php';
                break;
            case 'genres':
                $rows = $controller->getGenres();
                include 'view/management/genres.php';
                break;
            case 'readers':
                $rows = $controller->getUsers();
                include 'view/management/users.php';
                break;
            case 'statistics':
                $data = $controller->getStatistics();
                include 'view/management/statistics.php';
                break;
        }
    }
}