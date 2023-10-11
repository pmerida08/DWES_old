<?php

/**
 * 
 * @author Pablo Merida Velasco
 * 
 * 4. Mostrar paleta de colores. Utilizar una tabla que muestre el color y el valor hexadecimal que le corresponde. Cada celda será un enlace a una página que mostrará un fondo de pantalla con el color seleccionado. ¿Puedes hacerlo con los conocimientos que tienes?
 */


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <style>

        a {
            color: aliceblue;
        }
        table{
            min-height: 100vh;
            color:aliceblue;
        }

        td {
            padding: 20px;
        }
    </style>
</head>
<body>
    <table>
    <?php 
    $sumRgb = 20;
    for ($i=0; $i < 256; $i+=$sumRgb) {
        echo '<tr>';
        for ($j=0; $j < 256; $j+=$sumRgb) { 
            for ($k=0; $k < 256; $k+=$sumRgb) {
                $rgb = "rgb($i,$j,$k)";
                echo "<td style='background-color:$rgb'><a href='./color.php?color=".$rgb."'>$rgb</a></td>";
            }; 
        };
        echo '<tr>';
    };   
    ?>
    </table>
</body>
</html>