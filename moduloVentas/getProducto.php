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