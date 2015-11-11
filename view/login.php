<div id="form" class="regdiv">
    <form action="index.php?action=check" method="post">
        <?php
        if(isset($_GET['status'])) {
            if ($_GET['status'] == "error") {
                echo '<table class="registroerr" frame="box" align="center">';
            }
        }
        else
            echo '<table class="registro" frame="box" align="center">';
        ?>
            <tr>
                <td>Correo</td>
                <td><input type="text" class="niceinput" name="mail"></td>
            </tr>
            <tr>
                <td>Contraseña</td>
                <td><input type="password" class="niceinput" name="pass"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" class="nicebutton">Aceptar</button></td>
            </tr>
        </table>
    </form>
</div>