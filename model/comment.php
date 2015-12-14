<?php

require_once 'dbconn.php';

class Comments {

    public function loadComments(){
        $bookid = $_GET['id'];
        $conn = new DatabaseConnection();
        $comments = $conn->query('Call getMainComments('.$bookid.')');
        foreach($comments as &$comment){
            $replies = $conn->query('CALL getReplies('.$comment['id'].')');
            $comment['replies'] = $replies;
            ChromePhp::log($comment);
        }
        return $comments;
    }

}