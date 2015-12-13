<?php

require_once 'dbconn.php';

class Books{

    function getBookList(){
        $conn = new DatabaseConnection();
        ChromePhp::log('Call verLibros()');
        return $conn->query('Call verLibros()');
    }

}