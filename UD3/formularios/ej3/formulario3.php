<?php
    /**
     * Script de formulario
     * 
     * @author Pablo Mérida Velasco
     * @version 0.01a
     * 
     */

     $info = array("nombre", "apellidos");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
<form method="post">
    <?php 
        foreach ($info as $input => $value) {
            echo "<input type='text' name='$value' placeholder='$value'. ':' value=''";
            echo "<br><br>";
        }
    ?>
        <input type="submit" name="Enviar">
    </form>
</body>
</html>