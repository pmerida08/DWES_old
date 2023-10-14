<?php

/**
 * 
 * @author Pablo Merida Velasco
 * 
 * 5. Dado el mes y año almacenados en variables, escribir un programa que muestre el
 * calendario mensual correspondiente. Marcar el día actual en verde y los festivos
 * en rojo.
 * 
 */


$meses = array('ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE');
$mes = 12;
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

function esFestivo($diaF,$mesF){

    $festivos = array(
        '01-01',
        '25-12',
        '12-10'
    );

    $fecha = sprintf("%02d-%02d", $diaF, $mesF);
    return in_array($fecha, $festivos);

};

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario Mensual</title>
    <style>
        table{
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 50vh;
        }

        .mes{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10%;
        }

        tbody{
            border: 10px solid black;
            border-radius: 15px;
        }

        .dia {
            padding: 20px;
            font-size: 20px;
            transition: 0.3s ease-in-out;
            text-align: center;
        }

        .dia:hover{
            background-color: black;
            color: aliceblue;
            border-radius: 900px;
        }
        .diaToday{
            color: black;
            text-align: center;
            padding: 20px;
            font-size: 20px;
            background-color: greenyellow;
            border-radius: 900px;
        }

        .diaFestivo{
            color: black;
            text-align: center;
            padding: 20px;
            font-size: 20px;
            background-color: brown;
            border-radius: 900px;
        }
    </style>
</head>
<body>
    <table>
        <?php echo '<h1 class="mes">'.$meses[$mes-1].'</h1>';
        $numDia = 1;
        for ($i = 1; $i <= 5; $i++) {
            echo '<tr>';
            for ($j = 1; $j <= 7; $j++) {
                if ($numDia == $diaActual && $mes == $mesActual && $anioActual == $anio) {
                    echo '<td class="diaToday">';
                    printf('%2d', $numDia);
                    echo '</td>';
                } elseif (esFestivo($numDia, $mes)){
                    echo '<td class="diaFestivo">';
                    printf('%2d', $numDia);
                    echo '</td>';
                } elseif ($numDia <= $dias) {
                    echo '<td class="dia">';
                    printf('%2d', $numDia);
                    echo '</td>';
            
                } else {
                    echo '<td>&nbsp;</td>';
                }
                ++$numDia;
            }
            echo '</tr>';
        }
        ?>
    </table>
</body>
</html>
