<?php

$opciones = array('location' => 'http://localhost/DWES/UD7/server_soap/Pr1/server.php', 
'uri' => 'http://localhost/DWES/UD7/server_soap/Pr1/server.php');

try {
    //Instanciamos un objeto de la clase SoapClient
    $cliente = new SoapClient(null, $opciones);

    $nombre = "Pablo";
    //LLamada al método del servidor SOAP
    $mensaje = $cliente->getMensaje($nombre);
    echo $mensaje;
} catch (SoapFault $e) {
    echo $e->getMessage();
}
?>