<?php

// function calcPasswd: Esta función calcula la password de un dni que se pasa como parámetro, y devuelve el valor del array passwords.
function calcPasswd($dni)
{
    // Aquí compruebo que lo que le paso es un DNI válido
    if (preg_match('/[0-9]{7,8}[A-Z]/', $dni)) {

        //array. Lista de passwords.
        $passwords = ["array", "for", "while", "foreach", "if", "function", "echo", "switch"];
        $sum = 0;
        $splitDni = str_split($dni);

        foreach ($splitDni as $d) {
            $sum += intval($d);
        }

        $rest = $sum % 7;
        return $passwords[$rest];
    } else {
        return 'DNI no válido';
    }
}

// Aquí compruebo que el formulario tenga como método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        echo "Tu password es: " . calcPasswd($_POST['dni']);
    }
}
