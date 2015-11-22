<div id="datadiv">
    <?php
    if(isset($_POST['searchstring']))
        echo '<h2>Resultados</h2>';
    else
        echo '<p id="loremimpsum">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam porta lacinia arcu et euismod. Etiam aliquet pulvinar porttitor. Curabitur porta, odio a porttitor bibendum, justo dolor finibus libero, quis feugiat nulla leo in odio. Sed elementum malesuada felis at congue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis lobortis dolor id vulputate molestie. Cras tempor dui non mi egestas interdum. Nulla at accumsan mauris. Suspendisse sem nulla, iaculis sit amet erat ullamcorper, gravida ullamcorper tellus.<p>';
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