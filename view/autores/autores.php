<div id="datadiv">
    <?php
    if(isset($_POST['searchstring']))
        echo '<h2>Resultados</h2>';
    else
        echo '<p id="loremimpsum">Busque un autor del lado izquierdo.<p>';
    ?>
    <table class="datos">
        <?php foreach ($results as $data): ?>
            <tr>
                <td>
                    <?php
                    ChromePhp::log($data['nombre_autor']);
                    echo '<a id="searchlink" class="searchlink" href="index.php?autor='.$data['id_autor'].'">'.$data['nombre_autor'].'</a>';
                    ?>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
</div>