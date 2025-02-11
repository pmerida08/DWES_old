<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="resultado">
        <?php
            foreach ($data["animales"] as $animal) {
               echo "<p>". $animal['nombre'] . "</p>";
            }
        ?>
    </div>
</body>
</html>