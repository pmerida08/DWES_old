<?php

function calcDni($dni){
    # array indexado de passwords
    $palabras = array('for', 'if', 'else', 'while', 'function', 'array', 'php');
    # sumamos los caracteres del dni
    $sum = 0;
    for ($i = 0; $i < strlen($dni); $i++) {
        $sum += $dni[$i];
    }
    return $palabras[$sum % count($palabras)];
}

# determinamos si procesamos el formulario

if (isset($_POST['post'])) {
    
}

