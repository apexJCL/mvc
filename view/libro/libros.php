<div id="booklist">
    <?php
    mb_internal_encoding('UTF-8');
    $letter = "";
    foreach ($books as $book){
        if(substr($book['titulo'], 0, 1) != $letter){
            $letter = substr(utf8_encode($book['titulo']), 0, 1);
            echo '<span id="alphabetic">'.$letter.'</span>';
        }
        echo '<li><a href="#">'.$book['titulo'].'</a></li>';
    }
    ?>
</div>