<?php
$aulas = $data['aulas'];
$profesores = $data['profesores'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir incidencias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6f2882733f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/add.css">
    <link rel="stylesheet" href="../../css/navbar.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="https://www.iesgrancapitan.org/wp-content/uploads/sites/2/2021/06/Logo_IES_GranCapitan_header.png" alt="logo" width="50" height="50" class="d-inline-block align-text-top">
        <div class="container-fluid">
            <h2 class="navbar-brand">Talleres</h2>
        </div>
        <li class="nav-item">
            <a href="/gestor/incidencias" class="nav-link">Cancelar</a>
        </li>

        <li class="nav-item">
            <a href="/logout" class="btn btn-danger">Cerrar sesión</a>
        </li>
    </nav>
    <div class="container mt-5">
        <h2>Añadir Incidencias</h2>
        <form action="/incidencias/add" method="POST">
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" name="fecha" id="fecha" min="<?= date("Y-m-d", strtotime('0 day')); ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="fecha_solucion" class="form-label">Fecha Solucion</label>
                <input type="date" name="fecha_solucion" id="fecha_solucion" min="<?= date("Y-m-d", strtotime('+1 day')); ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="aulas_id" class="form-label">Aula asociada</label>
                <select name="aulas_id" id="aulas_id" class="form-select">
                    <?php foreach ($aulas as $aula) : ?>
                        <option value="<?php echo $aula['id'] ?>"><?php echo $aula['codigo'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="profesores_id" class="form-label">Profesor</label>
                <select name="profesores_id" id="profesores_id" class="form-select">
                    <?php foreach ($profesores as $profesor) : ?>
                        <option value="<?php echo $profesor['id'] ?>"><?php echo $profesor['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Añadir</button>
        </form>
    </div>
</body>

</html>