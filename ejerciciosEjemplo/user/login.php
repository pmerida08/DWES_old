<?php

include('config/users.php');

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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $userInput = $_POST['user'];
        $passInput = $_POST['passwd'];

        checkUsers($usersList, $userInput, $passInput);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    
</body>
</html>