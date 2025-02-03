<?php

/**
 * @author Pablo
 * 
 * Crear una aplicación que permita practicar tests de autoescuela.
 * Criterios de validación:
 * 
 * • Los test se encuentran almacenados en un array asociativo dentro de un
 * directorio de configuración.
 * 
 * • Cada test utiliza un directorio para almacenar las fotos que necesita. El
 * nombre de la carpeta es la concatenación de la cadena “dir_img_test” y el
 * número de test. Por ejemplo, para el test 1 las imágenes se guardan en el
 * directorio dir_img_test1.
 * 
 * • El nombre de cada foto se forma con la concatenación de la cadena “img” y
 * el id de la pregunta. Por ejemplo, img1.jpg correspondería a la imagen de la
 * primera pregunta.
 * 
 * • Formulario que muestre a los estudiantes una lista desplegable con los tests
 * disponibles. La lista debe incluir id, tipo de permiso de conducir y categoría.
 * 
 * • Formulario con las preguntas del test seleccionado por el estudiante.
 * 
 * • Procesamiento del formulario mostrando el resultado del test realizado,
 * indicando las respuestas correctas e incorrectas.
 * 
 * • Utilización de emoticonos para marcar el test como SUPERADO o NO
 * SUPERADO.
 */

include("config/tests_cnf.php");

// Cargamos los test disponibles del array original 
foreach ($aTests as $test) {
    $test_disponibles[] = [$test['idTest'], $test['Permiso'], $test['Categoria']];
}


if (isset($_COOKIE['numtest'])) {
    $numtest = $_COOKIE['numtest'];
}


if (isset($_POST['procesarFormTest'])) {
    $procesarFormTest = true;
    $numtest = $_POST['test'];

    $aTestActual = $aTests[$numtest]['Preguntas'];
    $rutaImagen = 'dir_img_test' . $aTests[$numtest]['idTest'] . "/";
}


if (isset($_POST['procesarExamTest'])) {
    $numtest = $_POST['test'];
    var_dump($_POST['procesarExamTest']);
    $aTestActual = $aTests[$numtest]['Preguntas'];

    $aciertos = 0;
    $fallos = 0;
    $preguntasFalladas = [];

    $aCorrectas = $aTests[$numtest]['Corrector'];
    foreach ($_POST as $pregunta => $respuesta) {
        if($pregunta != 'procesarExamTest'){
            if($respuesta == $aCorrectas[$pregunta - 1]){
                $aciertos++;
            } else {
                $fallos++;
                $preguntasFalladas[] = $pregunta;
            }

        }
        
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test examen</title>
</head>

<body>
    <h1>Test Examen</h1>
    <form action="" method="post">
        <label for="test">
            <?php 
            ?>
            <select name="test" id="test">
                <?php
                foreach ($test_disponibles as $key => $test) {
                    $selected = ($_POST['test'] == $test[0] - 1) ? "selected" : "";
                    echo "<option value='" . ($test[0] - 1) . "' $selected >{$test[0]} - {$test[1]} - {$test[2]}</option>";
                }

                ?>
            </select>
        </label><br><br>

        <input type="submit" name="procesarFormTest" value="Cargar test">
    </form>

    <?php
    if (isset($procesarFormTest)) {
        echo "<h2>Se va a realizar el test " . $numtest + 1 . "</h2>";
    ?>
        <form action="" method="post">
            <?php
            $letras = ['a', 'b', 'c'];

            foreach ($aTestActual as $preguntas => $value) {
                $img = $rutaImagen . 'img' . $value['idPregunta'] . '.jpg';

                echo "<h3>" . $value['Pregunta'] . "</h3><br>";
                if (file_exists($img)) {
                    echo '<img src="' . $img . '" alt="imagen de pregunta"><br>';
                }

                foreach ($value['respuestas'] as $letra => $respuesta) {
                    echo "<input type='radio' name='" . $value['idPregunta'] . "'value='".$letras[$letra]."'>";
                    echo "<label for='pregunta'>" . $respuesta . "</label><br>";
                }
                echo "<br>";
            }
            ?>
            <input type="submit" name="procesarExamTest" value="Corregir test">
        </form>

    <?php
    }
    ?>

    <?php
    if (isset($aciertos) && isset($fallos)) {
        echo "<h2>Resultado del test</h2>";
        echo "<p>Aciertos: $aciertos</p>";
        echo "<p>Fallos: $fallos</p>";
        echo "<p>Preguntas falladas: ";
        foreach ($preguntasFalladas as $pregunta) {
            echo "$pregunta ";
        }
        echo "</p>";
    }
    ?>
    <!-- echo "<img src=\"".$foto."\" alt=\"foto\">" -->
</body>

</html>