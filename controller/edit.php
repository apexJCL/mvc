<?php

require_once 'model/management.php';

class EditController {

    public function showEditScreen(){
        $model = new Management();
        switch($_GET['type']){
            case 'book':
                if($_GET['subaction'] == 'update'){
                    $bookdata = $model->getBookData($_GET['bid']);
                }
                $authors = $model->getAutorsData();
                $editorials = $model->getEditorials();
                $genres = $model->getGenres();
                include 'view/management/edit.php';
                //Cleaning
                unset($bookdata);
                unset($authors);
                unset($editorials);
                unset($genres);
                break;
            case 'author':
                if($_GET['subaction'] == 'update'){
                    $authordata = $model->getAutorData($_GET['aid']);
                }
                include 'view/management/edit.php';
                break;
            case 'editorial':
                if($_GET['subaction'] == 'update')
                    $editorialdata = $model->getEditorialData($_GET['eid']);
                include 'view/management/edit.php';
                break;
            case 'genre':
                if($_GET['subaction'] == 'update')
                    $genredata = $model->getGenreData($_GET['gid']);
                include 'view/management/edit.php';
                break;
            case 'reader':
                if($_GET['subaction'] == 'update')
                    $userdata = $model->getUserData($_GET['uid']);
                include 'view/management/edit.php';
                break;
        }
    }

    /**
     * This method manages the update management, where it is update, delete or create a new book/author/editorial/genre
     */
    public function update(){
        $model = new Management();
        switch($_GET['subaction']){
            case 'add':
                $model->add();
                break;
            case 'update':
                $model->update();
                break;
            case 'delete':
                $model->delete();
                break;
        }
        switch($_GET['type']){ // This is only for redirect purposes
            case 'book':
                header('Location: index.php?action=manage&type=books');
                break;
            case 'author':
                header('Location: index.php?action=manage&type=authors');
                break;
            case 'editorial':
                header('Location: index.php?action=manage&type=editorials');
                break;
            case 'genre':
                header('Location: index.php?action=manage&type=genres');
                break;
            case 'reader':
                header('Location: index.php?action=manage&type=readers');
                break;
        }
    }

}