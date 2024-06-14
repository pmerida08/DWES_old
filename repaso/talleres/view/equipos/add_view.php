<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/add.css">
</head>

<body>
    <a href="/gestor/equipos" class="btn btn-primary">Volver</a>
    <div class="container mt-5">
        <h2>Añadir Equipo</h2>
        <form action="/equipos/add" method="POST">
            <div class="mb-3">
                <label for="codigo" class="form-label">Código</label>
                <input type="text" name="codigo" id="codigo" class="form-control">
            </div>
            <div class="mb-3">
                <label for="referencia_ja" class="form-label">Referencia Junta de Andalucía</label>
                <input type="text" name="referencia_ja" id="referencia_ja" class="form-control">
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="text" name="imagen" id="imagen" class="form-control">
            </div>
            <div class="mb-3">
                <label for="t_estados_id" class="form-label">Estado</label>
                <select name="t_estados_id" id="t_estados_id" class="form-select">
                    <option value="1">Operativo</option>
                    <option value="2">Roto</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="created_at" class="form-label">Fecha de creación</label>
                <input type="date" name="created_at" id="created_at" class="form-control">
            </div>
            <div class="mb-3">
                <label for="updated_at" class="form-label
                ">Fecha de actualización</label>
                <input type="date" name="updated_at" id="updated_at" class="form-control">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Añadir</button>
        </form>
    </div>
</body>

</html>