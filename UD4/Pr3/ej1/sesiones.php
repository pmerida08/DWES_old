<?php

/**
 * @author Pablo Merida Velasco
 * 
 * 
 * 
 */

include("config/usuario.php");

//Iniciamos sesion

session_start();

if (!isset($_SESSION["auth"])) {
    $_SESSION["auth"] = false;
    $_SESSION["user"] = "invitado";
}

$auth = $_SESSION["auth"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Autentificación básica</h1>
    <?php
        if ($auth) {
            echo "<p>Bienvenido ".$user."</p>";
            echo "<a href='./cerrarSesion.php'></a>";

        } else {
            include("./include/loginForm.php");
        }
    ?>
</body>
</html>