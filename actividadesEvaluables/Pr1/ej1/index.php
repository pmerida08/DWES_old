<?php
/**
 * 
 * 
 * @author Pablo Merida Velasco
 * 
 * 1. Crear una aplicación que permita mediante un formulario practicar el
 * aprendizaje de los verbos irregulares en inglés.
 * Criterios de validación:
 * 
 * • Array de configuración con todos los verbos.
 * 
 * • Formulario configuración que permita seleccionar número de verbos y 
 * número de preguntas por verb. Incluye un input tipo text y una lista
 * desplegable.
 * 
 * • Formulario de entrada según los datos recogidos en el formulario de
 * configuración y mostrado conjuntamente.
 * 
 * • Validación del formulario mostrando el porcentaje de aciertos y marcando de
 * manera diferenciada los aciertos de los fallos.
 * 
 * • Opción que permita mostrar todas las respuestas.
 * 
 * • Aplicar estilos y criterios de usabilidad.
 * 
 */

 include('config/config.php');
 $showTest = false;

 if(isset($_POST['submit'])){
    $showTest = true;
    $numVerbs = intval($_POST['numVerbs']);
    $difficulty = intval($_POST['difficulty']);
    
 };

 function showTest(){
    global $arrayEnglish;
    shuffle($arrayEnglish);

    global $numVerbs;
    global $difficulty;

    if ($numVerbs > count($arrayEnglish)) {
        $numVerbs = count($arrayEnglish) - 1;
    }
    echo "<form method='post' action=''>"; 
    for ($i = 0; $i < $numVerbs; $i++) {
        $verb = $arrayEnglish[$i];
        echo "<ul class='list'>";
        $posiciones = array_rand([0, 1, 2, 3], $difficulty);

        if (!is_array($posiciones)) {
            $posiciones = [$posiciones];
        }

        for ($x = 0; $x <= 3; $x++) {
            if (in_array($x, $posiciones)) {
                echo "<li><input type='text' name='verb{$i}_{$x}' required></li>";
            } else {
                echo "<li>{$verb[$x]}</li>";
            }
        }
        echo "</ul>";
    }
    echo "<input type='submit' value='Enviar'>";
    echo "</form>";
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <style>
        * {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: beige;
            margin: 20px 30px;
        }
        p

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .list {
            list-style: none;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 20px;
            margin: 10px 30px;
            padding: 40px;
            text-align: center;
        }




    </style>
</head>
<body>
    <?php if (!$showTest) {?>
    <form action="" method="post">
        <label for="numVerbs">Dime el número de verbos que quieres:</label>
        <input type="number" name="numVerbs" min="1" required>
        <label for="difficulty">Que dificultad quieres:</label>
        <select name="difficulty" required>
            <option value="1">Nivel 1</option>
            <option value="2">Nivel 2</option>
            <option value="3">Nivel 3</option>
        </select>
        <input type="submit" name="submit" value="Enviar">
    </form>
    <?php }?>
    <?php
        if ($showTest) {
            showTest();
        }
    ?>
</body>
</html>

