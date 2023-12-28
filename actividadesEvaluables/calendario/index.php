<?php

/**
 * 
 * @author Pablo Merida Velasco
 * 
 * 5. Mejorar el calendario con un array de los días festivos: colores diferentes, nacionales, comunidad, locales.
 * 
 */

include('config/config.php');

session_start();

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

if (isset($_POST['cambiarCol'])) {
    $colorAct = $_POST['colorDiaAct'];
    $colorNac = $_POST['colorDiaNac'];
    $colorComAut = $_POST['colorDiaComAut'];
    $colorLocal = $_POST['colorDiaLocal'];

    $_SESSION['colorAct'] = $colorAct;
    $_SESSION['colorNac'] = $colorNac;
    $_SESSION['colorComAut'] = $colorComAut;
    $_SESSION['colorLocal'] = $colorLocal;
}

if (isset($_POST['agregarTarea'])) {
    $dia = $_POST['dia'];
    $tarea = $_POST['tarea'];

    $dia = date("d-m-Y", strtotime($dia));

    $tareas = fopen($archivoTareas, "a") or die("No se ha podido abrir el archivo"); // Se abre el archivo para escribir al final
    fwrite($tareas, $dia . " - " . $tarea . "\n");
    fclose($tareas);

    header("Location: index.php"); // Para que no se envíe el formulario al actualizar la página

}

$fechaActual = date("d-m-Y");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario Mensual</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        :root {
            --colorDiaAct: <?php echo isset($_SESSION['colorAct']) ? $_SESSION['colorAct'] : 'rgb(173, 255, 47)' ?>;
            --colorDiaNac: <?php echo isset($_SESSION['colorNac']) ? $_SESSION['colorNac'] : 'rgba(255, 0, 0, 0.6)' ?>;
            --colorDiaComAut: <?php echo isset($_SESSION['colorComAut']) ? $_SESSION['colorComAut'] : 'rgba(0, 255, 0, 0.6)' ?>;
            --colorDiaLocal: <?php echo isset($_SESSION['colorLocal']) ? $_SESSION['colorLocal'] : 'rgba(0, 0, 255, 0.6)' ?>;
        }

        .diaToday {
            background-color: var(--colorDiaAct);
        }

        .diaFestivoNacional {
            background-color: var(--colorDiaNac);
        }

        .diaFestivoComAutonoma {
            background-color: var(--colorDiaComAut);
        }

        .diaFestivoLocal {
            background-color: var(--colorDiaLocal);
        }

        legend ul li:nth-child(1) {
            background-color: var(--colorDiaAct);
        }

        legend ul li:nth-child(2) {
            background-color: var(--colorDiaNac);
        }

        legend ul li:nth-child(3) {
            background-color: var(--colorDiaComAut);
        }

        legend ul li:nth-child(4) {
            background-color: var(--colorDiaLocal);
        }
    </style>
</head>

<body>

    <h1 class="mes"><?php echo $meses[$mes - 1] . " - " . $anio ?></h1>
    <div class="gestor">
        <div class="gestorCal">
            <table class="calendario">
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
                    $fecha = mktime(0, 0, 0, $mes, $numDia, $anio); // Se hace esto para averiguar el día de la semana
                    $diaSemana = date('N', $fecha);

                    for ($j = 1; $j <= 7; $j++) {
                        if ($numDia == 1) {
                            for ($j = 1; $j < $diaSemana; $j++) { // Se hace esto para que empiece en el día correcto
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
                    <select name="mes" id="mes">
                        <option value="1" selected>Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                </label>
                <label>Año:
                    <input type="number" name="anio" id="anio" value=<?php echo $anio ?>>
                </label>
                <button type="submit" name="enviar">Enviar</button>
            </form>

            <aside>
                <legend>
                    <form method="post">
                        <ul>
                            <li>Día actual <input type="color" name="colorDiaAct" id="colorDiaAct" value=<?php $colorAct ?>></li>
                            <li>Festivo Nacional <input type="color" name="colorDiaNac" id="colorDiaNac" value=<?php $colorNac ?>></li>
                            <li>Festivo Comunidad Aut. <input type="color" name="colorDiaComAut" id="colorDiaComAut" value=<?php $colorComAut ?>></li>
                            <li>Festivo Local <input type="color" name="colorDiaLocal" id="colorDiaLocal" value=<?php $colorLocal ?>></li>
                        </ul><br>
                        <button type="submit" name="cambiarCol">Cambiar colores</button>
                    </form>
                </legend>
            </aside>
        </div>
        <div class="gestorTareas">
            <h2>Lista de tareas</h2>
            <table>
                <tr>
                    <th>Fecha</th>
                    <th>Tarea</th>
                </tr>
                <?php
                try {
                    $tareas = fopen($archivoTareas, "r") or die("No se ha podido abrir el archivo");
                    while (!feof($tareas)) {
                        $linea = fgets($tareas);
                        $linea = explode(" - ", $linea);
                        echo "<tr>
                        <td>" . (isset($linea[0]) ? $linea[0] : "") . "</td>
                        <td>" . (isset($linea[1]) ? $linea[1] : "") . "</td>
                        </tr>";
                    }
                    fclose($tareas);
                } catch (\Throwable $th) {
                    echo "Ha ocurrido un error: " . $th->getMessage();
                }

                ?>
            </table>

            <h2>Agregar una tarea</h2>
            <form method="post">
                <label>Día:
                    <input type="date" name="dia" id="dia">
                </label><br><br>
                <label>Tarea:
                    <input type="text" name="tarea" id="tarea">
                </label>
                <button type="submit" name="agregarTarea">Agregar</button>
            </form>
        </div>
        <br><br>
    </div>
</body>

</html>

<?php session_destroy()?>