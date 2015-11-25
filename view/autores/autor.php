<div>
    <table id="autor">
        <tr>
            <td>
                <?php echo '<img class="image" src="'.$data[0]['picurl'].'"alt="">'; ?>
            </td>
            <td>
                <?php echo '<span id="name">'.$data[0]['nombre_autor'].'</span><span id="surname">'.$data[0]['seudonimo'].'</span><hr>'.$data[0]['biografia']; ?>
            </td>
        </tr>
    </table>
</div>