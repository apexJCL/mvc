<div id="showdata">
    <table id="data">
        <span id="addbutton"><a href="index.php?action=edit&subaction=add&type=reader"><img src="view/img/add.png" alt=""></a></span>
        <tr>
            <th>ID lector</th>
            <th>Nombre</th>
            <th>Ciudad</th>
            <th>Sexo</th>
            <th>E-mail</th>
            <th>Password</th>
            <th>Foto de Perfil</th>
            <th>Último Inicio de Sesión</th>
            <th>Logueado</th>
            <th>Tipo de Usuario</th>
            <th>Foto de Perfil</th>
            <th>Acciones</th>
        </tr>
        <?php
        foreach($rows as $tuple){
            echo '<tr>';
            echo '<td>'.$tuple['id_lector'].'</td>
                    <td>'.$tuple['nombre_lector'].'</td>
                    <td>'.$tuple['ciudad_lector'].'</td>
                    <td>'.$tuple['sexo'].'</td>
                    <td>'.$tuple['email'].'</td>
                    <td>'.$tuple['password'].'</td>
                    <td>'.$tuple['tipo_usuario'].'</td>
                    <td>'.$tuple['ultimo_logueo'].'</td>
                    <td><img src="';
            if($tuple['logueado'])
                echo 'view/img/logged.png';
            else
                echo 'view/img/not_logged.png';
            echo '" alt=""></td>
                    <td>'.$tuple['tipo_usuario'].'</td>
                    <td><img id="smallcover" src="'.$tuple['picurl'].'"></td>
                    <td><a href="index.php?action=edit&subaction=update&type=reader&uid='.$tuple['id_lector'].'"><img src="view/img/edit.png"></a>
                    <a OnClick="return confirm(\'¿Seguro que desea borrar este usuario? Se eliminarán sus comentarios\');" href="index.php?action=update&subaction=delete&type=reader&uid='.$tuple['id_lector'].'"><img src="view/img/delete.png"></a></td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>