<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago de multa</title>
</head>

<body>
    <a href="/">Volver</a><br>
    <h1>Multas</h1>

    <h2>Pago de Multa</h2>
    <?php
    $multa = $data['multa'][0];

    ?>
    <form method="POST">
        <div class="form-group">
            <label for="matricula">Matricula</label>
            <input type="text" class="form-control" id="matricula" name="matricula" value="<?= $multa['matricula'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $multa['descripcion'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="text" class="form-control" id="fecha" name="fecha" value="<?= $multa['fecha'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="importe">Importe</label>
            <input type="text" class="form-control" id="importe" name="importe" value="<?= $multa['importe'] ?>" readonly>
        </div>
        <?php

        foreach ($data['sancion'] as $sancion) {
            if ($sancion['id'] == $multa['id_tipo_sanciones']) {
        ?>
                <div class="form-group">
                    <label for="tipo_sanciones">Tipo de sancion</label>
                    <input type="text" class="form-control" id="tipo_sanciones" name="tipo_sanciones" value="<?= $sancion['tipo'] ?>" readonly>
                </div>
            <?php
            }
        }

        foreach ($data['usuarios'] as $usuario) {
            if ($usuario['id'] == $multa['id_conductor']) {
            ?>
                <div class="form-group ">
                    <label for="conductor">Conductor</label>
                    <input type="text" class="form-control" id="conductor" name="conductor" value="<?= $usuario['nombre'] ?>" readonly>
                </div>
        <?php
            }
        }
        ?>

        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" value="<?= $multa['estado'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="descuento">Descuento</label>
            <input type="text" class="form-control" id="descuento" name="descuento" value="<?= $multa['descuento'] ?>" readonly>
        </div>
        <input type="submit" name="enviar" value="Enviar">
    </form>

</body>

</html>