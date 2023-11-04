<?php

/**
 * @author Andres
 */
if (!isset($_POST["corregir"])) {
    header("Location: buscarExamen.php");
}
include("config/tests_cnf.php");
$idTest = $_POST["idTest"];
$aciertos = 0;
$fallos = 0;
$preguntasFalladas = array();

foreach ($aTests as $test) {
    if ($test["idTest"] == $idTest) {
        $correciones = $test["Corrector"];
        for ($i = 1; $i <= 10; $i++) {
            if (isset($_POST["pregunta-$i"])) {
                if ($correciones[$i - 1] == "a") {
                    $respuestaTest = 0;
                    if ($respuestaTest == $_POST["pregunta-$i"]) {
                        $aciertos++;
                    } else {
                        $fallos++;
                        $preguntasFalladas[] = "Pregunta-$i";
                    }
                } elseif ($correciones[$i - 1] == "b") {
                    $respuestaTest = 1;
                    if ($respuestaTest == $_POST["pregunta-$i"]) {
                        $aciertos++;
                    } else {
                        $fallos++;
                        $preguntasFalladas[] = "Pregunta-$i";
                    }
                } else {
                    $respuestaTest = 2;
                    if ($respuestaTest == $_POST["pregunta-$i"]) {
                        $aciertos++;
                    } else {
                        $fallos++;
                        $preguntasFalladas[] = "Pregunta-$i";
                    }
                }
            } else {
                $fallos++;
                $preguntasFalladas[] = "Pregunta-$i";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corrección Test <?php echo $idTest ?></title>
    <link rel="stylesheet" href="css/corregirTest.css">
</head>

<body>
    <h1>Test Finalizado</h1>
    <?php
    if ($fallos >= 3) {
        echo "<h3 class= 'suspenso'>No has aprobado &#128546</h3>";
    } else {
        echo "<h3 class= 'aprobado'>Has aprobado &#128515</h3>";
    }
    ?>
    <h2>Aciertos: <?php echo $aciertos ?></h2>
    <h2>Fallos: <?php echo $fallos ?></h2>
    <h3>Has fallado en las siguientes preguntas</h3>
    <?php
    foreach ($preguntasFalladas as $key => $value) {
        echo $value . "</br>";
    }
    ?>

    <a href="index.php">Volver al Inicio</a>
</body>

</html>