<div id="datadiv">
    <?php
    if(isset($_POST['searchstring']))
        echo '<span id="title">Resultados</span><br>';
    ?>
    <table class="datos">
        <?php
        $letter="";
        asort($results);
        foreach($results as $data){
            if (substr($data['nombre_autor'], 0, 1) != $letter) {
                $letter = substr($data['nombre_autor'], 0, 1);
                echo '<span id="alphabetic">' .$letter. '</span>';
            }
            echo '<li><a href="index.php?autor=' . $data['id_autor'] . '">' . $data['nombre_autor'] . '</a></li>';
        }
        ?>
    </table>
</div>