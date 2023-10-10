 <?php
include('config/config.php');
include('lib/functions.php');

$valoresActuales = array();
$arrayNum = array();

$procesaFormulario = false;
$numAciertos = 0;
$iconoRespuesta = '';
$claseRespuesta = '';

if (isset($_POST['send'])){
    $procesaFormulario = true;
    foreach ($_POST['num'] as $f => $v1) {
        foreach ($v1 as $c => $v2) {
            $arrayNum[] = array('f' => $f, 'c' => $c);
            $valoresActuales[$f][$c] = $v2;
            if ($valoresActuales[$f][$c]==$f*$c){
                $numAciertos++;
            }
        }
    }
}
else {
    # Generacion de numeros aleatorios

    for ($i = 0; $i < NUMINPUTS ; $i++){
        do {
            $f = mt_rand(1, NUMROWS);
            $c = mt_rand(1, NUMROWS);
        } while (existeCoordenada($f, $c, $arrayNum));
        $arrayNum[] = array('f' => $f, 'c' => $c);
        $valoresActuales[$f][$c]='';
    };
}
 ?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <link rel="stylesheet" href="styles/style.css">
 </head>
 <body>
    <form action="" method="post">
    <table class="table1">
        <?php
        echo("<tr class=\"fila\">");
        echo("<td class=\"columna\"></td>");

        for ($i=1; $i <= NUMROWS; $i++) { 
            echo("<td class=\"columna\">".$i."</td>");
        }
        echo "</tr>";

        for ($f=1; $f <= NUMROWS ; $f++) { 
            echo("<tr class=\"fila\">");
            echo("<td class=\"columna\">".$f."</td>");
            for ($c=1; $c <= NUMROWS; $c++) { 
                if (existeCoordenada($f, $c, $arrayNum)) {
                    if ($procesaFormulario) {
                        $iconoRespuesta = $valoresActuales[$f][$c] == $f*$c ? '&#128512' : '&#128534';
                        $claseRespuesta = $valoresActuales[$f][$c] == $f*$c ? 'acierto' : 'fallo';
                    }
                    echo "<td> <input class=\"".$claseRespuesta."\" title=\"".$f."x".$c."\" type=\"text\" name=\"num[".$f."][".$c."]\" value=\"".$valoresActuales[$f][$c]."\">".$iconoRespuesta."</td>";
                } else{
                    echo("<th class=\"row\">".($f * $c)."</th>");
                }
            }
        echo("</tr>");
        }
        ?>
    </table>
    <button name="send">Send</button>
    </form>
 </body>
 </html>