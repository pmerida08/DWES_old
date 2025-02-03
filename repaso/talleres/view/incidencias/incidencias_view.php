<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incidencias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6f2882733f.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../css/incidencias.css">
    <link rel="stylesheet" href="../css/gestor.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>

<body>
    <?php
    $incidencias = $data['incidencias'];
    $aulas = $data['aulas'];
    $profesores = $data['profesores'];

    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="https://www.iesgrancapitan.org/wp-content/uploads/sites/2/2021/06/Logo_IES_GranCapitan_header.png" alt="logo" width="50" height="50" class="d-inline-block align-text-top">
        <div class="container-fluid">
            <h2 class="navbar-brand">Talleres</h2>
        </div>
        <li class="nav-item">
            <a href="/" class="nav-link">Volver</a>
        </li>

        <li class="nav-item">
            <a href="/logout" class="btn btn-danger">Cerrar sesión</a>
        </li>
    </nav>
    <h1>Incidencias</h1>
    <main class="flex-container">
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
        <section>
            <article class="container">
                <a href="/incidencias/add" class="btn" id="add_btn">Añadir</a>
            </article>

            <table class="table">
                <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Fecha solución</th>
                        <th>Aula asociado</th>
                        <th>Profesor autor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($incidencias as $incidencia) : ?>
                        <tr>
                            <td><?= $incidencia['descripcion'] ?></td>
                            <td><?= $incidencia['fecha'] ?></td>
                            <td><?= $incidencia['fecha_solucion'] ?></td>
                            <?php
                            foreach ($aulas as $aula) {
                                if ($incidencia['aulas_id'] == $aula['id']) {
                                    $aulaCodigo = $aula['codigo'];
                                }
                            }
                            ?>
                            <td><?= $aulaCodigo ?></td>
                            <?php
                            foreach ($profesores as $profesor) {
                                if ($incidencia['profesores_id'] == $profesor['id']) {
                                    $profesorNombre = $profesor['nombre'];
                                }
                            }
                            ?>
                            <td><?= $profesorNombre ?></td>
                            <td>
                                <a href="/incidencias/edit/<?= $incidencia['id'] ?>" class="btn btn-primary">Editar</a>
                                <a href="/incidencias/delete/<?= $incidencia['id'] ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
    <footer class="footer bg-dark text-white">
        <div class="container">
            <div class="row d-flex align-items-center">
                <p class="mb-0">&copy; <?php echo "IES GRAN CAPITÁN " . date("Y"); ?> | Avda Arcos de la Frontera s/n, Córdoba (Spain) | Tel: 957379710</p>
                <div class="socials">
                    <a href="https://www.facebook.com/iesgrancapitan" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://twitter.com/iesgrancapitan" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/iesgrancapitan/" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>