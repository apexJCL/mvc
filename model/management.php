<?php

require_once 'dbconn.php';

class Management {

    function getBooksData(){
        $conn = new DatabaseConnection();
        return $conn->query('SELECT * FROM booksData');
    }

    function getAutorsData(){
        $conn = new DatabaseConnection();
        return $conn->query('SELECT * FROM autor');
    }


    public function getEditorialData($eid){
        $conn = new DatabaseConnection();
        return $conn->query('SELECT * FROM editorial WHERE id_editorial ='.$eid);
    }

    public function getEditorialsData(){
        $conn = new DatabaseConnection();
        return $conn->query('SELECT * FROM editorial');
    }

    public function getEditorials(){
        $conn = new DatabaseConnection();
        return $conn->query('CALL getEditorialsData()');
    }

    public function getGenres(){
        $conn = new DatabaseConnection();
        return $conn->query('SELECT * FROM genero');
    }

    function getBookData($bookid){
        $conn = new DatabaseConnection();
        return $conn->query('SELECT * FROM booksData WHERE id_libro = '.$bookid);
    }

    function getAutorData($autorid){
        $conn = new DatabaseConnection();
        return $conn->query('SELECT * FROM autor WHERE id_autor = '.$autorid);
    }

    public function getUsers() {
        $conn = new DatabaseConnection();
        return $conn->query('CALL verUsuarios()');
    }


    public function getUserData($uid) {
        $conn = new DatabaseConnection();
        return $conn->query('SELECT * FROM lector WHERE id_lector ='.$uid);
    }


    public function getGenreData($gid) {
        $conn = new DatabaseConnection();
        return $conn->query('SELECT * FROM genero WHERE id_genero ='.$gid);
    }

