<?php
/**
 * @author Pablo Merida
 */
session_start();
if (!isset($_SESSION["count"])) {
    $_SESSION["nombre"] = 'Pablo Merida';
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
 </head>
 <body>
    <h1><?php echo $_SESSION["nombre"]?></h1>
 </body>
</html>
