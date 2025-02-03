<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Multa</title>
</head>

<body>
    <a href="/">Volver</a><br>
    <h1>Añadir Multa</h1>
    <h2>Agente: <?= $_SESSION['user'] ?></h2>


    <form action="" method="post">
        <label for="matricula">Matricula:</label>
        <input type="text" name="matricula" id="matricula"><br>
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha"><br>
        <label for="conductor">Conductor:</label>
        <select name="conductor" id="conductor">
            <?php
            foreach ($data['usuarios'] as $usuario) {
            ?>
            <?php
                if ($usuario['perfil'] == 'conductor') {
                    echo '<option value="' . $usuario["id"] . '"> ' . $usuario["nombre"] . '</option>';
                }
            }
            ?>
        </select><br>
        <label for="sancion">Sanción:</label>

        <select name="sancion" id="sancion">
            <?php
            foreach ($data['sancion'] as $sancion) {
            ?>
                <option value="<?= $sancion['id'] ?>"><?= $sancion['tipo'] ?></option>
            <?php
            }
            ?>
        </select><br>
        <br>
        <label for="descripcion">Descripcion:</label>
        <textarea name="descripcion" id="descripcion"></textarea><br>

        <label for="estado">Estado:</label>
        <button type="submit" name="submit">Añadir</button>
    </form>
</body>

</html>