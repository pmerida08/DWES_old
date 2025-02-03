<?php
$equipos = $data['equipos'];
$profesores = $data['profesores'];
$incidencias = $data['incidencias'];
$aulas_id = $data['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6f2882733f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/aula.css">
    <link rel="stylesheet" href="../../css/gestor.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <script src="../../js/aula.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="https://www.iesgrancapitan.org/wp-content/uploads/sites/2/2021/06/Logo_IES_GranCapitan_header.png" alt="logo" width="50" height="50" class="d-inline-block align-text-top">
        <div class="container-fluid">
            <h2 class="navbar-brand">Talleres</h2>
        </div>
        <li class="nav-item">
            <?php
            if ($_SESSION['perfil'] == 'profesor') {
            ?>
                <a href="/gestor/aulas" class="nav-link">Volver</a>
            <?php
            } else {
            ?>
                <a href="/" class="nav-link">Volver</a>
            <?php
            }
            ?>
        </li>

        <li class="nav-item">
            <a href="/logout" class="btn btn-danger">Cerrar sesión</a>
        </li>
    </nav>


    <h1>Aula <?= $data['aula_codigo'] ?> - <?= $data['descripcion'] ?></h1>

    <article class="reverse">

        <?php

        for ($i = 1; $i <= $data['numero_mesas'] * 2; $i++) {
            if ($i % 2 == 1 || $i == 1) {
                echo '<div class="row">';
            }
        ?>

            <div class="card">
                <div class="card-body">
                    <form action="/ubicacion/change" method="post">
                        <h5 class="card-title">Puesto <?= $i ?></h5>
                        <?php
                        $css = '';

                        foreach ($equipos as $equipo) {
                            if (!empty($data['ubicacion'])) {
                                foreach ($data['ubicacion'] as $ubicacion) {
                                    if ($ubicacion['puesto'] == $i) {
                                        if ($ubicacion['equipos_id'] == $equipo['id']) {
                                            foreach ($data['estados'] as $estado) {
                                                if ($estado['id'] == $equipo['t_estados_id']) {
                                                    $css = $estado['css'];
                                                    break;
                                                }
                                            }
                                        }
                                        break;
                                    }
                                }
                            }
                        }
                        ?>
                        <select class="form-select equipo" name="equipo" style="<?= $css ?>">
                            <option value="">Selecciona un equipo</option>
                            <?php
                            foreach ($equipos as $equipo) {

                                $selected = '';
                                if (!empty($data['ubicacion'])) {
                                    foreach ($data['ubicacion'] as $ubicacion) {
                                        if ($ubicacion['puesto'] == $i) {
                                            if ($ubicacion['equipos_id'] == $equipo['id']) {
                                                $selected = 'selected';
                                            }
                                            break;
                                        }
                                    }
                                }

                                echo '<option ' . $selected . ' value="' . $equipo["id"] . '"> ' . $equipo["codigo"] . '</option> ';
                            }
                            ?>
                        </select>
                        <input type="hidden" name="puesto" value="<?= $i ?>">
                        <input type="hidden" name="aulas_id" value="<?= $aulas_id ?>">
                    </form>
                </div>
            </div>
        <?php
            if ($i % 2 == 0 ) {
                echo '</div>';
            }
        }
        // var_dump($data['ubicacion'])
        ?>

    </article>

    <div class="prof">
        <div class="card">
            <div class="card-body">
                <form action="/ubicacion/change" method="post">
                    <h5 class="card-title">Profesor</h5>
                    <?php
                    $css = '';

                    foreach ($equipos as $equipo) {
                        if (!empty($data['ubicacion'])) {
                            foreach ($data['ubicacion'] as $ubicacion) {
                                if ($ubicacion['puesto'] == 0) {
                                    if ($ubicacion['equipos_id'] == $equipo['id']) {
                                        foreach ($data['estados'] as $estado) {
                                            if ($estado['id'] == $equipo['t_estados_id']) {
                                                $css = $estado['css'];
                                                break;
                                            }
                                        }
                                    }
                                    break;
                                }
                            }
                        }
                    }
                    ?>
                    <select class="form-select equipo" name="equipo" style="<?= $css ?>">
                        <option value="">Selecciona un equipo</option>
                        <?php
                        foreach ($equipos as $equipo) {

                            $selected = '';
                            if (!empty($data['ubicacion'])) {
                                foreach ($data['ubicacion'] as $ubicacion) {
                                    if ($ubicacion['puesto'] == 0) {
                                        if ($ubicacion['equipos_id'] == $equipo['id']) {
                                            $selected = 'selected';
                                        }
                                        break;
                                    }
                                }
                            }

                            echo '<option ' . $selected . ' value="' . $equipo["id"] . '"> ' . $equipo["codigo"] . '</option> ';
                        }
                        ?>
                    </select>
                    <input type="hidden" name="puesto" value="0">
                    <input type="hidden" name="aulas_id" value="<?= $aulas_id ?>">
                </form>
            </div>
        </div>
    </div>


    <table class="table">
        <th>
            <h4>Incidencias</h4>
        </th>
        <tbody>

            <tr>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Fecha solución</th>
                <th>Profesor autor</th>
                <?php
                if ($_SESSION['perfil'] == 'profesor') {
                ?>
                    <th>Acciones</th>
                <?php
                }
                ?>

            </tr>
            <?php
            foreach ($data['incidencias'] as $incidencia) {
                if ($incidencia['aulas_id'] == $data['id']) {
            ?>
                    <tr>
                        <td><?= $incidencia['descripcion'] ?></td>
                        <td><?= $incidencia['fecha'] ?></td>
                        <td><?= $incidencia['fecha_solucion'] ?></td>
                        <?php
                        foreach ($profesores as $profesor) {
                            if ($incidencia['profesores_id'] == $profesor['id']) {
                                $profesorNombre = $profesor['nombre'];
                            }
                        }
                        ?>
                        <td><?= $profesorNombre ?></td>
                        <?php
                        if ($_SESSION['perfil'] == 'profesor') {
                        ?>
                            <td>
                                <a href="/incidencias/edit/<?= $incidencia['id'] ?>" class="btn btn-primary">Editar</a>
                                <a href="/incidencias/delete/<?= $incidencia['id'] ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        <?php
                        }
                        ?>

                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>

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