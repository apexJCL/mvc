<?php

require_once 'controller/management.php';

class EditController {

    public function showEditScreen(){
        $conn = new Management();
        switch($_GET['type']){
            case 'book':
                ChromePhp::log('Gathering book data...');
                $bookdata = $conn->getBookData($_GET['bid']);
                $authors = $conn->getAutorsData();
                $editorials = $conn->getEditorials();
                include 'view/management/edit.php';
                break;
        }
    }

}