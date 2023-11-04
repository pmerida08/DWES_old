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

$numTests = count($aTests);
$tiposDePermiso = array();

foreach ($aTests as $test) {
    $permiso = $test["Permiso"];
    if (!in_array($permiso, $tiposDePermiso)) {
        $tiposDePermiso[] = $permiso;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Examenes DGT</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Carnets Disponibles</h1>
    <form action="buscarExamen.php" method="post">
        Elige un tipo de permiso:
        <select id="opcion" name="permiso">
            <?php
                foreach ($tiposDePermiso as $clave => $permiso) {
                    $letraPermiso = explode(' ', $permiso);
                    $letraPermiso = end($letraPermiso);
                    echo "<option value='$letraPermiso'>$permiso</option>";
                }
            ?>
        </select>
        <input type="submit" value="Buscar Examenes" name="submit">
    </form>

</body>

</html>