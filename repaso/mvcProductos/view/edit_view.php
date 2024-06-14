<?php
    var_dump($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar <?= $data['id'] ?></title>
</head>

<body>
    <form action="/edit?id= <?= $data['id'] ?>" method="post">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="<?= $data['nombre'] ?>">
        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio" value="<?= $data['precio'] ?>">
        <label for="imagen">Imagen</label>
        <input type="text" name="imagen" id="imagen" value="<?= $data['imagen'] ?>">
        <input type="submit" value="Editar">
    </form>
</body>

</html>