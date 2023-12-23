<?php

include("config.php");

session_start();

if (!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = array();
}

if (isset($_POST["submit"])) {
    if (isset($_POST["cantidad"])) {
        $productoNombre = $_POST["producto_nombre"];
        $cantidad = $_POST["cantidad"];
        $_SESSION["carrito"][$productoNombre] = $cantidad;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>faMia - Postres</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>faMia - Pizzas</h1>
        <ul>
            <li><a href="pizzas.php">Pizzas</a></li>
            <li><a href="bebidas.php">Bebidas</a></li>
            <li><a href="postres.php">Postres</a></li>
        </ul>
    </header>

    <a href="mostrarCarrito.php">Carrito:</a><?php echo isset($_SESSION["carrito"]) ? count($_SESSION["carrito"]) : 0; ?>

    <p>Seleccione productos: </p>

    <form action="" method="post">
        <?php
        foreach ($productos as $producto => $postres) {
            if ($producto == "postres") {
                foreach ($postres as $postre => $value) {
                    foreach ($value as $key => $valor) {
                        if ($key == "imagen") {
                            echo "<img src='img/$valor' width='100px'><br>";
                        }
                        if ($key == "nombre") {
                            $nombreProducto = $valor;
                            echo "<h2>$nombreProducto</h2>";
                            echo "<input type='hidden' name='producto_nombre' value='$nombreProducto'>";
                        }
                        if ($key == "precio") {
                            echo "<span>$valor €</span>
                                <input type='number' name='cantidad[]' value='' min='' max='10'><br>";
                        }
                    }
                }
            }
        }
        ?>
        <button type="submit" name="submit">Enviar</button>
    </form>

</body>

</html>