<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6f2882733f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/add.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <title>Editar reserva</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="https://www.iesgrancapitan.org/wp-content/uploads/sites/2/2021/06/Logo_IES_GranCapitan_header.png" alt="logo" width="50" height="50" class="d-inline-block align-text-top">
        <div class="container-fluid">
            <h2 class="navbar-brand">Talleres</h2>
        </div>
        <li class="nav-item">
            <a href="/gestor/reservas" class="nav-link">Cancelar</a>
        </li>

        <li class="nav-item">
            <a href="/logout" class="btn btn-danger">Cerrar sesión</a>
        </li>
    </nav>
    <div class="container mt-5">
        <h2>Editar Reserva</h2>
        <form action="" method="POST">
            <span class="text-danger"><?= isset($_SESSION['error']) ? $_SESSION['error'] : '' ?></span>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control" value="<?= $data['descripcion'] ?>">
            </div>
            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha inicio</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="<?= $data['fecha_inicio'] ?>">
            </div>
            <div class="mb-3">
                <label for="fecha_final" class="form-label">Fecha fin</label>
                <input type="date" name="fecha_final" id="fecha_final" class="form-control" value="<?= $data['fecha_final'] ?>">
            </div>

            <input type="hidden" name="created_at" id="created_at" class="form-control" value="<?= $data['created_at'] ?>">
            <input type="hidden" name="updated_at" id="updated_at" class="form-control" value="<?= $data['updated_at'] ?>">

            <div class="mb-3">
                <label for="t_equipos_id" class="form-label">Equipo</label>
                <select name="t_equipos_id" id="t_equipos_id" class="form-select">
                    <?php foreach ($data['equipos'] as $equipo) : ?>
                        <option value="<?php echo $equipo['id'] ?>" <?= $equipo['id'] == $data['equipos_id'] ? 'selected' : '' ?>><?php echo $equipo['codigo'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="profesores_id" class="form-label">Profesor</label>
                <select name="profesores_id" id="profesores_id" class="form-select">
                    <?php foreach ($data['profesores'] as $profesor) : ?>
                        <option value="<?php echo $profesor['id'] ?>" <?= $profesor['id'] == $data['profesores_id'] ? 'selected' : '' ?>><?php echo $profesor['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
</body>

</html>