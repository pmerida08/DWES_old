<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Formulario de Verbos</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h2>Formulario de Verbos</h2>
            <label for="numVerbos">Cuantos verbos quieres:</label>
            <input type="text" name="numVerbos" id="numVerbos" min="1" required>
            <label for="dificultad">Que dificultad quieres:</label>
            <select name="dificultad" id="dificultad" required>
                <option value="1">Nivel 1</option>
                <option value="2">Nivel 2</option>
                <option value="3">Nivel 3</option>
            </select>
            <input type="submit" name="submit" value="Enviar">
        </form>
    </div>
</body>
</html>
