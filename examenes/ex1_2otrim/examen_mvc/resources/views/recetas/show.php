<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del contacto</title>
</head>
<body>
    
    
    <h1>Detalle de la receta <?= $receta['id'] ?></h1>
    
    <a href="/recetas">Volver</a>
    <!-- <a href="/recetas/<?= $receta['id'] ?>/edit">Editar</a> -->
    <p><<?= $receta['imagen'] ?></p>
    <p><strong>Título:</strong> <?= $receta['titulo'] ?></p>
    <p><strong>Ingredientes:</strong> <?= $receta['ingredientes'] ?></p>
    <p><strong>Elaboración:</strong> <?= $receta['elaboracion'] ?></p>

    <!-- <form action="/recetas/<?= $receta['id'] ?>/delete" method="post">
        <button type="submit">Eliminar</button>
    </form> -->

</body>
</html>