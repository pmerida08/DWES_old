<?php
$nombre = "Pablo";
$edad = 33;

$mensaje = <<<EOD
¡Hola $nombre!
Bienvenido a nuestro sitio web.
Sabemos que tienes $edad años de edad.
Esperamos que disfrutes tu visita.
EOD;

echo $mensaje;

?>