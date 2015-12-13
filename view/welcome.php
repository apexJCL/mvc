<div id="welcomescreen">
    <?php
    if(isset($_SESSION['username'])){
        echo '<h1>Bienvenido a la biblioteca, '.$_SESSION['username'].'.</h1>';
    }
    else
        echo '<h1>Bienvenido a la biblioteca, lince.</h1>';
    ?>
    <p>Aquí podrás consultar los libros que tenemos... y los que no, te invitamos a donarlos.</p>
</div>