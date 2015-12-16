<div id="showdata">
    <table id="data">
        <span id="addbutton"><a href="index.php?action=edit&subaction=add&type=book"><img src="view/img/add.png" alt=""></a></span>
        <tr>
            <th>ID libro</th>
            <th>Título</th>
            <th>Nombre Autor</th>
            <th>Editorial</th>
            <th>Fecha Publicación</th>
            <th>Resumen</th>
            <th>Género</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
        <?php
        foreach($rows as $tuple){
            echo '<tr>';
            echo '<td>'.$tuple['id_libro'].'</td>
                    <td>'.$tuple['titulo'].'</td>
                    <td>'.$tuple['nombre_autor'].'</td>
                    <td>'.$tuple['nombre_editorial'].'</td>
                    <td>'.$tuple['fecha_publicacion'].'</td>
                    <td><div id="bio">'.$tuple['resumen'].'</div></td>
                    <td>'.$tuple['descripcion_genero'].'</td>
                    <td><img id="smallcover" src="'.$tuple['picurl'].'"></td>
                    <td><a href="index.php?action=edit&subaction=update&type=book&bid='.$tuple['id_libro'].'"><img src="view/img/edit.png"></a>
                    <a OnClick="return confirm(\'¿Seguro que desea borrar este libro?\');" href="index.php?action=update&subaction=delete&type=book&bid='.$tuple['id_libro'].'"><img src="view/img/delete.png"></a></td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>