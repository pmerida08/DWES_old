<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/navbar.css">
    <title>Talleres</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="https://www.iesgrancapitan.org/wp-content/uploads/sites/2/2021/06/Logo_IES_GranCapitan_header.png" alt="logo" width="50" height="50" class="d-inline-block align-text-top">
        <div class="container-fluid">
            <h2 class="navbar-brand">Talleres</h2>
        </div>
        <li class="nav-item">
            <a href="/" class="nav-link">Volver</a>
        </li>
    </nav>

    <div class="login-form">
        <h1 class="h3 mb-3 fw-normal text-center">Inicio sesión - Talleres</h1>
        <form action="" method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="user" id="floatingInput" placeholder="User:">
                <label for="floatingInput">Usuario:</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="passwd" id="floatingPassword" placeholder="Password:">
                <label for="floatingPassword">Contraseña:</label>
            </div>

            <div class="container-fluid">
                <button type="submit" class="btn btn-primary" name="submit">Iniciar sesión</button>
                <a href="<?= CLIENT->createAuthUrl() ?>">
                    <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google Logo" width="50" height="50">
                </a>
            </div>

        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>