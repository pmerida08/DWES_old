<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6f2882733f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/edit.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <title>Editar profesor</title>
</head>

<body>
    <?php
    $profesor = $data;
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="https://www.iesgrancapitan.org/wp-content/uploads/sites/2/2021/06/Logo_IES_GranCapitan_header.png" alt="logo" width="50" height="50" class="d-inline-block align-text-top">
        <div class="container-fluid">
            <h2 class="navbar-brand">Talleres</h2>
        </div>
        <li class="nav-item">
            <a href="/gestor/profesores" class="nav-link">Cancelar</a>
        </li>

        <li class="nav-item">
            <a href="/logout" class="btn btn-danger">Cerrar sesión</a>
        </li>
    </nav>

    <form action="" method="post">

        <h2>Editar profesor</h2>

        <div class="form-group">
            <label for="nombre">
                Nombre:
                <input type="text" name="nombre" id="exampleInputCodigo1" class="form-control" value="<?= $profesor['nombre'] ?>">
            </label>
        </div>
        <div class="form-group">
            <label for="email">
                Email:
                <input type="text" name="email" id="exampleInputNumMesas1" class="form-control" value="<?= $profesor['email'] ?>">
            </label>
        </div>
        <div class="form-group">
            <label for="password">
                Contraseña:
                <input type="password" name="password" id="exampleInputAgrupamiento1" class="form-control" value="<?= $profesor['password'] ?>">
            </label>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Guardar</button>
    </form>
</body>

</html>