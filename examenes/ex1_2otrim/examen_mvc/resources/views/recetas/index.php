<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocina Saludable</title>
</head>

<body>
    <h1>Listado de Recetas</h1>

    <a href="/recetas/create">Crear receta</a>

    <ul>
        <?php foreach ($recetas as $receta) : ?>
            <li>
                <a href="/recetas/<?= $receta['id'] ?>">
                    <?= $receta['titulo'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>