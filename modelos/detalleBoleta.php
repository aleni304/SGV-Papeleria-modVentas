<?php
include_once ("../modelos/conexion.php");

class detalleBoleta extends conexion
{
    public function obtenerDetalleBoleta($idBoleta)
    {
        $sql = "SELECT b.idboleta, b.numeroBoleta, p.codigo, p.nombre, d.cantidad, d.subtotal, b.total
                FROM detalleboleta d, producto p, boleta b WHERE d.idboleta = '$idBoleta' AND 
                p.idproducto = d.idproducto AND d.idboleta = b.idboleta;";
        $resultado = $this->getConexion()->query($sql);
        $filas = $resultado->num_rows;
        $this->desConexion();
        if ($filas == 0)
            return NULL;
        else {
            for ($i = 0; $i < $filas; $i++)
                $respuesta[$i] = mysqli_fetch_array($resultado);
            return $respuesta;
        }

    }

}