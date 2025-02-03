<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6f2882733f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/aulas.css">
    <link rel="stylesheet" href="css/navbar.css">
</head>

<body>

    <h1 class="title">Multas de trafico</h1>
    <?php if ($_SESSION['perfil'] == 'invitado') {
    ?>
        <a href="/login" class="btn btn-secondary">Login</a>
    <?php
    }
    ?>
    <?php if ($_SESSION['perfil'] != 'invitado') {
    ?>
        <a href="/logout" class="btn btn-danger">Cerrar sesión</a>
    <?php
    }
    ?>
    <?php
    foreach ($data as $usuarios) {
        if ($_SESSION['perfil'] == 'conductor') {
            echo '<a href="/multas/' . $usuarios['id'] . '" class="btn btn-primary">Multas</a>';
            return;
        }

        if ($_SESSION['perfil'] == 'agente') {
            echo '<a href="/multas/add" class="btn btn-primary">Añadir Multas</a>';
            echo '<a href="/multas" class="btn btn-primary">Ver Multas</a>';
            return;
        }
    }


    ?>




</body>

</html>