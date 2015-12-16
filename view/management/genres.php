<div id="showdata">
    <table id="data">
        <span id="addbutton"><a href="index.php?action=edit&subaction=add&type=genre"><img src="view/img/add.png" alt=""></a></span>
        <tr>
            <th>ID Género</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        <?php
        foreach($rows as $tuple){
            echo '<tr>';
            echo '<td>'.$tuple['id_genero'].'</td>
                    <td>'.$tuple['descripcion_genero'].'</td>
                    <td><a href="index.php?action=edit&subaction=update&type=genre&gid='.$tuple['id_genero'].'"><img src="view/img/edit.png"></a>
                    <a OnClick="return confirm(\'¿Seguro que desea borrar este género? \\n Se eliminaran los libros asociados a el.\');" href="index.php?action=update&subaction=delete&type=genre&gid='.$tuple['id_genero'].'"><img src="view/img/delete.png"></a></td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>