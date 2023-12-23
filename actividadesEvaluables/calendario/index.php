<?php

/**
 * 
 * @author Pablo Merida Velasco
 * 
 * 5. Mejorar el calendario con un array de los días festivos: colores diferentes, nacionales, comunidad, locales.
 * 
 */

include('config/config.php');

if (isset($_POST['mes']) && isset($_POST['anio'])) {
    $mes = $_POST['mes'];
    $anio = $_POST['anio'];
} else {

    $mes = date('m');
    $anio = date('Y');
}

$diaActual = date("d");
$mesActual = date("m");
$anioActual = date("Y");


switch ($mes) {
    case 1:
    case 3:
    case 5:
    case 7:
    case 8:
    case 10:
    case 12:
        $dias = 31;
        break;

    case 4:
    case 6:
    case 9:
    case 11:
        $dias = 30;
        break;

    case 2:
        if (($anio % 4 == 0 && $anio % 100 != 0) || $anio % 400 == 0) {
            $dias = 29;
        } else {
            $dias = 28;
        }
        break;
}


function esFestivo($diaF, $mesF)
{
    $festivos = array(
        'festivoNacional' => array(
            '06-01',
            '07-04',
            '01-05',
            '15-08',
            '12-10',
            '01-11',
            '06-12',
            '08-12',
            '25-12'
        ),
        'festivoComAutonoma' => array(
            '02-01',
            '28-02',
            '06-04'
        ),
        'festivoLocal' => array(
            '08-09',
            '24-10'
        )
    );

    $fecha = sprintf("%02d-%02d", $diaF, $mesF);

    foreach ($festivos as $tipo => $fest) {
        if (in_array($fecha, $fest)) {
            return $tipo;
        }
    }
    return '';
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario Mensual</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <h1 class="mes"><?php echo $meses[$mes - 1] . " - " . $anio ?></h1>
    <table>
        <tr>
            <th>L</th>
            <th>M</th>
            <th>X</th>
            <th>J</th>
            <th>V</th>
            <th>S</th>
            <th>D</th>
        </tr>

        <?php
        $numDia = 1;
        for ($i = 1; $i <= 6; $i++) {
            echo '<tr>';
            $fecha = mktime(0, 0, 0, $mes, $numDia, $anio);
            $diaSemana = date('N', $fecha);

            for ($j = 1; $j <= 7; $j++) {
                if ($numDia == 1) {

                    for ($j = 1; $j < $diaSemana; $j++) {
                        echo '<td>&nbsp;</td>';
                    }
                }
                $festivoTipo = esFestivo($numDia, $mes);
                if ($festivoTipo == 'festivoNacional') {
                    echo "<td class='diaFestivoNacional'>$numDia</td>";
                } elseif ($festivoTipo == 'festivoComAutonoma') {
                    echo "<td class='diaFestivoComAutonoma'>$numDia</td>";
                } elseif ($festivoTipo == 'festivoLocal') {
                    echo "<td class='diaFestivoLocal'>$numDia</td>";
                } elseif ($numDia == $diaActual && $mes == $mesActual && $anioActual == $anio) {
                    echo "<td class='diaToday'>$numDia</td>";
                } elseif ($numDia <= $dias) {
                    echo "<td class='dia'>$numDia</td>";
                } else {
                    echo '<td>&nbsp;</td>';
                }
                $numDia++;
            }
            echo '</tr>';
        }
        ?>

    </table>
    <form method="post" class="formMes">
        <label>Mes:
            <input type="number" name="mes" id="mes" value=<?php echo $mes ?>>
        </label>
        <label>Año:
            <input type="number" name="anio" id="anio" value=<?php echo $anio ?>>
        </label>
        <button type="submit" name="enviar">Enviar</button>
    </form>

    <footer>
        <legend>
            <ul>
                <li>Día actual</li>
                <li>Festivo Nacional</li>
                <li>Festivo Comunidad Aut.</li>
                <li>Festivo Local</li>
            </ul>
        </legend>
    </footer>
</body>

</html>