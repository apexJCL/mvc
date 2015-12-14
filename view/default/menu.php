<div id="menu">
    <ul id="nav">
        <?php

        ChromePhp::log("Menu, session status: ".session_status());

        if(!isset($_SESSION['username']))
            echo '<li><a href="index.php?action=login">Inicia Sesión</a></li><li><a href="index.php?action=register">Regístrate</a></li>';
        else {
            echo '<li><a href="index.php?action=logout">Cerrar Sesión</a></li>';
            if($_SESSION['user_type'] == 1) {
                echo '<li><a href="index.php?action=statistics">Estadísticas</a></li>';
                echo '<li><a  href="#">Administrar</a>
                            <ul>
                                <li class="submenu"><a href="index.php?action=manage&type=autors">Autores</a></li>
                                <li class="submenu"><a href="index.php?action=manage&type=books">Libros</a></li>
                            </ul>
                        </li>';
            }
            else
                echo '<li><a href="index.php?action=profile">Mi perfil</a></li>
                        <li><a  href="#">Catálogo</a>
                            <ul>
                                <li class="submenu"><a href="index.php?action=autors">Autores</a></li>
                                <li class="submenu"><a href="index.php?action=books">Libros</a></li>
                            </ul>
                        </li>';
        }
        ?>
    </ul>
</div>