<div id="booklist">
    <?php
    mb_internal_encoding('UTF-8');
    if(sizeof($books) > 0) {
        asort($books);
        $letter = "";
        foreach ($books as $book) {
            if (substr($book['titulo'], 0, 1) != $letter) {
                $letter = substr($book['titulo'], 0, 1);
                echo '<span id="alphabetic">' . $letter . '</span>';
            }
            echo '<li><a href="index.php?action=showbook&id='.$book['id_libro'].'">' . $book['titulo'] . '</a></li>';
        }
    }
    else
        echo '<span id="alphabetic">No hay resultados.</span>';
    ?>
</div>