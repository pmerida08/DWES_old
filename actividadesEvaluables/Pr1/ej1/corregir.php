<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/corregir.css">
    <title>Resultados del Cuestionario</title>
</head>
<body>
    <?php
    include("config/verbos.php");

    if (isset($_POST["corregir"])) {
        $respuestas = $_POST["respuestas"];
        $puntuacion = 0;
        $resultadosHTML = '';

        foreach ($respuestas as $indiceVerbo => $respuestasVerbo) {
            foreach ($respuestasVerbo as $clave => $respuesta) {
                if ($respuesta == $verbos[$indiceVerbo][$clave]) {
                    $resultadosHTML .= "<p class='correct-answer'>Respuesta correcta para $respuesta</p>";
                    $puntuacion++;
                } else {
                    $resultadosHTML .= "<p class='wrong-answer'>Respuesta incorrecta para $respuesta: (La respuesta correcta es: {$verbos[$indiceVerbo][$clave]})</p>";
                    $mostrarFormInicio = false;
                }
            }
        }

        $totalPreguntas = count($respuestas);
        $porcentajeAciertos = ($puntuacion / $totalPreguntas) * 100;
        $resultadosHTML .= "<p class='result-score'>Puntuación: $puntuacion de $totalPreguntas preguntas correctas ($porcentajeAciertos%)</p>";

        $resultadosHTML .= "<a href='index.php' class='return-link'>Volver al inicio</a>";

        echo $resultadosHTML;
    }
    ?>
</body>
</html>
