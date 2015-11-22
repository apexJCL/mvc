<?php

require_once 'dbconn.php';

class Search{

    public function searchAutor($searchstring){
        $conn = new DatabaseConnection();
        $searchstring = $conn->quote('.*'.$searchstring.'.*');
        return $conn->query('CALL searchAutor('.$searchstring.')');
    }

}