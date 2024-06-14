<?php
require_once '../app/Config/config.php';

session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelo Vista Controlador</title>
</head>

<body>
    <h1>FaMia - Carta</h1>

    <?php

    global $aProductos;

    $request = $_SERVER['REQUEST_URI'];
    $productos = implode("/", array_slice(explode("/", $request), -1));

    foreach ($aProductos[$productos] as $prod) {
        echo "<form action='/carrito/add' method='post'>";
        echo "<img src='./img/{$prod['imagen']}' width='100px' height='100px'><br>";
        echo "<h2>{$prod['nombre']}</h2>";
        echo "<input type='hidden' name='producto' value='{$prod['nombre']}'>";

        if (is_array($prod['precio'])) {
            echo "<select name='tamanio'>";
            foreach ($prod['precio'] as $tamanio => $precio) {
                echo "<option value='{$tamanio}'>{$tamanio} - {$precio} €</option>";
                // echo "<input type='hidden' name='precio' value='{$precio}'>";
            }
            echo "</select><br><br>";
        } else {
            echo "<span name=>{$prod['precio']} €</span><br>";
            echo "<input type='hidden' name='precio' value='{$prod['precio']}'>";
        }
        echo "<input type='number' name='cantidad' min='1' max='10'><br><br>";
        echo "<button type='submit' name='enviar'>Añadir al carrito</button>";
        echo "</form>";
    }
    ?>
</body>

</html>