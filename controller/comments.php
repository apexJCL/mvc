<?php

require_once 'model/comment.php';

class CommentsController {

    public function showComments(){
        $model = new Comments();
        $comments = $model->loadComments();
        include 'view/comments/comment_holder.php';
    }

}