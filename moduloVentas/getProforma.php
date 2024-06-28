<?php
session_start();

function validarBoton($boton)
{
    if (isset($boton)) {
        return true;
    } else {
        return false;
    }
}

$btnEmitirProforma = $_POST['btnEmitirProforma'] ?? null;


if (validarBoton($btnEmitirProforma)) {
    include_once("controlEmitirProforma.php");
    $objControlEmitirProforma = new controlEmitirProforma();
    $objControlEmitirProforma->listarProductosBD();
} else {
    include_once("../shared/mensajeSistema.php");
    $objMensajeSistema = new mensajeSistema();
    $objMensajeSistema->mensajeSistemaShow("Alto acceso no permitido","index.php");
}
?>