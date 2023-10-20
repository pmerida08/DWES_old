<?php
session_start();

if (isset($_SESSION['inicialTime'])) { 
    $tiempo_transcurrido = time();
    $tiempo_maximo = $_SESSION['inicialTime'] + ($_SESSION['intervaloTime'] * 8);

    if ($tiempo_transcurrido > $tiempo_maximo) {
        header("Location: salir.php");
        exit;
    }
} else {
    $_SESSION['inicialTime'] = time();
    $_SESSION['intervaloTime'] = 2;
}

if (isset($_POST['usuario'])) {
    $usuario = htmlentities($_POST['usuario']);
    setcookie('usuario', $usuario, $tiempo_maximo);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <form method="post">
        <input type="text" name="usuario" placeholder="Introduce nombre de usuario:">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
