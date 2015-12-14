<?php

require_once 'model/comment.php';

class CommentsController {

    public function showComments(){
        $model = new Comments();
        $comments = $model->loadComments();
        include 'view/comments/comment_holder.php';
    }

    public function submitComment() {
        $model = new Comments();
        $model->submitComment();
        // Now we redirect to the book, so it shows the new comment
        header('Location: index.php?action=showbook&id=' . $_SESSION['bookid']);
    }

}