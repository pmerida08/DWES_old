<?php

/**
 * Ejemplo de login con usuario y contrasenia
 */

include("config/users.php");

function checkUsers($listUsers, $user, $passwd)
{
    $userExists = false;

    foreach ($listUsers as $u => $p) {
        if ($u == $user && $p == $passwd) {
            $userExists = true;
            break;
        }
    }

    
    if ($userExists) { 
        echo "<span class='checking'>Has iniciado sesión con éxito</span>";
    } else {
        echo "<span class='checking'>El usuario o la contraseña no son válidos</span>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <h2>Iniciar sesión</h2>
    <div class="card">
        <form action="login.php" method="post">
            <label for="user">Usuario:
                <input type="text" name="user">
            </label><br>
            <label for="passwd">Contraseña:
                <input type="text" name="passwd">
            </label><br>

            <button type="submit" name="submit">Entrar</button>
        </form>
    </div>

</body>

</html>