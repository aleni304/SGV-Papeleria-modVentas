<?php
class controlEmitirProforma
{
    public function listarProductosBD()
    {
        include_once("../modelos/producto.php");
        $objProducto = new producto();
        $listaProductos = $objProducto->listarProductos();
        include_once("../modelos/categoria.php");
        $objCategoria = new categoria();
        $listaCategoria = $objCategoria->listarCategoria();
        include_once("formEmitirProforma.php");
        $objFormEmitirProforma = new formEmitirProforma();
        $objFormEmitirProforma->formEmitirProformaShow($listaProductos,$listaCategoria);
    }
}
?>