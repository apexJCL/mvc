<h1>Autores</h1>
<div class="datadiv">
    <table class="datos" align="center">
        <tr>
            <th>Nombre</th>
            <th>País Origen</th>
            <th>Pseudónimo</th>
        </tr>
        <?php foreach ($lista_autores as $data): ?>
            <tr>
                <td><?php echo $data['nombre_autor'];?></td>
                <td><?php echo $data['pais_autor']; ?></td>
                <td><?php echo $data['seudonimo'];?></td>
            </tr>
        <?php endforeach;?>
    </table>
</div>