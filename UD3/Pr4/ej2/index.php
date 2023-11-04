<?php
/**
 * 
 * @author Pablo Merida Velasco
 * 
 * 5. Mejorar el calendario con un array de los días festivos: colores diferentes, nacionales, comunidad, locales.
 * 
 */

$meses = array('ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE');
$arrayDia = array('L', 'M', 'X', 'J', 'V', 'S', 'D');

if (isset($_POST['mes'])) {
    $mes = $_POST['mes'];
} else {
    $mes = date('n');
}

$anio = 2023;
$dias = 0;

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

$diaActual = date("d");
$mesActual = date("m");
$anioActual = date("Y");

function esFestivo($diaF, $mesF){
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
        'festivoComAutonoma'=> array(
            '02-01',
            '28-02',
            '06-04'
        ),
        'festivoLocal'=> array(
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
    <style>
        table {
            display: flex;
            align-items: center;
            justify-content: center;
            /* min-height: 40vh; */
        }

        .mes {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 5%;
        }

        tbody {
            border: 10px solid black;
            border-radius: 15px;
        }

        .dia {
            padding: 20px;
            font-size: 20px;
            transition: 0.3s ease-in-out;
            text-align: center;
        }
        
        .diaLetra {
            padding: 20px;
            font-size: 20px;
            text-align: center;
            border-bottom: 3px solid black; 
        }
        .dia:hover {
            background-color: black;
            color: aliceblue;
            border-radius: 900px;
        }

        .diaToday {
            color: black;
            text-align: center;
            padding: 20px;
            font-size: 20px;
            background-color: greenyellow;
            border-radius: 900px;
        }

        .diaFestivoNacional {
            color: black;
            text-align: center;
            padding: 20px;
            font-size: 20px;
            background-color: rgba(255, 0, 0, 0.6);
            border-radius: 900px;
        }

        .diaFestivoComAutonoma {
            color: black;
            text-align: center;
            padding: 20px;
            font-size: 20px;
            background-color: rgba(255, 255, 0, 0.6);
            border-radius: 900px;
        }

        .diaFestivoLocal {
            color: black;
            text-align: center;
            padding: 20px;
            font-size: 20px;
            background-color: rgba(0, 0, 255, 0.6);
            border-radius: 900px;
        }

        .formMes{
            margin: 30px 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <table>

        <h1 class="mes"><?php echo $meses[$mes - 1]; ?> - <?php echo $anio?></h1>
        <?php
        echo '<tr>';
        foreach ($arrayDia as $d) {
            echo "<td class='diaLetra'>$d</td>";
        }
        $numDia = 1;
        for ($i = 1; $i <= 5; $i++) {
            echo '<tr>';
            for ($j = 1; $j <= 7; $j++) {
                $festivoTipo = esFestivo($numDia, $mes);
                if ($festivoTipo == 'festivoNacional') {
                    // echo $diasSemana[calcularDiaSemana($numDia,$mes, $anio)];
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
        <label>Mes: </label>
        <select name="mes" id="mes">
            <?php 
                $selected = "";
                $counter = 1;
                foreach ($meses as $key) {
                    echo '<option value="'.$counter.'">'.$key.'</option>';
                    $counter++;
                }
            ?>
        </select>
        <label>Año: </label><br>
        <input type="number" name="anio" id="anio">
        <button type="submit" name="enviar">Enviar</button>
    </form>
</body>
</html>
