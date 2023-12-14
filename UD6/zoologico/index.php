<?php
function conectadb()
{
    $dsn = "mysql:host=localhost; dbname=zoologico";
    try {
        $db = new PDO($dsn, 'us_zoologico', 'P08mv2003');
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF-8'");
        return $db;
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}

$conexion = conectadb();

$sql = "SELECT * FROM animales";
$resultado = $conexion->query($sql);
$buscador = $_POST['buscar'] ?? '';

if (isset($_POST["insertar"])) {
    $sql = "INSERT INTO animales(nombre) VALUES('" . $_POST['nombreAnimal'] . "')";
    $resultado = $conexion->query($sql);
}

if (isset($_GET["action"]) && $_GET['action'] == "buscar") {
    $sql = "SELECT * FROM animales WHERE nombre LIKE %".$buscador."% OR imagen LIKE %".$buscador."%";
    $resultado = $conexion->query($sql);
}

if (isset($_GET["action"]) && $_GET["action"] == "borrar") {
    $sql = "DELETE FROM animales WHERE id=" . $_GET['id'];
    $resultado = $conexion->query($sql);
}


if (isset($_GET["action"]) && $_GET["action"] == "editar") {
    $sql = "SELECT nombre FROM animales WHERE id = " . $_GET['id'];
    $nombre = $conexion->query($sql);
    $animal = $nombre->fetch(PDO::FETCH_ASSOC);
    $nombre_del_animal = $animal['nombre'];
}

if (isset($_POST["Editar"])) {
    $sql = "UPDATE animales
    SET nombre = '" . $_POST["nuevoNombre"] . "'
    WHERE id = " . $_GET['id'];
    $resultado = $conexion->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Esto no es una aplicación</h1>
    <form action="" method="post">
        <input type="text" name="buscarAnimal" id="buscarAnimal">
        <input type="submit" value="Buscar" name="buscar">
    </form>
    <h2>Lista de animales</h2>
    <?php
    foreach ($resultado as $key => $value) {
        echo $value['nombre'] . " <a href='del.php&id=" . $value['id'] . "'>Borrar</a> <a href='edit.php&id=" . $value['id'] . "'>Editar</a></br>";
    }

    ?>
</body>

</html>