<?php

require_once '../app/Config/config.php';

session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$subtotal = $cantidad * intval($precio);


$_SESSION['carrito'][] = [
    'producto' => $producto,
    'cantidad' => $cantidad,
    'precio' => $precio,
    'subtotal' => $subtotal
];

header('Location: /list/pizzas');
