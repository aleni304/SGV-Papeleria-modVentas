<?php
include_once ("../modelos/conexion.php");

class detalleBoleta extends conexion
{
    public function obtenerDetalleBoleta($idBoleta)
    {
        $sql = "SELECT b.IDBoleta, p.idproducto, p.producto, d.cantidad, d.Importe, b.importe_total
                FROM detalle_boleta d, producto p, boleta b WHERE d.IDBoleta = '$idBoleta' AND 
                p.idproducto = d.idproducto AND d.IDBoleta = b.IDBoleta;";
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