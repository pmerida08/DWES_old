<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6f2882733f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/aulas.css">
    <link rel="stylesheet" href="css/navbar.css">
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
                echo '<a href="/gestor/aulas" class="btn btn-secondary">Gestor de datos</a>';
                echo '</li>';
                echo '<li class="nav-item">';
                echo '<a href="/logout" class="btn btn-danger">Cerrar sesión</a>';
                echo '</li>';
            } else if ($_SESSION['perfil'] == 'alumno') {
                echo '<a href="/logout" class="btn btn-danger">Cerrar sesión</a>';
                echo '</li>';
            } else {
                echo '<a href="/login" class="nav-link">Iniciar sesión</a>';
                echo '</li>';
            }
            ?>
    </nav>

    <h1 class="title">Aulas</h1>
    <div class="aulas">
        <?php foreach ($data['aulas'] as $aula) : ?>
            <a href="/aulas/<?= $aula['id'] ?>" class="aula">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Aula <?php echo $aula['codigo'] ?></h5>
                        <p class="card-text">Agrupamiento de grupos: <?php echo $aula['t_agrupamiento_grupos_id'] ?></p>
                        <p class="card-text">Número de mesas: <?php echo $aula['numero_mesas'] ?></p>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
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