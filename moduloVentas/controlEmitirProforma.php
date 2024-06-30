<?php
class controlEmitirProforma
{
    public function listarProductosBD()
    {
        include_once ("../modelos/producto.php");
        $objProducto = new producto();
        $listaProductos = $objProducto->listarProductos();
        include_once ("../modelos/categoria.php");
        $objCategoria = new categoria();
        $listaCategoria = $objCategoria->listarCategoria();
        include_once ("formEmitirProforma.php");
        $objFormEmitirProforma = new formEmitirProforma();
        $objFormEmitirProforma->formEmitirProformaShow($listaProductos, $listaCategoria);
    }

    public function listarBusquedaProductos($txtBuscarProducto)
    {
        include_once ("../modelos/producto.php");
        $objProducto = new producto();
        $listaProductos = $objProducto->obtenerProductosBusqueda($txtBuscarProducto);
        include_once ("../modelos/categoria.php");
        $objCategoria = new categoria();
        $listaCategoria = $objCategoria->listarCategoria();
        include_once ("formEmitirProforma.php");
        $objFormEmitirProforma = new formEmitirProforma();
        $objFormEmitirProforma->formEmitirProformaShow($listaProductos, $listaCategoria);
    }

    public function emitirProforma($listaProductos, $totalProforma)
    {
        include_once ("../shared/mensajeSistema.php");
        $objMensajeSistema = new mensajeSistema();
        $fecha = date("Y-m-d H:i:s");
        $idUsuario = $_SESSION["idUsuario"];
        include_once ("../modelos/proforma.php");
        $objProforma = new proforma();
        $idProforma = $objProforma->insertarProforma($idUsuario, $fecha, $totalProforma);
        include_once ("../modelos/detalleProforma.php");
        $objDetalleProforma = new detalleProforma();
        foreach ($listaProductos as $listaProducto) {
            $idProducto = $listaProducto["idProducto"];
            $cantidad = $listaProducto["cantidad"];
            $subtotal = $listaProducto["subtotal"];
            $respuesta = $objDetalleProforma->registrarDetalleProforma($idProforma, $idProducto, $cantidad, $subtotal);
        }
        if ($respuesta) {
            $objMensajeSistema->mensajeSistemaShow("Proforma generada con éxito", "index.php", "systemOut", true);
        } else {
            $objMensajeSistema->mensajeSistemaShow("Oops! Parece que algo salió mal.", "index.php", "systemOut");
        }
    }
}
