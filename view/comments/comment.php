<div id="comment">
    <?php
    ChromePhp::log("isset comment ".isset($comment));
    ChromePhp::log("isset reply ".isset($reply));
    if($mode){
        echo '<div id="userpic"><img src="'.$comment['picurl'].'"></div>
                <div id="name">'.$comment['nombre'].'</div>
                <div>'.$comment['fecha'].'</div>';
        echo '<div id="text">'.$comment['comentario'].'</div>';
    }
    else {
        echo '<div id="userpic"><img src="'.$reply['picurl'].'"></div>
                <div id="name">'.$reply['nombre'].'</div>
                <div>'.$reply['fecha'].'</div>';
        echo '<div id="text">'.$reply['comentario'].'</div>';
    }
    ?>
</div>