<?php

/**
 * @author Pablo Merida
 * 
 * Escenario: Puzles infantiles. 
 * Se debe crear una aplicación que permita resolver puzles infantiles de tres piezas. Se adjunta fichas de 
 * ejemplo, pero es necesario que personalices las fichas del rompecabezas. 
 * Aplica criterios de usabilidad en el diseño de la aplicación intentando conseguir la mejor experiencia de usuario. 
 * 
 */

// Incluimos el fichero de la clase

$topPuzzle = range(1, 6);
$downPuzzle = range('A', 'F');


$correctPuzzle = [];

for ($i = 0; $i < 6; $i++) {
    $correctPuzzle[] = $topPuzzle[$i] . $downPuzzle[$i];
}

shuffle($topPuzzle);

if (isset($_POST['procesarFormPuzzle'])) {
    $procesarFormPuzzle = true;
    $puzzle = $_POST['puzzle'];

    $arrayPuzzle = str_split($puzzle);

    $arrayUserPuzzle = [];

    for ($j = 0; $j < 6; $j++) {
        $arrayUserPuzzle[] = $arrayPuzzle[$j] . $downPuzzle[$j];
    }

    if ($arrayUserPuzzle == $correctPuzzle) {
        echo "¡Enhorabuena! Has completado el puzzle correctamente.";
    } else {
        echo "Lo siento, la combinación introducida no es correcta.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puzzle Infantil</title>
</head>

<body>

    <h1>Puzzle</h1>

    <div>
        <?php if (!isset($_POST['procesarFormPuzzle'])) {
        ?>
            <?php foreach ($topPuzzle as $num) : ?>
                <img src="img/<?= $num ?>.JPG" alt="Puzzle <?= $num ?>" value="<?= $num ?>">
            <?php endforeach; ?>
        <?php } else {
        ?>
            <?php foreach ($arrayPuzzle as $num) : ?>
                <img src="img/<?= $num ?>.JPG" alt="Puzzle <?= $num ?>" value="<?= $num ?>">
            <?php endforeach; ?>
        <?php } ?>
    </div>



    <div>
        <?php foreach ($downPuzzle as $letter) : ?>
            <img src="img/<?= $letter ?>.JPG" alt="Puzzle <?= $letter ?>" value="<?= $letter ?>">
        <?php endforeach; ?>
    </div>

    <form action="" method="post">
        <label for="puzzle">Introduce la combinación correcta</label>
        <input type="text" name="puzzle" id="puzzle">

        <input type="submit" name="procesarFormPuzzle" value="Corregir puzzle">
    </form>

</body>

</html>