<?php
include_once ("../modelos/conexion.php");
class proforma extends conexion
{
    public function insertarProforma($idUsuario, $fecha, $totalProforma)
    {
        $sql = "INSERT INTO proforma (idusuario, fecha, estado, totalProforma) VALUES ('$idUsuario', '$fecha', 'Pendiente', '$totalProforma')";
        /*mysqli_query($this->getConexion(), $sql);
        $idProforma = mysqli_insert_id($this->getConexion());
        $this->desConexion();
        return $idProforma;*/
        $conexion = $this->getConexion();
        
        if ($conexion->query($sql) === TRUE) {
            $idProforma = $conexion->insert_id;
            $this->desConexion();
            return $idProforma;
        } else {
            // Manejo de error si la inserción falla
            echo "Error: " . $sql . "<br>" . $conexion->error;
            $this->desConexion();
            return false;
        }
    }
}