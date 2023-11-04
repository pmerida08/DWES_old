<?php

/**
 * @author Andres
 */
if (!isset($_POST["mostrar"])) {
    header("Location: buscarExamen.php");
}
include("config/tests_cnf.php");
$idExamen = $_POST["examen"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen DGT</title>
    <link rel="stylesheet" href="css/mostrarExamen.css">
</head>

<body>
    <h1>Examen <?php echo $idExamen?></h1>
    <form action="corregirTest.php" method="post">
        <?php
        foreach ($aTests as $test) {
            $idTest = $test["idTest"];
            if ($idExamen == $idTest) {
                $preguntas = $test["Preguntas"];
                foreach ($preguntas as $pregunta) {
                    $respuestas = $pregunta["respuestas"];
                    echo '<fieldset>';
                    echo '<legend>' . $pregunta['Pregunta'] . '</legend>';

                    foreach ($respuestas as $indice => $respuesta) {
                        echo "<input type='radio' name='pregunta-{$pregunta['idPregunta']}' value='{$indice}'> {$respuesta} <br>";
                    }
                    $rutaImg = "dir_img_test$idExamen/img{$pregunta['idPregunta']}.jpg";

                    if (file_exists($rutaImg)) {
                        echo "<img src='$rutaImg'>";
                    }
                    echo '</fieldset>';
                }
                echo "<input type='hidden' name='idTest' value='$idTest'>";
            }
        }
        ?>
        <input type="submit" name="corregir" value="Corregir">
    </form>

</body>

</html>