<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear receta</title>
</head>

<body>

    <h1>Crear Receta</h1>

    <form action="/recetas" method="post">
        
        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo">
        <br>
        <label for="ingredientes">Ingredientes</label>
        <input type="text" name="ingredientes" id="ingredientes">
        <br>
        <label for="elaboracion">Elaboración</label>
        <input type="text" name="elaboracion" id="elaboracion">
        <br>
        <label for="imagen">Imagen</label>
        <input type="text" name="imagen" id="imagen">
        <br>
        <label for="etiquetas">Etiquetas</label>
        <input type="text" name="etiquetas" id="etiquetas">
        <br>
        <button type="submit">Crear receta</button>
    </form>
</body>

</html>