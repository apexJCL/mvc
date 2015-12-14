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
        }
        return $comments;
    }

    public function submitComment(){
        $conn = new DatabaseConnection();
        if(!isset($_GET['replyid']))
            $sentence = 'CALL addComment('.$_SESSION['bookid'].','.$_SESSION['id'].",'".$_POST['comment']."')";
        else
            $sentence = 'CALL addReply('.$_SESSION['bookid'].','.$_SESSION['id'].','.$conn->quote($_POST['reply']).','.$_GET['replyid'].')';
        $conn->query($sentence);
    }

}