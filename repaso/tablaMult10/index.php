<?php

/**
 * Tabla de multiplicar del 1 al 10
 * 
 */

$options = isset($_POST['options']) ? $_POST['options'] : 0;
$arrayNumeros = [];
$arrayInputs = [];

if (isset($_POST['enviar'])) {
    $arrayInputs = createInputs($options);
}

function randomNumber()
{
    $num = rand(0, 99);

    if ($num < 10) {
        $num = "0" . $num;
    }

    return $num;
}

function createInputs($options)
{
    $arrayInputs = [];

    for ($i = 0; $i < $options; $i++) {
        $num = randomNumber();
        if (!in_array($num, $arrayInputs)) {
            array_push($arrayInputs, $num);
        } else {
            $i--;
        }
    }

    return $arrayInputs;
}

function checkInput($i, $j, $arrayInputs)
{
    $num = $i . $j;

    if (in_array($num, $arrayInputs)) {
        return true;
    } else {
        return false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de multiplicar hasta el 10</title>
</head>

<body>
    <h1>Tabla de multiplicar hasta el 10</h1>
    <form method="post">
        <label>Número de preguntas:
            <input type="number" name="options">
        </label><br>
        <input type="submit" name="enviar" value="Enviar">


        <?php
        if (isset($_POST['enviar'])) {

        ?>
            <table border="1">
                <tr>
                    <th>Tabla del 1</th>
                    <th>Tabla del 2</th>
                    <th>Tabla del 3</th>
                    <th>Tabla del 4</th>
                    <th>Tabla del 5</th>
                    <th>Tabla del 6</th>
                    <th>Tabla del 7</th>
                    <th>Tabla del 8</th>
                    <th>Tabla del 9</th>
                    <th>Tabla del 10</th>
                </tr>
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    echo "<tr>";
                    for ($j = 1; $j <= 10; $j++) {
                        if (checkInput($i, $j, $arrayInputs)) {
                            echo "<td><input type='text' name='respuesta_$i$j'></td>";
                        } else {
                            echo "<td>" . $i * $j . "</td>";
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </table>
        <?php
        }
        ?>
        <input type="submit" name="corregir" value="Corregir">

        <?php
        if (isset($_POST['corregir'])) {
        }
        ?>
    </form>

</body>

</html>