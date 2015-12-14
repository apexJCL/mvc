<div id="comment">
    <?php
    if($mode){
        echo '<div id="userpic"><img src="'.$comment['picurl'].'"></div>
                <div id="name">'.$comment['nombre'].'</div>
                <div>'.$comment['fecha'].'</div>
                <div id="text">'.$comment['comentario'].'</div>';
        if(isset($_SESSION['id'])){
            echo '<div id="smallreply">
                    <span id="replytitle">Responde a este comentario: </span>
                    <form action="index.php?action=submit&replyid='.$comment['id'].'" method="post">
                        <textarea name="reply" id="smallreply"></textarea>
                        <input type="submit" value="Aceptar" class="nicebutton">
                    </form>
                </div>';
        }
    }
    else {
        echo '<div id="userpic"><img src="'.$reply['picurl'].'"></div>
                <div id="name">'.$reply['nombre'].'</div>
                <div>'.$reply['fecha'].'</div>';
        echo '<div id="text">'.$reply['comentario'].'</div>';
    }
    ?>
</div>