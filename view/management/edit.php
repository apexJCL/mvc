<div id="management">
<?php
// bookdata contains the current book data
// autors contains all authors
// editorials... well, you get it, don't you?
switch($_GET['type']){
    case 'book':
        echo '<script>
                    function validateForm() {
                        var msg = "No ha llenado lo siguiente: ";
                        var titulo = document.forms["book"]["titulo"].value;
                        var resumen = document.forms["book"]["resumen"].value;
                        var flag = true;
                        if( titulo == null || titulo == ""){
                            msg+="\\n Título";
                            flag = false;
                        }
                        if( resumen == null | resumen == ""){
                            msg+="\\n Resumen";
                            flag = false;
                        }
                        if(!flag)
                            alert(msg);
                        return flag;
                    }
                    </script>';
        if($_GET['subaction'] == 'update') {
            $_SESSION['id_libro'] = $bookdata[0]['id_libro'];
            echo '<form name="book" enctype="multipart/form-data" action="index.php?action=update&subaction=update&type=book" method="post" onsubmit="return validateForm()">
                <span id="fieldtitle">Titulo</span>';
            echo '<input name="titulo" type="text" value="' . htmlentities($bookdata[0]['titulo']) . '"><hr>';
            echo '<span id="fieldtitle">Autor</span><select name="id_autor">';
            foreach ($authors as $autor) {
                if ($autor['id_autor'] != $bookdata[0]['id_autor'])
                    echo '<option value="' . $autor['id_autor'] . '">' . $autor['nombre_autor'] . '</option>';
                else
                    echo '<option selected value="' . $autor['id_autor'] . '">' . $autor['nombre_autor'] . '</option>';
            }
            echo '</select><hr><span id="fieldtitle">Editorial</span><select name="id_editorial">';
            foreach ($editorials as $editorial) {
                if ($editorial['id_editorial'] != $bookdata[0]['id_editorial'])
                    echo '<option value="' . $editorial['id_editorial'] . '">' . $editorial['nombre_editorial'] . '</option>';
                else
                    echo '<option selected value="' . $editorial['id_editorial'] . '">' . $editorial['nombre_editorial'] . '</option>';
            }
            echo '</select><hr><span id="fieldtitle">Género</span><select name="id_genero">';
            foreach ($genres as $genre) {
                if ($genre['id_genero'] != $bookdata[0]['id_editorial'])
                    echo '<option value="' . $genre['id_genero'] . '">' . $genre['descripcion_genero'] . '</option>';
                else
                    echo '<option selected value="' . $genre['id_genero'] . '">' . $genre['descripcion_genero'] . '</option>';
            }
            echo '</select><hr>';
            echo '<span id="fieldtitle">Fecha</span><input name="fecha_publicacion" type="date" value="' . $bookdata[0]['fecha_publicacion'] . '"><hr>
        <span id="fieldtitle">Resumen</span>
        <textarea name="resumen">' . $bookdata[0]['resumen'] . '</textarea>
        <hr><span id="fieldtitle">Portada</span><img src="' . $bookdata[0]['picurl'] . '">
        <input type="file" name="picture"><br><input type="submit" value="Actualizar" class="nicebutton">
        <input type="hidden" value="' . $bookdata[0]['picurl'] . '" name="def_pic"></form>';
        }
        else if($_GET['subaction'] == 'add'){
            echo '<form name="book" enctype="multipart/form-data" action="index.php?action=update&subaction=add&type=book" method="post" onsubmit="return validateForm()">
                <span id="fieldtitle">Titulo</span>';
            echo '<input name="titulo" type="text"><hr><span id="fieldtitle">Autor</span><select name="id_autor">';
            foreach ($authors as $autor) {
                echo '<option value="' . $autor['id_autor'] . '">' . $autor['nombre_autor'] . '</option>';
            }
            echo '</select><hr><span id="fieldtitle">Editorial</span><select name="id_editorial">';
            foreach ($editorials as $editorial) {
                echo '<option value="' . $editorial['id_editorial'] . '">' . $editorial['nombre_editorial'] . '</option>';
            }
            echo '</select><hr><span id="fieldtitle">Género</span><select name="id_genero">';
            foreach ($genres as $genre) {
                echo '<option value="' . $genre['id_genero'] . '">' . $genre['descripcion_genero'] . '</option>';
            }
            echo '</select><hr>';
            echo '<span id="fieldtitle">Fecha</span><input name="fecha_publicacion" type="date" value="'.date('Y-m-d').'"><hr>
        <span id="fieldtitle">Resumen</span>
        <textarea name="resumen"></textarea>
        <hr><span id="fieldtitle">Portada</span><img src="view/img/icon-default-book.png">
        <input type="file" name="picture"><br><input type="submit" value="Aceptar" class="nicebutton">';
        }
        break;
    case 'author':
        if($_GET['subaction'] == 'update') {
            $_SESSION['id_autor'] = $authordata[0]['id_autor'];
            echo '<form enctype="multipart/form-data" action="index.php?action=update&subaction=update&type=author" method="post">
                <span id="fieldtitle">Nombre Autor</span>';
            echo '<input name="nombre_autor" type="text" value="' . htmlentities($authordata[0]['nombre_autor']) . '"><hr>';
            echo '<span id="fieldtitle">País Autor</span>
                    <input type="text" name="pais_autor" value="'.htmlentities($authordata[0]['pais_autor']).'"><hr>
                    <span id="fieldtitle">Seudónimo</span>
                    <input type="text" name="seudonimo" value="'.htmlentities($authordata[0]['seudonimo']).'"><hr>';
            echo '<span id="fieldtitle">Biografía</span>
                    <textarea name="biografia">' . $authordata[0]['biografia'] . '</textarea>
                    <hr><span id="fieldtitle">Foto</span><img src="' . $authordata[0]['picurl'] . '">
                    <input type="file" name="picture"><br><input type="submit" value="Actualizar" class="nicebutton">
                    <input type="hidden" value="' . $authordata[0]['picurl'] . '" name="def_pic"></form>';
        }
        else if($_GET['subaction'] == 'add'){
            echo '<form enctype="multipart/form-data" action="index.php?action=update&subaction=add&type=author" method="post">
                <span id="fieldtitle">Nombre Autor</span>';
            echo '<input name="nombre_autor" type="text"><hr>';
            echo '<span id="fieldtitle">País Autor</span>
                    <input type="text" name="pais_autor"><hr>
                    <span id="fieldtitle">Seudónimo</span>
                    <input type="text" name="seudonimo"><hr>';
            echo '<span id="fieldtitle">Biografía</span>
                    <textarea name="biografia"></textarea>
                    <hr><span id="fieldtitle">Foto</span><img src="view/img/authors/icon-user-default.png">
                    <input type="file" name="picture"><br><input type="submit" value="Aceptar" class="nicebutton">
                    <input type="hidden" value="view/img/authors/icon-user-default.png" name="def_pic"></form>';
        }
        break;
    case 'editorial':
        echo '<script>
                function check(){
                    var nombre = document.forms["editorial"]["nombre_editorial"].value;
                    var pais = document.forms["editorial"]["pais_editorial"].value;
                    var fundador = document.forms["editorial"]["fundador"].value;
                    var fundacion = document.forms["editorial"]["fundacion"].value;
                    var msg = "Falta llenar los siguientes campos: ";
                    var flag = true;
                    if(nombre == null || nombre == ""){
                        flag = false;
                        msg+="\\n Nombre";
                    }
                    if(pais == null || pais == ""){
                        flag = false;
                        msg+="\\n País";
                    }
                    if(fundador == null || fundador == ""){
                        flag = false;
                        msg+="\\n Fundador";
                    }
                    if(fundacion == null || fundacion > 9999 || fundacion < 0){
                        flag = false;
                        msg+="\\n Fundacion";
                    }
                    if(!flag){
                        alert(msg);
                    }
                    return flag;
                }
            </script>';
        if($_GET['subaction'] == 'update') {
            $_SESSION['id_editorial'] = $editorialdata[0]['id_editorial'];
            echo '<form name="editorial" enctype="multipart/form-data" onsubmit="return check()" action="index.php?action=update&subaction=update&type=editorial" method="post" on>
                <span id="fieldtitle">Nombre</span>';
            echo '<input name="nombre_editorial" type="text" value="' . htmlentities($editorialdata[0]['nombre_editorial']) . '"><hr>';
            echo '<span id="fieldtitle">País</span>
                    <input type="text" name="pais_editorial" value="'.htmlentities($editorialdata[0]['pais_editorial']).'"><hr>
                    <span id="fieldtitle">Fundador</span>
                    <input type="text" name="fundador" value="'.htmlentities($editorialdata[0]['fundador']).'"><hr>';
            echo '<span id="fieldtitle">Fundacion</span>
                    <input type="number" name="fundacion" value="'.$editorialdata[0]['fundacion'].'">
                    <input type="submit" value="Actualizar" class="nicebutton">';
        }
        else if($_GET['subaction'] == 'add'){
            echo '<form name="editorial" onsubmit="return check()" enctype="multipart/form-data" action="index.php?action=update&subaction=add&type=editorial" method="post">
                <span id="fieldtitle">Nombre</span>';
            echo '<input name="nombre_editorial" type="text"><hr>';
            echo '<span id="fieldtitle">País</span>
                    <input type="text" name="pais_editorial"><hr>
                    <span id="fieldtitle">Fundador</span>
                    <input type="text" name="fundador"><hr>';
            echo '<span id="fieldtitle">Fundacion</span>
                    <input type="number" name="fundacion"></textarea>
                    <input type="submit" value="Aceptar" class="nicebutton">';
        }
        break;
    case 'genre':
        echo '<script>
                function check(){
                    var descripcion = document.forms["genre"]["descripcion_genero"].value;
                    var msg = "Falta llenar los siguientes campos: ";
                    var flag = true;
                    if(descripcion == null || descripcion == ""){
                        flag = false;
                        msg+="\\n Descripcion";
                    }
                    if(!flag){
                        alert(msg);
                    }
                    return flag;
                }
            </script>';
        if($_GET['subaction'] == 'update') {
            $_SESSION['id_genero'] = $genredata[0]['id_genero'];
            echo '<form name="genre" onsubmit="return check()" action="index.php?action=update&subaction=update&type=genre" method="post" on>
                <span id="fieldtitle">Descripcion</span>';
            echo '<input name="descripcion_genero" type="text" value="' . htmlentities($genredata[0]['descripcion_genero']) . '"><hr>
                <input type="submit" value="Actualizar" class="nicebutton">';
        }
        else if($_GET['subaction'] == 'add'){
            echo '<form name="genre" onsubmit="return check()" action="index.php?action=update&subaction=add&type=genre" method="post">
                <span id="fieldtitle">Descripcion</span>';
            echo '<input name="descripcion_genero" type="text">
                  <input type="submit" value="Aceptar" class="nicebutton">';
        }
        break;
    case 'reader':
        if($_GET['subaction'] == 'update'){
            $_SESSION['id_lector'] = $userdata[0]['id_lector'];
            echo '<form name="reader" enctype="multipart/form-data" action="index.php?action=update&subaction=update&type=reader" method="post">
                    <span id="fieldtitle">Nombre</span><input type="text" name="nombre_lector" value="'.$userdata[0]['nombre_lector'].'"><hr>
                    <span id="fieldtitle">Ciudad</span><input type="text" name="ciudad_lector" value="'.$userdata[0]['ciudad_lector'].'"><hr>
                    <span id="fieldtitle">Sexo</span><select name="sexo" id="sexo">';
            if($userdata[0]['sexo'] == 'Masculino')
                echo '<option selected="selected" value="Masculino">Masculino</option>
                      <option value="Femenino">Femenino</option>';
            else
                echo '<option value="Masculino">Masculino</option>
                      <option selected="selected" value="Femenino">Femenino</option>';
            echo '</select><hr>
                      <span id="fieldtitle">Tipo Usuario</span>';
            if($userdata[0]['id_tipo_usuario'] == 1)
                echo '<input type="radio" name="id_tipo_usuario" value="1" checked="checked">Administrador
                      <input type="radio" name="id_tipo_usuario" value="2">Usuario Estandar';
            else
                echo '<input type="radio" name="id_tipo_usuario" value="1">Administrador
                      <input type="radio" name="id_tipo_usuario" value="2" checked="checked">Usuario Estandar';
            echo '<hr><span id="fieldtitle">Email</span><input type="text" name="email" value="'.$userdata[0]['email'].'"><hr>
                    <span id="fieldtitle">Password</span><input type="text" name="password" value="'.$userdata[0]['password'].'"><hr>
                    <span id="fieldtitle">Foto de Perfil</span><img src="'.$userdata[0]['picurl'].'" alt="">
                    <input type="file" name="picture">
                    <input type="hidden" name="def_pic" value="'.$userdata[0]['picurl'].'">
                    <input type="submit" value="Aceptar" class="nicebutton">
                </form>';
        }
        else if($_GET['subaction'] == 'add'){
            echo '<form enctype="multipart/form-data"  name="reader" action="index.php?action=update&subaction=add&type=reader" method="post">
                    <span id="fieldtitle">Nombre</span><input type="text" name="nombre_lector"><hr>
                    <span id="fieldtitle">Ciudad</span><input type="text" name="ciudad_lector"><hr>
                    <span id="fieldtitle">Sexo</span><select name="sexo" id="sexo">
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    </select><hr>
                    <span id="fieldtitle">Tipo Usuario</span>
                    <input type="radio" name="id_tipo_usuario" value="1">Administrador
                    <input type="radio" name="id_tipo_usuario" value="2" checked="checked">Usuario Estandar
                    <span id="fieldtitle">Email</span><input type="email" name="email"><hr>
                    <span id="fieldtitle">Password</span><input type="text" name="password"><hr>
                    <span id="fieldtitle">Foto de Perfil</span><img src="view/img/icon-user-default.png" alt="">
                    <input type="file" name="picture">
                    <input type="hidden" value="view/img/icon-user-default.png" name="def_pic">
                    <input type="submit" value="Aceptar" class="nicebutton">
                </form>';
        }
        break;
}
?>
</div>