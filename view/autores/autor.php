<div id="autor">
    <span id="header">
        <?php
        if(strlen($data[0][picurl]) <= 0)
            echo '<img class="image" src="view/img/icon-user-default.png">';
        else
            echo '<img class="image" src="'.$data[0]['picurl'].'"">';
        ?>
    <?php
    echo
        '<span id="name">'.$data[0]['nombre_autor'].'</span>
        <span id="surname">'.$data[0]['seudonimo'].'</span><hr>';
    ?>
    </span>
    <?php
        echo '<span id="biography"><p>'.$data[0]['biografia'].'</p></span>';
    ?>
</div>