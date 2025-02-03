<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir equipo</title>
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
            <a href="/gestor/equipos" class="nav-link">Cancelar</a>
        </li>

        <li class="nav-item">
            <a href="/logout" class="btn btn-danger">Cerrar sesión</a>
        </li>
    </nav>
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

            <input type="hidden" name="created_at" id="created_at" class="form-control">
            <input type="hidden" name="updated_at" id="updated_at" class="form-control">

            <button type="submit" name="submit" class="btn btn-primary">Añadir</button>
        </form>
    </div>
    
</body>

</html>