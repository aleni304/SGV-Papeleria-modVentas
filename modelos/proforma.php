<?php
include_once ("../modelos/conexion.php");
class proforma extends conexion
{
    public function insertarProforma($idUsuario, $fecha, $hora, $totalProforma)
    {
        $sql = "INSERT INTO proforma (idusuario, fechaEmision, horaEmision, estado, importe) VALUES ('$idUsuario', '$fecha', '$hora', 'Pendiente', '$totalProforma')";
        $conexion = $this->getConexion();
        
        if ($conexion->query($sql) === TRUE) {
            $idProforma = $conexion->insert_id;
            $this->desConexion();
            return $idProforma;
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
            $this->desConexion();
            return false;
        }
    }
}