<?php

/**
 * @author Pablo Mérida
 * 7 y media
 * 
 */

$barajaOriginal = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40"];
shuffle($barajaOriginal);

session_start();

if (!isset($_SESSION['baraja'])) {
    $_SESSION['baraja'] = $barajaOriginal;
}
if (!isset($_SESSION['jugador'])) {
    $_SESSION['jugador'] = 0;
}

if (!isset($_SESSION['maquina'])) {
    $_SESSION['maquina'] = 0;
}

if (!isset($_COOKIE['victoriasJugador'])) {
    setcookie('victoriasJugador', 0, time() + 3600);
}

if (!isset($_SESSION['arrayCardsJugador'])) {
    $_SESSION['arrayCardsJugador'] = [];
}
if (!isset($_SESSION['arrayCardsMaquina'])) {
    $_SESSION['arrayCardsMaquina'] = [];
}

$opc = $_GET['opc'] ?? 0;

function pedirCarta()
{
    $carta = array_pop($_SESSION['baraja']);
    return $carta;
}

function calcularPuntuacion($carta)
{
    return ($carta % 10 > 0 and $carta % 10 < 8) ? $carta % 10 : 0.5;
}

function jugar($jugador)
{

    $carta = pedirCarta();
    $_SESSION[$jugador] += calcularPuntuacion($carta);

    if ($jugador == 'jugador') {
        array_push($_SESSION['arrayCardsJugador'], $carta);
    } else {
        array_push($_SESSION['arrayCardsMaquina'], $carta);
    }

    $_SESSION['baraja'] = array_values($_SESSION['baraja']);
}

function comprobarGanador()
{
    if ($_SESSION['jugador'] > 7.5 || ($_SESSION['jugador'] <= $_SESSION['maquina'] && $_SESSION['maquina'] <= 7.5)) {
        echo "<h2>Has perdido</h2>";
    } elseif ($_SESSION['jugador'] > $_SESSION['maquina'] || $_SESSION['maquina'] > 7.5) {
        echo "<h2>Has ganado</h2>";
        $victoriasActuales = $_COOKIE['victoriasJugador'];
        setcookie('victoriasJugador', ++$victoriasActuales, time() + 3600);
    } else {
        echo "<h2>Empate</h2>";
    }
}

switch ($opc) {
    case '1':
        $_SESSION['baraja'] = $barajaOriginal; // Reiniciar baraja
        $_SESSION['jugador'] = 0;
        $_SESSION['maquina'] = 0;
        $_SESSION['arrayCardsJugador'] = [];
        $_SESSION['arrayCardsMaquina'] = [];
        break;
    case '2':
        jugar('jugador');
        jugar('maquina');
        break;
    case '3':
        comprobarGanador();
        break;
    case '4':
        session_destroy();
        setcookie('victoriasJugador', 0, time() + 3600);
        break;
    default:
        break;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barajas: 7 y media</title>
</head>

<body>
    <h1>7 y media (Juego baraja española)</h1>

    <h2>Número de victorias <?= $_COOKIE['victoriasJugador'] ?></h2>

    <a href="?opc=1">Reiniciar partida</a> |
    <a href="?opc=2">Pedir carta</a> |
    <a href="?opc=3">Plantar</a> |
    <a href="?opc=4">Reiniciar contador victorias</a>

    <h2>Jugador <?= $_SESSION['jugador'] ?></h2>
    <div class="baraja">
        <?php
        $arrayCardsJugador = $_SESSION['arrayCardsJugador'];
        foreach ($arrayCardsJugador as $carta) {
            echo "<img src='img/$carta.jpg' alt='$carta'>";
        }
        ?>
    </div>

    <h2>Maquina <?= $_SESSION['maquina'] ?></h2>
    <div class="baraja">
        <?php
        $arrayCardsMaquina = $_SESSION['arrayCardsMaquina'];
        foreach ($arrayCardsMaquina as $carta) {
            echo "<img src='img/$carta.jpg' alt='$carta'>";
        }
        ?>
    </div>

</body>

</html>