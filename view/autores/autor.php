<div>
    <table id="autor">
        <tr>
            <td>
                <?php
                if(strlen($data[0][picurl]) <= 0)
                    echo '<img class="image" src="view/img/icon-user-default.png">';
                else
                    echo '<img class="image" src="'.$data[0]['picurl'].'"">';
                ?>
            </td>
            <td>
                <?php echo '<span id="name">'.$data[0]['nombre_autor'].'</span><span id="surname">'.$data[0]['seudonimo'].'</span><hr><span id="biography">'.$data[0]['biografia'].'</span>'; ?>
            </td>
        </tr>
    </table>
</div>