<?php

/**
 * @author Pablo Merida Velasco
 * Ejercicio 1
 */

include("config/config.php");

function seleccionarGrupo()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['select'])) {
        return $_POST['grupo'];
    }
}

function printHorario()
{
    global $horarios;

    $gSelected = seleccionarGrupo();

    foreach ($horarios as $grupo) {
        if ($grupo['grupo'] == $gSelected) {
            echo "<h2>{$grupo['grupo']}</h2>";
            echo "<table>";
            echo "<tr><th>Hora</th><th>Lunes</th><th>Martes</th><th>Miércoles</th><th>Jueves</th><th>Viernes</th></tr>";

            for ($i = 1; $i <= 6; $i++) {
                echo "<tr><td>{$i}ª Hora</td>";

                $diasSemana = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes'];

                foreach ($diasSemana as $dia) {
                    echo "<td>";

                    foreach ($grupo['horario'] as $asignatura) {
                        foreach ($asignatura['horas'] as $hora) {
                            if ($hora['Dia'] == $dia && $hora['Hora'] == $i . "ª") {
                                echo "{$asignatura['nombre']}<br>";
                            }
                        }
                    }

                    echo "</td>";
                }

                echo "</tr>";
            }

            echo "</table>";
            return;
        }
    }
    echo "<p>Selecciona el grupo que quieras ver su horario.</p>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pablo Merida Velasco horario</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <form action="" method="post">
        <label for="grupo">Grupo: </label>
        <select name="grupo" id="grupo">
            <option value="1º DAW A">1º DAW A</option>
            <option value="2º DAW A">2º DAW A</option>
        </select>
        <button type="submit" name="select">Seleccionar</button>
    </form>

    <?php
    printHorario();
    ?>
</body>

</html>
