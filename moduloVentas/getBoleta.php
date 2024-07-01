<?php
session_start();

//Funciones -----------------------------
function validarBoton($boton)
{
    if (isset($boton)) {
        return true;
    } else {
        return false;
    }
}

$btnRegistrarDespacho = $_POST['btnRegistrarDespacho'] ?? null;
$btnVerDetalleBoleta = $_POST['btnVerDetalleBoleta'] ?? null;

if (validarBoton($btnRegistrarDespacho)) {
    include_once ("../moduloVentas/controlRegistrarDespacho.php");
    $objControlRegistrarDespacho = new controlRegistrarDespacho();
    $objControlRegistrarDespacho->listarBoletasBD();
} else if (validarBoton($btnVerDetalleBoleta)) {
    $idBoleta = (int)$_POST['idBoleta'];
    include_once ("../moduloVentas/controlRegistrarDespacho.php");
    $objControlRegistrarDespacho = new controlRegistrarDespacho();
    $objControlRegistrarDespacho->obtenerDatosDetalleBoleta($idBoleta);
} else {
    include_once ("../shared/mensajeSistema.php");
    $objMensajeSistema = new mensajeSistema();
    $objMensajeSistema->mensajeSistemaShow("Alto acceso no permitido", "index.php", "systemOut");
}