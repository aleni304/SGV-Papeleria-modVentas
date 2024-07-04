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

function verificarCamposVacios($txtBuscarBoleta)
{
    return ($txtBuscarBoleta != "");
}

function verificarSoloNúmeros($txtBuscarBoleta)
{
    if (preg_match('/^\d+$/', $txtBuscarBoleta)) {
        return true;
    } else {
        return false;
    }
}

$btnRegistrarDespacho = $_POST['btnRegistrarDespacho'] ?? null;
$btnBuscarBoleta = $_POST['btnBuscarBoleta'] ?? null;
$btnVerDetalleBoleta = $_POST['btnVerDetalleBoleta'] ?? null;
$btnDespacharBoleta = $_POST['btnDespacharBoleta'] ?? null;

if (validarBoton($btnRegistrarDespacho)) {
    include_once ("../moduloVentas/controlRegistrarDespacho.php");
    $objControlRegistrarDespacho = new controlRegistrarDespacho();
    $objControlRegistrarDespacho->listarBoletasBD();

} else if ($btnBuscarBoleta) {
    $txtBuscarBoleta = $_POST['txtBuscarBoleta'];
    if (verificarCamposVacios($txtBuscarBoleta)) {
        if (verificarSoloNúmeros($txtBuscarBoleta)) {
            include_once ("../moduloVentas/controlRegistrarDespacho.php");
            $objControlRegistrarDespacho = new controlRegistrarDespacho();
            $objControlRegistrarDespacho->listarBoletasBusqueda($txtBuscarBoleta);
        } else {
            include_once ("../moduloVentas/controlRegistrarDespacho.php");
            $objControlRegistrarDespacho = new controlRegistrarDespacho();
            $objControlRegistrarDespacho->listarBoletasBD();

            include_once ("../shared/mensajeSistema.php");
            $objMensajeSistema = new mensajeSistema();
            $objMensajeSistema->mensajeSistemaShow("Alto acceso no permitido", "");
        }
    } else {
        include_once ("../moduloVentas/controlRegistrarDespacho.php");
        $objControlRegistrarDespacho = new controlRegistrarDespacho();
        $objControlRegistrarDespacho->listarBoletasBD();

        include_once ("../shared/mensajeSistema.php");
        $objMensajeSistema = new mensajeSistema();
        $objMensajeSistema->mensajeSistemaShow("Alto acceso no permitido", "");
    }

} else if (validarBoton($btnVerDetalleBoleta)) {
    $idBoleta = (int) $_POST['idBoleta'];
    include_once ("../moduloVentas/controlRegistrarDespacho.php");
    $objControlRegistrarDespacho = new controlRegistrarDespacho();
    $objControlRegistrarDespacho->obtenerDatosDetalleBoleta($idBoleta);

} else if (validarBoton($btnRegistrarDespacho)){
    $idBoleta = (int) $_POST['idBoleta'];
    include_once ("../moduloVentas/controlRegistrarDespacho.php");
    $objControlRegistrarDespacho = new controlRegistrarDespacho();
    $objControlRegistrarDespacho->despacharBoleta($idBoleta);
    
} else {
    include_once ("../shared/mensajeSistema.php");
    $objMensajeSistema = new mensajeSistema();
    $objMensajeSistema->mensajeSistemaShow("Alto acceso no permitido", "index.php", "systemOut");
}