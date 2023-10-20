<?php
/**
 * 
 * @author Pablo Mérida Velasco
 * 
 * 3. Crear un array con los alumnos de clase y permitir la selección aleatoria de uno de
 * ellos. El resultado debe mostrar nombre y fotografía.
 * 
 */
$arrayAlumnos = array('Andrés Rodríguez', 'Pablo Mérida', 'Víctor Fernández', 'Alejandro Priego', 'Ángel Fernández', 'Antonio Carmona', 'Héctor', 'Javier Postigo', 'Quique Ruz', 'Laura', 'Eduardo', 'Adrián Cordovero', 'Daniel Marín', 'Frías', 'Adrian', 'Ángel Cubero', 'Galisteo', 'Sergio Luna');
    
 function select($element){    
    return $element[rand(0, count($element)-1)];
 };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <style>
        #info{
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 24px;
            font-weight: 700;
            margin-top: 20%;
            display: flex;
            align-content: center;
            justify-content: center;
        }
  </style>
    </style>
</head>
<body>
    <article id="info">
        <?php
            echo select($arrayAlumnos);
        ?>
    </article>
</body>
</html>l



