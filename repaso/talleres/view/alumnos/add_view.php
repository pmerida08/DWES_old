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
    
    <a href="/gestor/alumnos" class="btn btn-primary">Volver</a>
    <div class="container mt-5">
        <h2>Añadir Alumno</h2>
        <form action="/alumnos/add" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Estado</label>
                <select name="activo" id="activo" class="form-select">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Añadir</button>
        </form>
    </div>

</body>

</html>