    public function update() {
        $conn = new DatabaseConnection();
        switch($_GET['type']){
            case 'book':
                // Define the upload img directory
                $upload_dir = 'view/img/books/';
                $def_book_pic = 'view/img/icon-default-book.png';
                // If there's no picture selected
                if($_FILES['picture']['error'] == 4) {
                    if($_POST['def_pic'] == $def_book_pic) // If the picurl is the same as that of default picurl
                        $sentence = 'CALL updateLibro(' . $_SESSION['id_libro'] . ',' . $_POST['id_autor'] . ',' . $_POST['id_genero'] . ',' . $_POST['id_editorial'] . ',' . $conn->quote($_POST['titulo']) . ',' . $conn->quote($_POST['fecha_publicacion']) . ',' . $conn->quote($_POST['resumen']) . ',' . $conn->quote($def_book_pic) . ')';
                    else // Else, it means that it already has a default picture, so it keeps it
                        $sentence = 'CALL updateLibro(' . $_SESSION['id_libro'] . ',' . $_POST['id_autor'] . ',' . $_POST['id_genero'] . ',' . $_POST['id_editorial'] . ',' . $conn->quote($_POST['titulo']) . ',' . $conn->quote($_POST['fecha_publicacion']) . ',' . $conn->quote($_POST['resumen']) . ',' . $conn->quote($_POST['def_pic']) . ')';
                }
                else{
                    // Now we define the name of the file
                    $filename = $upload_dir . basename($_FILES['picture']['name']); // nombre del archivo
                    // If the name of the picture is different
                    if($filename != $_POST['def_pic']){ // Erase the stored picture
                        unlink($_POST['def_pic']);
                    }
                    move_uploaded_file($_FILES['picture']['tmp_name'], $filename);
                    $sentence = 'CALL updateLibro(' . $_SESSION['id_libro'] . ',' . $_POST['id_autor'] . ',' . $_POST['id_genero'] . ',' . $_POST['id_editorial'] . ',' . $conn->quote($_POST['titulo']) . ',' . $conn->quote($_POST['fecha_publicacion']) . ',' . $conn->quote($_POST['resumen']) . ',' . $conn->quote($filename) . ')';
                }
                $conn->query($sentence);
                break;
            case 'author':
                // Define the upload img directory
                $upload_dir = 'view/img/authors/';
                $def_user_pic = 'view/img/authors/icon-user-default.png';
                // If there's no picture selected
                if($_FILES['picture']['error'] == 4) {
                    if($_POST['def_pic'] == $def_user_pic) // If the picurl is the same as that of default picurl
                        $sentence = 'CALL updateAutor(' . $_SESSION['id_autor'] . ',' . $conn->quote($_POST['nombre_autor']) . ',' . $conn->quote($_POST['pais_autor']) . ',' . $conn->quote($_POST['seudonimo']) . ',' . $conn->quote($_POST['biografia']) . ',' . $conn->quote($def_user_pic) . ')';
                    else // Else, it means that it already has a default picture, so it keeps it
                        $sentence = 'CALL updateAutor(' . $_SESSION['id_autor'] . ',' . $conn->quote($_POST['nombre_autor']) . ',' . $conn->quote($_POST['pais_autor']) . ',' . $conn->quote($_POST['seudonimo']) . ',' . $conn->quote($_POST['biografia']) . ',' . $conn->quote($_POST['def_pic']) . ')';
                }
                else{
                    // Now we define the name of the file
                    $filename = $upload_dir . basename($_FILES['picture']['name']); // nombre del archivo
                    // If the name of the picture is different
                    if($filename != $_POST['def_pic']){ // Erase the stored picture
                        unlink($_POST['def_pic']);
                    }
                    move_uploaded_file($_FILES['picture']['tmp_name'], $filename);
                    $sentence = 'CALL updateAutor(' .  $_SESSION['id_autor'] . ',' . $conn->quote($_POST['nombre_autor']) . ',' . $conn->quote($_POST['pais_autor']) . ',' . $conn->quote($_POST['seudonimo']) . ',' . $conn->quote($_POST['biografia']) . ',' .  $conn->quote($filename) . ')';
                }
                ChromePhp::log($sentence);
                $conn->query($sentence);
                break;
            case 'editorial':
                $sentence = 'UPDATE editorial SET nombre_editorial ='.$conn->quoteConcat($_POST['nombre_editorial']).'pais_editorial ='.$conn->quoteConcat($_POST['pais_editorial']).'fundador ='.$conn->quoteConcat($_POST['fundador']).'fundacion ='.$_POST['fundacion'].' WHERE id_editorial = '.$_SESSION['id_editorial'];
                $conn->query($sentence);
                break;
            case 'genre':
                $sentence = 'UPDATE genero SET descripcion_genero ='.$conn->quote($_POST['descripcion_genero']).' WHERE id_genero ='.$_SESSION['id_genero'];
                $conn->query($sentence);
                break;
            case 'reader':
                // Define the upload img directory
                $upload_dir = 'view/img/users/';
                $def_user_pic = 'view/img/icon-user-default.png';
                // If there's no picture selected
                if($_FILES['picture']['error'] == 4) {
                    if($_POST['def_pic'] == $def_user_pic) // If the picurl is the same as that of default picurl
                        $sentence = 'CALL updateUsuario(' . $_SESSION['id_lector'] .',' . $conn->quote($_POST['nombre_lector']) . ',' . $conn->quote($_POST['ciudad_lector']) . ',' . $conn->quote($_POST['sexo']) . ',' .$conn->quote($_POST['email']) . ',' . $conn->quote($_POST['password']) . ',' .$conn->quote($def_user_pic). ',' .$_POST['id_tipo_usuario'].')';
                    else // Else, it means that it already has a default picture, so it keeps it
                        $sentence = 'CALL updateUsuario(' . $_SESSION['id_lector'] .',' . $conn->quote($_POST['nombre_lector']) . ',' . $conn->quote($_POST['ciudad_lector']) . ',' . $conn->quote($_POST['sexo']) . ',' .$conn->quote($_POST['email']) . ',' . $conn->quote($_POST['password']) . ',' .$conn->quote($_POST['def_pic']). ',' .$_POST['id_tipo_usuario'].')';
                }
                else{
                    // Now we define the name of the file
                    $filename = $upload_dir .$_SESSION['id_lector'].'.'.pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION); // nombre del archivo
                    // If the name of the picture is different
                    if($filename != $_POST['def_pic'] && $_POST['def_pic'] != $def_user_pic){ // Erase the stored picture
                        unlink($_POST['def_pic']);
                    }
                    move_uploaded_file($_FILES['picture']['tmp_name'], $filename);
                    $sentence = 'CALL updateUsuario(' . $_SESSION['id_lector'] .',' . $conn->quote($_POST['nombre_lector']) . ',' . $conn->quote($_POST['ciudad_lector']) . ',' . $conn->quote($_POST['sexo']) . ',' .$conn->quote($_POST['email']) . ',' . $conn->quote($_POST['password']) . ',' .$conn->quote($filename) . ',' .$_POST['id_tipo_usuario'].')';
                }
                $conn->query($sentence);
                break;
        }
    }


    public function add(){
        switch($_GET['type']){
            case 'book':
                $conn = new DatabaseConnection();
                // Define the upload img directory
                $upload_dir = 'view/img/books/';
                $def_book_pic = 'view/img/icon-default-book.png';
                // If there's no picture selected
                if($_FILES['picture']['error'] == 4) {
                    if($_POST['def_pic'] == $def_book_pic) // If the picurl is the same as that of default picurl
                        $sentence = 'CALL insertLibro('. $_POST['id_autor'] . ',' . $_POST['id_genero'] . ',' . $_POST['id_editorial'] . ',' . $conn->quote($_POST['titulo']) . ',' . $conn->quote($_POST['fecha_publicacion']) . ',' . $conn->quote($_POST['resumen']) . ',' . $conn->quote($def_book_pic) . ')';
                    else // Else, it means that it already has a default picture, so it keeps it
                        $sentence = 'CALL insertLibro('. $_POST['id_autor'] . ',' . $_POST['id_genero'] . ',' . $_POST['id_editorial'] . ',' . $conn->quote($_POST['titulo']) . ',' . $conn->quote($_POST['fecha_publicacion']) . ',' . $conn->quote($_POST['resumen']) . ',' . $conn->quote($_POST['def_pic']) . ')';
                }else{
                    // Now we define the name of the file
                    $filename = $upload_dir . basename($_FILES['picture']['name']); // nombre del archivo
                    // If the name of the picture is different
                    if($filename != $_POST['def_pic']){ // Erase the stored picture
                        unlink($_POST['def_pic']);
                    }
                    move_uploaded_file($_FILES['picture']['tmp_name'], $filename);
                    $sentence = 'CALL insertLibro('. $_POST['id_autor'] . ',' . $_POST['id_genero'] . ',' . $_POST['id_editorial'] . ',' . $conn->quote($_POST['titulo']) . ',' . $conn->quote($_POST['fecha_publicacion']) . ',' . $conn->quote($_POST['resumen']) . ',' . $conn->quote($filename) . ')';
                }
                $conn->query($sentence);
                break;
            case 'author':
                $conn = new DatabaseConnection();
                // Define the upload img directory
                $upload_dir = 'view/img/authors/';
                $def_user_pic = 'view/img/authors/icon-user-default.png';
                // If no file is selected
                if($_FILES['picture']['error'] == 4){
                    if($_POST['def_pic'] == $def_user_pic)
                        $sentence = 'INSERT INTO autor (nombre_autor, pais_autor, seudonimo, biografia, picurl) VALUE ('.$conn->quote($_POST['nombre_autor']).','.$conn->quote($_POST['pais_autor']).','.$conn->quote($_POST['seudonimo']).','.$conn->quote($_POST['biografia']).','.$conn->quote($def_user_pic).')';
                    else
                        $sentence = 'INSERT INTO autor (nombre_autor, pais_autor, seudonimo, biografia, picurl) VALUE ('.$conn->quote($_POST['nombre_autor']).','.$conn->quote($_POST['pais_autor']).','.$conn->quote($_POST['seudonimo']).','.$conn->quote($_POST['biografia']).','.$conn->quote($_POST['def_pic']).')';
                }else {
                    // Now we define the name of the file
                    $filename = $upload_dir . basename($_FILES['picture']['name']); // Name of the file
                    $sentence = 'INSERT INTO autor (nombre_autor, pais_autor, seudonimo, biografia, picurl) VALUE ('.$conn->quote($_POST['nombre_autor']).','.$conn->quote($_POST['pais_autor']).','.$conn->quote($_POST['seudonimo']).','.$conn->quote($_POST['biografia']).','.$conn->quote($filename).')';
                    move_uploaded_file($_FILES['picture']['tmp_name'], $filename);
                }
                $conn->query($sentence);
                break;
            case 'editorial':
                $conn = new DatabaseConnection();
                $sentence = 'INSERT INTO editorial (nombre_editorial, pais_editorial, fundador, fundacion) VALUE ('.$conn->quoteConcat($_POST['nombre_editorial']).$conn->quoteConcat($_POST['pais_editorial']).$conn->quoteConcat($_POST['fundador']).$_POST['fundacion'].')';
                $conn->query($sentence);
                break;
            case 'genre':
                $conn = new DatabaseConnection();
                $conn->query('INSERT INTO genero (descripcion_genero) VALUE ('.$conn->quote($_POST['descripcion_genero']).')');
                break;
            case 'reader':
                $conn = new DatabaseConnection();
                // Define the upload img directory
                $upload_dir = 'view/img/users/';
                $def_user_pic = 'view/img/icon-user-default.png';
                // If there's no picture selected
                if($_FILES['picture']['error'] == 4) {
                    $sentence = 'CALL agregaUsuario('. $conn->quote($_POST['nombre_lector']) . ',' . $conn->quote($_POST['ciudad_lector']) . ',' . $conn->quote($_POST['sexo']) . ',' .$conn->quote($_POST['email']) . ',' . $conn->quote($_POST['password']) . ',' .$conn->quote($_POST['def_pic']). ',' .$_POST['id_tipo_usuario'].')';}
                else{
                    // Now we define the name of the file
                    $filename = $upload_dir .$_SESSION['id_lector'].'.'.pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION); // nombre del archivo
                    // If the name of the picture is different
                    if($filename != $_POST['def_pic'] && $_POST['def_pic'] != $def_user_pic){ // Erase the stored picture
                        unlink($_POST['def_pic']);
                    }
                    move_uploaded_file($_FILES['picture']['tmp_name'], $filename);
                    $sentence = 'CALL agregaUsuario('. $conn->quote($_POST['nombre_lector']) . ',' . $conn->quote($_POST['ciudad_lector']) . ',' . $conn->quote($_POST['sexo']) . ',' .$conn->quote($_POST['email']) . ',' . $conn->quote($_POST['password']) . ',' .$conn->quote($filename) . ',' .$_POST['id_tipo_usuario'].')';
                }
                $conn->query($sentence);
                break;
        }
    }

    public function delete() {
        switch($_GET['type']) {
            case 'book':
                $conn = new DatabaseConnection();
                $bookdata = $conn->query('SELECT picurl FROM libro WHERE id_libro = '.$_GET['bid']);
                if($bookdata[0]['picurl'] != 'view/img/icon-default-book.png')
                    unlink($bookdata[0]['picurl']);
                $conn->query('DELETE FROM libro WHERE id_libro ='.$_GET['bid']);
                break;
            case 'author':
                $conn = new DatabaseConnection();
                $bookdata = $conn->query('SELECT picurl FROM autor WHERE id_autor = '.$_GET['aid']);
                if($bookdata[0]['picurl'] != 'view/img/author/icon-user-default.png')
                    unlink($bookdata[0]['picurl']);
                $conn->query('DELETE FROM autor WHERE id_autor ='.$_GET['aid']);
                break;
            case 'editorial':
                $conn = new DatabaseConnection();
                $conn->query('DELETE FROM editorial WHERE id_editorial ='.$_GET['eid']);
                break;
            case 'genre':
                $conn = new DatabaseConnection();
                $conn->query('DELETE FROM genero WHERE id_genero ='.$_GET['gid']);
                break;
            case 'reader':
                $conn = new DatabaseConnection();
                $conn->query('DELETE FROM lector WHERE id_lector ='.$_GET['uid']);
                break;
        }
    }

}