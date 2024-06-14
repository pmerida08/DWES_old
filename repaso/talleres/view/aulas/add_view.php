<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir aula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/add.css">
</head>

<body>
    <a href="/gestor/aulas" class="btn btn-primary">Volver</a>
    <div class="container mt-5">
        <h2>Añadir Aula</h2>
        <form action="/aulas/add" method="POST">
            <div class="mb-3">
                <label for="num_aula" class="form-label">Número de aula</label>
                <input type="text" name="num_aula" id="num_aula" class="form-control">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control">
            </div>
            <div class="mb-3">
                <label for="num_mesas" class="form-label">Número de mesas</label>
                <input type="text" name="num_mesas" id="num_mesas" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Añadir</button>
        </form>
    </div>

</body>

</html>