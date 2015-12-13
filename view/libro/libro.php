<div id="autor">
    <div id="cover">
        <?php
        echo '<img src="'.$data[0]['picurl'].'">'
        ?>
    </div>
    <div id="information">
        <?php
        echo '<span id="title">'.$data[0]['titulo'].'</span>';
        echo '<span id="autor"><a href="index.php?autor='.$data[0]['id_autor'].'" id="">'.$data[0]['nombre_autor'].'</a></span>';
        echo '<span id="date">'.$data[0]['fecha_publicacion'].'</span>';
        echo '<hr><span id="titler">Resumen</span>';
        echo '<span id="resumen">'.$data[0]['resumen'].'</span>';
        ?>
    </div>
</div>