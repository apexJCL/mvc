<div id="showdata">
    <table id="data">
        <span id="addbutton"><a href="index.php?action=edit&subaction=add&type=author"><img src="view/img/add.png" alt=""></a></span>
        <tr>
            <th>ID Autor</th>
            <th>Nombre Autor</th>
            <th>País Autor</th>
            <th>Seudónimo</th>
            <th>Biografía</th>
            <th>Imagen</th>
            <th>Editar</th>
        </tr>
        <?php
        foreach($rows as $tuple){
            echo '<tr>';
            echo '<td>'.$tuple['id_autor'].'</td>
                    <td>'.$tuple['nombre_autor'].'</td>
                    <td>'.$tuple['pais_autor'].'</td>
                    <td>'.$tuple['seudonimo'].'</td>
                    <td><div id="bio">'.$tuple['biografia'].'</div></td>
                    <td><img id="smallcover" src="'.$tuple['picurl'].'"></td>
                    <td><a href="index.php?action=edit&subaction=update&type=author&aid='.$tuple['id_autor'].'"><img src="view/img/edit.png"></a>
                    <a OnClick="return confirm(\'¿Seguro que desea borrar este autor?\');" href="index.php?action=update&subaction=delete&type=author&aid='.$tuple['id_autor'].'"><img src="view/img/delete.png"></a></td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>