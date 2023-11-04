<?php

/**
 * @author Andres
 */
if (!isset($_POST["submit"])) {
    header("Location: index.php");
}
include("config/tests_cnf.php");
$letraPermiso = $_POST["permiso"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examenes del Permiso <?php echo $letraPermiso ?></title>
    <link rel="stylesheet" href="css/buscarExamen.css">
</head>

<body>
    <h1>Examenes Disponibles</h1>
    <form action="mostrarExamen.php" method="post">
        Elije el examen:
        <select id="opcion" name="examen">
            <?php
            foreach ($aTests as $test => $value) {
                $letraTest = explode(" ", $value["Permiso"]);
                $letraTest = end($letraTest);
                if ($letraPermiso == $letraTest) {
                    echo "<option value='$value[idTest]'>Examen " . $value["idTest"] . "</option>";
                }
            }
            ?>
        </select>
        <input type="submit" value="Mostrar Examen" name="mostrar">

    </form>
</body>

</html>