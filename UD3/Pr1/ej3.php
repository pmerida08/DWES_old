<?php

/**
 * author: Pablo Mérida Velasco
 * date: 27/09/2023
 * 
 */

$dia = 27;
$mes = 9;
$anio = 2023;

$diaHoy = date("d");
$mesHoy = date("m");
$anioHoy = date("Y");

$edad = $anioHoy - $anio;

if (!($mes <= $mesHoy && $dia <= $diaHoy)) {
    $edad--;
}

print $edad;
