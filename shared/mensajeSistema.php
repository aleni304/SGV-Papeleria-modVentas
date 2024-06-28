<?php
class mensajeSistema
{
    public function mensajeSistemaShow($mensaje, $ruta)
    {
        ?>
        <h3><?php echo $mensaje?></h3>
        <br>
        <a href="<?php echo $ruta?>">Ir al inicio</a>
        <?php
    }
}
?>