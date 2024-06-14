<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>

<body>
    <h1>Productos</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $producto) : ?>
                <tr>
                    <td><?php echo $producto['id'] ?></td>
                    <td><?php echo $producto['nombre'] ?></td>
                    <td><?php echo $producto['precio'] ?></td>
                    <td><img src="<?php echo $producto['imagen'] ?>" alt="<?php echo $producto['nombre'] ?>" width="100"></td>
                    <td><a href="/edit?id=<?= $producto['id'] ?>">Editar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>