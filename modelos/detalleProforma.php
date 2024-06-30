<?php
include_once ("../modelos/conexion.php");

class detalleProforma extends conexion
{
    public function registrarDetalleProforma($idProforma, $idProducto, $cantidad, $subtotal)
    {
        $sql = "INSERT INTO detalleProforma (idproforma, idproducto, cantidad, subtotal) VALUES ('$idProforma', '$idProducto', '$cantidad', '$subtotal')";
        /*$respuesta = mysqli_query($this->getConexion(), $sql);
        $this->desConexion();
        return $respuesta !== false;*/
        $conexion = $this->getConexion();
        
        if ($conexion->query($sql) === TRUE) {
            $this->desConexion();
            return true;
        } else {
            // Manejo de error si la inserción falla
            echo "Error: " . $sql . "<br>" . $conexion->error;
            $this->desConexion();
            return false;
        }
    }
}