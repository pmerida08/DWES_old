<?php

/**
 * 
 * @author Pablo Merida Velasco
 * 
 * 4. Mostrar paleta de colores. Utilizar una tabla que muestre el color y el valor hexadecimal que le corresponde. Cada celda será un enlace a una página que mostrará un fondo de pantalla con el color seleccionado. ¿Puedes hacerlo con los conocimientos que tienes?
 */

 $colores = array(
    "#FF0000",
    "#00FF00",
    "#0000FF",
    "#FFFF00",
    "#FF00FF",
    "#00FFFF",
    "#FFA500",
    "#800080",
    "#008000",
    "#008080",
    "#800000",
    "#FFC0CB",
    "#00FF7F",
    "#FFD700",
    "#008080",
    "#9400D3",
    "#FF4500",
    "#191970",
    "#00CED1",
    "#FF1493",
    "#2E8B57",
    "#8A2BE2",
    "#FF6347",
    "#7FFF00",
    "#483FF0");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <style>
        table{
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        td {
            padding: 20px;
        }
    </style>
</head>
<body>
    <table>
        <?php 
            for ($i=0; $i < 5; $i++) { 
                echo '<tr>';
                for ($j=0; $j < 5; $j++) {
                    $indice = $i * 5 + $j; 
                    $color = $colores[$indice];
                    echo "<td bgcolor=".$colores[$indice]."><a href='colors.php'>.$colores[$indice].</a></td>";
                }
                echo '</tr>'; 
            };      
        ?>
    </table>
</body>
</html>