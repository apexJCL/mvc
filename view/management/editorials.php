<div id="showdata">
    <table id="data">
        <span id="addbutton"><a href="index.php?action=edit&subaction=add&type=editorial"><img src="view/img/add.png" alt=""></a></span>
        <tr>
            <th>ID Editorial</th>
            <th>Nombre</th>
            <th>País</th>
            <th>Fundador</th>
            <th>Fundación</th>
            <th>Acciones</th>
        </tr>
        <?php
        foreach($rows as $tuple){
            echo '<tr>';
            echo '<td>'.$tuple['id_editorial'].'</td>
                    <td>'.$tuple['nombre_editorial'].'</td>
                    <td>'.$tuple['pais_editorial'].'</td>
                    <td>'.$tuple['fundador'].'</td>
                    <td>'.$tuple['fundacion'].'</td>
                    <td><a href="index.php?action=edit&subaction=update&type=editorial&eid='.$tuple['id_editorial'].'"><img src="view/img/edit.png"></a>
                    <a OnClick="return confirm(\'¿Seguro que desea borrar esta editorial? Se eliminaran los libros asociados a ella.\');" href="index.php?action=update&subaction=delete&type=editorial&eid='.$tuple['id_editorial'].'"><img src="view/img/delete.png"></a></td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>