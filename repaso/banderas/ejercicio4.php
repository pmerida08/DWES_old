<?php
/**
 * @author lucia 
 * @date 01/10/2024
 * Crear una aplicación que almacene información de países: nombre capital y
 *bandera. Diseñar un formulario que permita seleccionar un país y nos muestre el
 *nombre de la capital y la bandera.
 */

// Array de países con su capital y bandera
include("./configpaises.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de Países</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .container {
            margin-top: 50px;
        }
        .country-info {
            margin-top: 20px;
        }
        .flag {
            width: 150px;
            height: auto;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Selecciona un país</h1> 
   <form method="POST" action="proecesarform.php">  <!--action para enviar el valor del formulario a otro archivo-->
        <label for="pais">País:</label>
        <select name="pais" id="pais" required>
            <option value="" disabled selected>Seleccione un país</option>
            <?php
            // Rellenar las opciones del select con los países del array
            foreach ($paises as $pais => $info) {
                echo "<option value=\"$pais\"" . ($pais == $selectedCountry ? ' selected' : '') . ">$pais</option>";
            }
            ?>
        </select>
        <br><br>
        <button type="submit" name="submit">Mostrar Información</button>
    </form>

   
</div>

</body>
</html>

