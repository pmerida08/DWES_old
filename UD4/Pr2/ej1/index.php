<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    if (!empty($nombre) && !empty($email) && !empty($telefono)) {

        $contacto = array(
            'nombre' => $nombre,
            'email' => $email,
            'telefono' => $telefono
        );

        $contactos[] = $contacto;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agenda de contactos</title>
</head>
<body>
    <h1>Agenda de contactos</h1>

    <h2>Agregar contacto</h2>
    <form method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre"><br>

        <label>Correo electrónico:</label>
        <input type="email" name="email"><br>

        <label>Teléfono:</label>
        <input type="text" name="telefono"><br>

        <input type="submit" value="Agregar">
    </form>

    <h2>Contactos</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Correo electrónico</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
        <?php 
            foreach ($contactos as $contacto) { ?>
                <tr>
                    <td><?php echo $contacto['nombre']; ?></td>
                    <td><?php echo $contacto['email']; ?></td>
                    <td><?php echo $contacto['telefono']; ?></td>
                </tr>
        <?php };?>
    </table>
</body>
</html>
