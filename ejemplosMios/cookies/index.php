<?php

//Establecer una cookie

// Parámetros de setcookie: nombre, valor, caducidad, ruta, dominio, seguridad
setcookie("nombre_cookie", "valor_cookie", time() + 3600);

//Recuperar el valor de una cookie

if (isset($_COOKIE["nombre_cookie"])) {
    $valor = $_COOKIE["nombre_cookie"];
    echo "El valor de la cookie es: " . $valor;
} else {
    echo "La cookie no está seteada.";
}

// Establecer tiempo de expiración en el pasado
setcookie("nombre_cookie", "", time() - 3600, "/");

// echo "<br>";
// echo $_COOKIE["nombre_cookie"];

