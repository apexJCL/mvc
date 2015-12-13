 <?php
    if(sizeof($books) > 0) {
        echo '<div id="booklist">
                <span id="bookheader">Libros</span>';
        foreach ($books as $book) {
            echo '<li><a href="index.php?action=showbook&id='.$book['id_libro'].'">' . $book['titulo'] . '</a></li>';
        }
        echo '</div>';
    }