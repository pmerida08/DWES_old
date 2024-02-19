<?php

function getMensaje($nombre) {
    return "Hola " . $nombre;
}

$opciones = array('uri' => 'http://localhost/DWES/UD7/server_soap/Pr1/server.php');

$server = new SoapServer(null, $opciones);
$server->addFunction("getMensaje");
$server->handle();
?>