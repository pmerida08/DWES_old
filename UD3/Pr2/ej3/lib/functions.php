<?php

function existeCoordenada ($fila ,$columna, $array) : bool {
    $lexiste = false;
    foreach ($array as $clave => $valor) {
        if (($valor['f'] == $fila) and $valor['c'] == $columna) {
            $lexiste = true;
        }
    }
    return $lexiste;
}