<div id="showdata">
    <table id="data">
        <tr>
            <th>ID libro</th>
            <th>Título</th>
            <th>ID autor</th>
            <th>Nombre Autor</th>
            <th>ID editorial</th>
            <th>Editorial</th>
            <th>Fecha Publicación</th>
            <th>Resumen</th>
            <th>Imagen</th>
            <th></th>
        </tr>
        <?php
        foreach($rows as $tuple){
            echo '<tr>';
            echo '<td>'.$tuple['id_libro'].'</td>
                    <td>'.$tuple['titulo'].'</td>
                    <td>'.$tuple['id_autor'].'</td>
                    <td>'.$tuple['nombre_autor'].'</td>
                    <td>'.$tuple['id_editorial'].'</td>
                    <td>'.$tuple['nombre_editorial'].'</td>
                    <td>'.$tuple['fecha_publicacion'].'</td>
                    <td>'.$tuple['resumen'].'</td>
                    <td><img src="'.$tuple['picurl'].'"></td>
                    <td><a href="index.php?action=edit&type=book&bid='.$tuple['id_libro'].'"><img src="view/img/edit.png"></a></td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>