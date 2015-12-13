 <?php
    if(sizeof($books) > 0) {
        echo '<div id="booklist">
                <span id="bookheader">Libros</span>';
        foreach ($books as $book) {
            echo '<li><a href="#">' . $book['titulo'] . '</a></li>';
        }
        echo '</div>';
    }