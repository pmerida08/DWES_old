<?php

/**
 * @author Pablo Merida
 */

include("carrito.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compra</title>
</head>

<body>

    <header>
        <h1>faMia - Carrito de Compra</h1>
        <ul>
            <li><a href="pizzas.php">Pizzas</a></li>
            <li><a href="bebidas.php">Bebidas</a></li>
            <li><a href="postres.php">Postres</a></li>
        </ul>
    </header>
    <table>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Subtotal</th>
        </tr>

        <?php
        foreach ($aCarrito as $item) {
            $nombre = $item["nombre"];
            $cantidad = $item["cantidad"];
            $precio = $item["precio"];
            $subtotal = intval($cantidad) * intval($precio);
            echo "<tr>";
            echo "<td>$nombre</td>";
            echo "<td>$cantidad</td>";
            echo "<td>$precio €</td>";
            echo "<td>$subtotal €</td>";
            echo "</tr>";
        }
        ?>

    </table>
</body>

</html>