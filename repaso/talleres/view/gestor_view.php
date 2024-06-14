<?php

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/gestor.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="https://www.iesgrancapitan.org/wp-content/uploads/sites/2/2021/06/Logo_IES_GranCapitan_header.png" alt="logo" width="50" height="50" class="d-inline-block align-text-top">
        <div class="container-fluid">
            <h2 class="navbar-brand">Talleres</h2>
        </div>
        <li class="nav-item">
            <a href="/" class="nav-link">Volver</a>
            <a href="/logout" class="btn btn-danger">Cerrar sesión</a>
        </li>

    </nav>

    <section class="container">

        <h2>Dashboard</h2>

        <ul class="list-group">
            <?php
            echo '<li class="list-group-item"><a href="/gestor/aulas" class="text-decoration-none">Gestor de Aulas</a></li>';
            echo '<li class="list-group-item"><a href="/gestor/equipos" class="text-decoration-none">Gestor de Equipos</a></li>';
            echo '<li class="list-group-item"><a href="/gestor/alumnos" class="text-decoration-none">Gestor de Alumnos</a></li>';
            echo '<li class="list-group-item"><a href="/gestor/profesores" class="text-decoration-none">Gestor de Profesores</a></li>';
            echo '<li class="list-group-item"><a href="/gestor/reservas" class="text-decoration-none">Gestor de Reservas</a></li>';
            echo '<li class="list-group-item"><a href="/gestor/incidencias" class="text-decoration-none">Gestor de Incidencias</a></li>';
            ?>
        </ul>
    </section>
</body>

</html>