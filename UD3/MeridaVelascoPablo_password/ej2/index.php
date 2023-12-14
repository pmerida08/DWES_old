<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario y Cuestionario</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <h1>Formulario y Cuestionario</h1>

    <?php
    include('config/config.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // El formulario ha sido enviado, procesar respuestas
        mostrarResultados($cuestionario);
    } else {
        // Mostrar el formulario
        mostrarFormulario($cuestionario);
    }

    // function mostrarFormulario. Función para mostrar el formulario
    function mostrarFormulario($cuestionario)
    {

        global $idiomas;

        echo '<form method="post">';
        echo '<label for="nombre">Nombre:</label>';
        echo '<input type="text" name="nombre" required>';

        echo '<label for="idioma">Idioma:</label>';
        echo '<select name="idioma" required>';
        foreach ($idiomas as $idioma) {
            echo '<option value="' . $idioma . '">' . $idioma . '</option>';
        }
        echo '</select>';

        foreach ($cuestionario as $index => $pregunta) {
            echo '<p>Pregunta ' . ($index + 1) . ': ' . $pregunta['pregunta'] . '</p>';

            if ($pregunta['Tipo'] === 'text') {
                echo '<input type="text" name="respuesta' . $index . '" required>';
            } elseif ($pregunta['Tipo'] === 'Multiple-choice') {
                foreach ($pregunta['Opciones'] as $opcion) {
                    echo '<input type="checkbox" name="respuesta' . $index . '[]" value="' . $opcion . '">' . $opcion . '<br>';
                }
            }
        }

        echo '<button type="submit">Calificar</button>';
        echo '</form>';
    }

    // Función para mostrar los resultados
    function mostrarResultados($cuestionario)
    {
        echo '<div id="resultados">';
        echo '<h2>Resultados</h2>';
        echo '<div id="respuestas">';

        $respuestas = [];
        $totalAciertos = 0;
        $totalFallos = 0;

        foreach ($cuestionario as $index => $pregunta) {
            $respuestaUsuario = $_POST['respuesta' . $index];
            $respuestas[] = [
                'pregunta' => $pregunta['pregunta'],
                'respuestaUsuario' => $respuestaUsuario,
                'respuestaCorrecta' => $pregunta['Respuesta']
            ];

            if ($respuestaUsuario == $pregunta['Respuesta']) {
                $totalAciertos += $pregunta['Acierto'];
            } else {
                $totalFallos += $pregunta['Fallo'];
            }
        }

        // Mostrar resultados
        foreach ($respuestas as $respuesta) {
            echo '<p><strong>' . $respuesta['pregunta'] . '</strong><br>';
            echo 'Tu respuesta: ' . $respuesta['respuestaUsuario'] . '<br>';
            // if (is_string($respuesta['respuestaCorrecta'])) {
            //     echo 'Tu respuesta: ' . $respuesta['respuestaUsuario'] . '<br>';
            // } else {
            //     echo 'Tu respuesta: ' . implode(', ', $respuesta['respuestaUsuario']) . '</p>';
            // }

            if (is_string($respuesta['respuestaCorrecta'])) {
                echo 'Respuesta correcta: ' . $respuesta['respuestaCorrecta'] . '</p>';
            } else {
                echo 'Respuesta correcta: ' . implode(', ', $respuesta['respuestaCorrecta']) . '</p>';
            }
        }

        echo '</div>';
        echo '<p><strong>Total Aciertos:</strong> ' . $totalAciertos . '<br>';
        echo '<strong>Total Fallos:</strong> ' . $totalFallos . '</p>';
        echo '</div>';
    }
    ?>
</body>

</html>