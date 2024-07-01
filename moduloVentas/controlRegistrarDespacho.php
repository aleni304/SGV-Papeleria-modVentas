<?php
class controlRegistrarDespacho {
    public function listarBoletasBD(){
        include_once("../modelos/boleta.php");
        $objBoleta = new boleta();
        $listaBoletas = $objBoleta->listarBoletas();
        include_once("../moduloVentas/formRegistrarDespacho.php");
        $objFormRegistrarDespacho = new formRegistrarDespacho();
        $objFormRegistrarDespacho->formRegistrarDespachoShow($listaBoletas);
    }

    public function obtenerDatosDetalleBoleta($idBoleta){
        include_once("../modelos/detalleBoleta.php");
        $objDetalleBoleta = new detalleBoleta();
        $detalleBoleta = $objDetalleBoleta->obtenerDetalleBoleta($idBoleta);
        include_once("../moduloVentas/formVerDetalleBoleta.php");
        $objFormVerDetalleBoleta = new formVerDetalleBoleta();
        $objFormVerDetalleBoleta->formVerDetalleBoletaShow($detalleBoleta);
    }
}