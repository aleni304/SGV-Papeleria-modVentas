<?php
include_once("../modelos/conexion.php");

class boleta extends conexion {
    public function listarBoletas() {
        $sql = "SELECT * FROM boleta WHERE Estado = 'Pendiente';";
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

    public function listarBoletasBusqueda($idboleta) {
        $sql = "SELECT * FROM boleta WHERE Estado = 'Pendiente' AND IDBoleta = '$idboleta';";
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

    public function actualizarBoleta($idboleta){
        $sql = "UPDATE boleta SET Estado = 'Despachada' WHERE IDBoleta = '$idboleta'";
        $conexion = $this->getConexion();
        
        if ($conexion->query($sql) === TRUE) {
            $this->desConexion();
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
            $this->desConexion();
            return false;
        }
    }

}