<?php

require_once 'dbconn.php';

class Edit{

    /**
     * Returns the data
     *
     * @return mixed
     */
    function retrieveData(){
        $conn = new DatabaseConnection();
        return $conn->fetchRow('SELECT * FROM booksData WHERE id_libro = '.$_GET['bid']);
    }



}