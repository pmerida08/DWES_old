<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola Mundo</title>
</head>
<body>
    <h1>Modelo Vista Controlador</h1>
    <h2><?php 
    echo $data['encabezado'];
    ?></h2>
    <p><?php 
    foreach ($data['numeros'] as $k) {
        echo $k.'<br>';
    }?></p>
</body>
</html>