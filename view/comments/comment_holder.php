<div id="commentholder">

    <?php
    ChromePhp::log(isset($_SESSION['id']));
    if(isset($_SESSION['id'])) {
        echo '<span id="title">Agregar comentario: </span>
                <form action="model/submit_comment.php" id="commentform" method="post">
                <textarea name="comment" id="commentarea" cols="30" rows="10" form="commentform"></textarea>
                <input type="submit" value="Aceptar" class="nicebutton">
                </form>';
    }
    ?>
    <div id="commentsection">
        <span id="title">Comentarios</span>
        <?php
        foreach($comments as $comment){
            $mode = true;
            // First we show the main comment
            include 'view/comments/comment.php';
            if(isset($comment['replies'])) {
                $mode = false;
                echo '<ul>';
                foreach ($comment['replies'] as $reply) {
                    include 'view/comments/comment.php';
                }
                echo '</ul>';
            }
        }
        ?>
    </div>
</div>