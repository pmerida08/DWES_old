<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multas</title>
</head>

<body>
    <a href="/">Volver</a><br>
    <h1>Multas</h1>

    <h2><?php
        foreach ($data['usuarios'] as $usuarios) {
            if ($_SESSION['user'] == $usuarios['usuario']) {
                echo $usuarios['nombre'];
            }
        }
        ?></h2>

    <h3>Listado de multas</h3>
    <?php if ($_SESSION['perfil'] == 'agente') {
    ?>
        <a href="/multas/add">Añadir multa</a>
    <?php
    }
    ?>
    <table>
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Descripcion</th>
                <th>Fecha</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['multas'] as $multa) {
            ?>
                <tr>
                    <td><?= $multa['matricula'] ?></td>
                    <td><?= $multa['descripcion'] ?></td>
                    <td><?= $multa['fecha'] ?></td>
                    <?php if ($_SESSION['perfil'] == 'conductor') {
                        if ($multa['estado'] == 'Pendiente') {
                    ?>
                            <td><a href="/multas/pagar/<?= $multa['id'] ?>">Pagar</a></td>
                        <?php
                        } else {
                        ?>
                            <td>Pagada</td>
                    <?php


                        }
                    }
                    ?>
                </tr>
            <?php
            }
            ?>
        </tbody>


    </table>

</body>

</html>