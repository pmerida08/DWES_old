<?php
/**
 * 
 * @author Pablo Merida Velasco
 * 
 * Crear una variable de sesion para contar.
 */

 // Iniciamos sesion
 session_start();

 if (!isset($_SESSION["count"])) {
    $_SESSION["count"] = 0;
 }

 $_SESSION["count"]++;
 
 $contador = $_SESSION["count"];

 

 if (isset($_SESSION["count"])) {
    unset($_SESSION);

    session_destroy();
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <h1>Contador</h1>
    <h2><?php echo $contador ?></h2>
</body>
</html>