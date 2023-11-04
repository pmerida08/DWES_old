<?php

/**
 * @author Pablo
 * 
 * 1. Crear una aplicación que permita mediante un formulario practicar el
 * aprendizaje de los verbos irregulares en inglés.
 * Criterios de validación:
 * • Array de configuración con todos los verbos.
 * • Formulario configuración que permita seleccionar número de verbos y
 * número de preguntas por verbo. Incluye un input tipo text y una lista
 * desplegable.
 * • Formulario de entrada según los datos recogidos en el formulario de
 * configuración y mostrado conjuntamente.
 * • Validación del formulario mostrando el porcentaje de aciertos y marcando de
 * manera diferenciada los aciertos de los fallos.
 * • Opción que permita mostrar todas las respuestas.
 */
include("config/verbos.php");
$mostrarFormInicio = true;
$otroIntento = false;
$dificultad = 0;
$indiceVerbosAleatorios = array();

if (isset($_POST["submit"])) {
    $mostrarFormInicio = false;
    $numVerbos = intval($_POST["numVerbos"]);
    if ($numVerbos > count($verbos)) {
        $numVerbos = count($verbos);
    }
    while (count($indiceVerbosAleatorios) < $numVerbos) {
        $numeroAleatorio = rand(0, 75);
        if (!in_array($numeroAleatorio, $indiceVerbosAleatorios)) {
            $indiceVerbosAleatorios[] = $numeroAleatorio;
        }
    }
    $dificultad = intval($_POST["dificultad"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba verbos</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php if ($mostrarFormInicio) {
        include("include/solicitarVerbos.php");
    }else {
        include("include/formVerbos.php");
    }
    ?>
</body>

</html>