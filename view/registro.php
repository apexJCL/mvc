<?php
if(isset($mode)){
    switch($mode){
        case 'badmail':
            echo '<script>alert("El correo ingresado no es válido")</script>';
            break;
        case 'passdontmatch':
            echo '<script>alert("Las contraseñas no coinciden")</script>';
            break;
        case 'good':
            header('Location: index.php?action=login');
            break;
    }
}
?>
<div id="form" class="regdiv">
    <form action="index.php?action=checkr" method="post">
        <table class="registro" frame="box" align="center">
            <tr>
                <td>Nombre</td>
                <td><input type="text" class="niceinput" name="username"></td>
            </tr>
            <tr>
                <td>Ciudad</td>
                <td><input type="text" class="niceinput" name="city"></td>
            </tr>
            <tr>
                <td>Sexo</td>
                <td>
                    <select class="nicedropdown" name="sex">
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Correo</td>
                <td><input type="email" class="niceinput" name="email"></td>
            </tr>
            <tr>
                <td>Contraseña</td>
                <td><input type="password" class="niceinput" name="password"></td>
            </tr>
            <tr>
                <td>Repita Contraseña</td>
                <td><input type="password" class="niceinput" name="password_ver"></td>
            </tr>
            <tr>
                <td colspan="3"><button type="submit" class="nicebutton">Aceptar</button></td>
            </tr>
        </table>
    </form>
</div>