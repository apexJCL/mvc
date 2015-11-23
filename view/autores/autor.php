<?php

$data['picurl'] = '../img/jkrowling.jpg';
$data['nombre_autor'] = 'Joanne Rowling';
$data['pais_autor'] = 'Nepelandia';
$data['seudonimo'] = 'BK';

?>

<link rel="stylesheet" href="../css/style.css">
<div>
    <table class="autor">
        <tr>
            <td>
                <?php echo '<img class="image" src="'.$data['picurl'].'"alt="">'; ?>
            </td>
            <td>
                <?php echo $data['nombre_autor']; ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">Surname</td>
        </tr>
        <tr>
            <td colspan="2">Biography</td>
        </tr>
    </table>
</div>