<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/edit.css">
    <title>Editar aula</title>
</head>

<body>
    <?php
    $aula = $data;
    ?>
    <form action="" method="post">

        <h1>Editar aula <?= $aula['codigo'] ?></h1>

        <div class="form-group">
            <label for="codigo">
                Código de aula:
                <input type="text" name="codigo" id="exampleInputCodigo1" class="form-control" value="<?= $aula['codigo'] ?>">
            </label>
        </div>
        <div class="form-group">
            <label for="numero_mesas">
                Número de mesas:
                <input type="text" name="numero_mesas" id="exampleInputNumMesas1" class="form-control" value="<?= $aula['numero_mesas'] ?>">
            </label>
        </div>
        <div class="form-group">
            <label for="t_agrupamiento_grupos_id">
                Agrupamiento de grupos:
                <input type="text" name="t_agrupamiento_grupos_id" id="exampleInputAgrupamiento1" class="form-control" value="<?= $aula['t_agrupamiento_grupos_id'] ?>">
            </label>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Guardar</button>
    </form>
</body>

</html>