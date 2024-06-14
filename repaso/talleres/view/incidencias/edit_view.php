<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/edit.css">
    <title>Editar Incidencias</title>
</head>
<body>
    <?php
    $aulas = $data['aulas'];
    $profesores = $data['profesores'];
    ?>
    <a href="/gestor/incidencias" class="btn btn-primary">Volver</a>

    <form action="" method="POST">
        <h2>Editar Incidencias</h2>
        <div class="form-group">
            <label for="descripcion">
                Descripción:
                <input type="text" name="descripcion" id="descripcion" class="form-control" value="<?= $data['descripcion'] ?>">
            </label>
        </div>
        <div class="form-group">
            <label for="fecha">
                Fecha:
                <input type="date" name="fecha" id="fecha" class="form-control" value="<?= $data['fecha'] ?>">
            </label>
        </div>
        <div class="form-group">
            <label for="fecha_solucion">
                Fecha de solución:
                <input type="date" name="fecha_solucion" id="fecha_solucion" class="form-control" value="<?= $data['fecha_solucion'] ?>">
            </label>
        </div>
        <div class="form-group">
            <label for="aulas_id">
                Aula:
                <select name="aulas_id" id="aulas_id" class="form-control">
                    <?php foreach ($aulas as $aula) : ?>
                        <option value="<?= $aula['id'] ?>" <?php if ($aula['id'] == $data['aulas_id']) echo 'selected'; ?>><?= $aula['codigo'] ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
        <div class="form-group">
            <label for="profesores_id">
                Profesor:
                <select name="profesores_id" id="profesores_id" class="form-control">
                    <?php foreach ($profesores as $profesor) : ?>
                        <option value="<?= $profesor['id'] ?>" <?php if ($profesor['id'] == $data['profesores_id']) echo 'selected'; ?>><?= $profesor['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Guardar</button>
    </form>
    
</body>
</html>