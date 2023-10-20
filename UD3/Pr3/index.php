<?php
/**
 * 
 * @author Pablo Merida Velasco
 * 
 */

 $arrayEj = array(1, 3, 4, 5); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 3</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>PRÁCTICA 3</h1>
    <ul>
        <?php
        for ($i=0; $i < count($arrayEj); $i++) { 
            echo "<a href=\"ej$arrayEj[$i]/index.php\">Ejercicio $arrayEj[$i]</a>";
        }
        ?>
    </ul>
</body>
</html>