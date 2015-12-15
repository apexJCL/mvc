<div id="management">
<?php
// bookdata contains the current book data
// autors contains all authors
// editorials... well, you get it, don't you?
switch($_GET['type']){
    case 'book':
        ChromePhp::log($bookdata);
        echo '<form action="index.php?action=update&type=book" method="post">
                <span id="fieldtitle">Titulo</span>';
        echo '<input type="text" value="'.$bookdata['titulo'].'"><hr>';
        echo '<span id="fieldtitle">Autor</span><select name="id_autor">';
        foreach($authors as $autor){
            if($autor['id_autor'] != $bookdata['id_autor'])
                echo '<option value="'.$autor['id_autor'].'">'.$autor['nombre_autor'].'</option>';
            else
                echo '<option selected value="'.$autor['id_autor'].'">'.$autor['nombre_autor'].'</option>';
        }
        echo '</select><hr><span id="fieldtitle">Editorial</span><select name="id_editorial">';

        foreach($editorials as $editorial){
            if($editorial['id_editorial'] != $bookdata['id_editorial'])
                echo '<option value="'.$editorial['id_editorial'].'">'.$editorial['nombre_editorial'].'</option>';
            else
                echo '<option selected value="'.$editorial['id_editorial'].'">'.$editorial['nombre_editorial'].'</option>';
        }
        echo '</select><hr>
        <span id="fieldtitle">Fecha</span><input type="date" value="'.$bookdata['fecha_publicacion'].'"><hr>
        <span id="fieldtitle">Resumen</span>
        <textarea>'.$bookdata['resumen'].'</textarea>
        <hr><span id="fieldtitle">Portada</span><img src="'.$bookdata['picurl'].'">
        <input type="file" name="picture"><br><input type="submit" value="Actualizar" class="nicebutton">';
        break;
    case 'autor':
        break;
    case 'editorial':
        break;
    case 'lector':
        break;
}
?>
</div>