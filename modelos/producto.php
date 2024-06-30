<?php
include_once ('conexion.php');
class producto extends conexion
{
    public function listarProductos()
    {
        $sql = "SELECT * FROM producto;";
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

    public function obtenerProductosBusqueda($txtBuscarProducto)
    {
        $terminos = explode(' ', $txtBuscarProducto);
        $condiciones = [];
        foreach ($terminos as $termino) {
            $condiciones[] = "(LOWER(codigo) LIKE '%$termino%' OR LOWER(nombre) LIKE '%$termino%')";
        }

        $sql = "SELECT * FROM producto WHERE " . implode(' AND ', $condiciones);
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

?>