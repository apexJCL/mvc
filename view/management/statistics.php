<div id="statistics">
    <div id="title">Estadísticas Generales</div>
    <div id="data">
        <span id="data">
            Estadísticas del <?php echo $data['fecha'];?>
        </span>
        <span id="data">
            Visitas a la página: <?php echo $data['visitas'] ?>
        </span>
        <span id="data">
            Nuevos usuarios: <?php echo $data['usuarios_nuevos'];?>
        </span>
        <span id="data">
            Comentarios nuevos: <?php echo $data['comentarios_nuevs'];?>
        </span>
    </div>
    <div id="selector">
        <span id="title">Cambiar dia</span>
        <select name="fecha" id="changeday" class="nicedropdown">
            <?php
            foreach($available as $day){
                echo '<option value="'.$day['id'].'">'.$day['fecha'].'</option>';
            }
            ?>
        </select>
    </div>
</div>