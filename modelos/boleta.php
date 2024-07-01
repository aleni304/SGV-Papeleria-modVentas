<?php
include_once("../modelos/conexion.php");

class boleta extends conexion {
    public function listarBoletas() {
        $sql = "SELECT * FROM boleta WHERE estado = 'Pendiente';";
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