<?php
    if (!isset($_POST['insertar'])) {
        header('location: index.php');   
    }
?>

<form action="../index.php" method="post">
    <label for="nuevoNombre">Dime el nuevo nombre de <?php echo $_GET['nombre'] ?> </label>
    <input type="text" name="nuevoNombre" id="nuevoNombre">
    <input type="submit" value="Añadir" name="anadir">
</form>