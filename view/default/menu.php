<div id="menu">
    <ul id="nav">
        <?php
        if(session_status() == 1)
            echo '<li><a href="index.php?action=login">Inicia Sesión</a></li><li><a href="index.php?action=register">Regístrate</a></li>';
        else
            echo '<li><a href="index.php?action=login">Cerrar Sesión</a></li>';
        ?>
        <li><a  href="">Catálogo</a>
            <ul>
                <li class="submenu"><a href="index.php?action=autors">Autores</a></li>
                <li class="submenu"><a href="index.php?action=books">Libros</a></li>
            </ul>
        </li>
    </ul>
</div>