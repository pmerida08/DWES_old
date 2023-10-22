<?php
/**
 * 
 * @author Pablo Merida Velasco
 * 
 * 4. Un restaurante dispone de una carta de 3 primeros, 5 segundos y 3 postres. 
 * Almacenar información incluyendo foto y mostrar los menús disponibles. Mostrar el
 * precio del menú suponiendo que éste se calcula sumando el precio de cada uno de
 * los platos incluidos y con un descuento del 20 %.
 * 
 */

 $menus = array(
    'Primeros' => array(
        'Albóndigas con tomate'=> array('img/albtom.jpg',9),
        'Macarrones carbonara'=> array('img/maccar.jpg',8),
        'Salmón a la plancha'=> array('img/salplan.jpg',10),
    ),

    'Segundos' => array(
        'Pollo a la parrilla' => array('img/pollo.jpg', 12),
        'Lomo de cerdo asado' => array('img/cerdo.jpg', 11),
        'Pasta Alfredo' => array('img/pasta.jpg', 9),
        'Salmón al horno' => array('img/salmhorno.jpg', 10),
        'Ensalada César' => array('img/ensalada.jpg', 7),
    ),

    'Postres' => array(
        'Tarta de chocolate' => array('img/tarta.jpg', 6),
        'Helado de vainilla' => array('img/helado.jpg', 5),
        'Frutas frescas' => array('img/frutas.jpg', 4),
    )
 );

$precioMenu = 0;
$eleccionPrimer = 'Albóndigas con tomate'; // Ponemos valores por defecto
$eleccionSegundo = 'Pollo a la parrilla';
$eleccionPostre = 'Tarta de chocolate';

 if (isset($_POST['submit'])){
    $eleccionPrimer = $_POST['primero'];
    $eleccionSegundo = $_POST['segundo'];
    $eleccionPostre = $_POST['postre'];
 
 }

    $precioMenu += $menus['Primeros'][$eleccionPrimer][1];
    $precioMenu += $menus['Segundos'][$eleccionSegundo][1];
    $precioMenu += $menus['Postres'][$eleccionPostre][1];

    $precioMenu *= 0.8; // Aplicamos el descuento del 20%

    $fotoPrimer = $menus['Primeros'][$eleccionPrimer][0];
    $fotoSegundo = $menus['Segundos'][$eleccionSegundo][0];
    $fotoPostre = $menus['Postres'][$eleccionPostre][0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <form method="post">

        <label>Primer plato:</label><br>
        <select name="primero" id="primero"><br><br>
            <option value="Albóndigas con tomate">Albóndigas con tomate</option>
            <option value="Macarrones carbonara">Macarrones carbonara</option>
            <option value="Salmón a la plancha">Salmón a la plancha</option>
        </select><br><br>
        <label>Segundo plato:</label><br>
        <select name="segundo" id="segundo"><br><br>
            <option value="Pollo a la parrilla">Pollo a la parrilla</option>
            <option value="Lomo de cerdo asado">Lomo de cerdo asado</option>
            <option value="Pasta Alfredo">Pasta Alfredo</option>
            <option value="Salmón al horno">Salmón al horno</option>
            <option value="Ensalada César">Ensalada César</option>
        </select><br><br>
        <label>Primer plato:</label><br>
        <select name="postre" id="postre"><br>
            <option value="Tarta de chocolate">Tarta de chocolate</option>
            <option value="Helado de vainilla">Helado de vainilla</option>
            <option value="Frutas frescas">Frutas frescas</option>
        </select><br><br>

        <button type="submit" name="submit">Enviar</button><br><br>
    </form>
    <?php 
        echo '<p>El precio total del menú es de '.$precioMenu.'€</p>';
    ?>

    <p>Estas son las fotos del menú: </p>
    
    <?php
        echo "<img src=".$fotoPrimer.">";
        echo "<img src=".$fotoSegundo.">";
        echo "<img src=".$fotoPostre.">";
    ?>
</body>
</html>