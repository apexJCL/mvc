<?php

require_once 'dbconn.php';

class Books{

    function getBookList(){
        $conn = new DatabaseConnection();
        return $conn->query('Call verLibros()');
    }

    function getBookData(){
        $conn = new DatabaseConnection();
        return $conn->query('CALL verLibro('.$_GET['id'].')');
    }

}