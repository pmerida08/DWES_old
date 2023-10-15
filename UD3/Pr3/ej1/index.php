<?php

/**
 * 
 * @author Pablo Merida Velasco
 * 
 * 1. Definir un array que permita almacenar y mostrar la siguiente información.
 * 
 * a. Meses del año 
 * b. Tablero para jugar al juego de los barcos
 * c. Nota de los alumnos de 2ºDAW para el módulo DWES
 * d. Verbos irregulares en inglés
 * e. Información sobre continentes, países, capitales y banderas.
 * 
 */

 $meses = array('ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE');

 $tableroBarcos = array(
    '1' => array('A', 'B', 'C', 'D', 'E'),
    '2' => array('A', 'B', 'C', 'D', 'E'),
    '3' => array('A', 'B', 'C', 'D', 'E'),
    '4' => array('A', 'B', 'C', 'D', 'E'),
    '5' => array('A', 'B', 'C', 'D', 'E'),
 );

 $notaAlumnos = array(
    'Pablo' => 7,
    'Andres' => 6,
    'Jose Luis' => 6,
    'Javi' => 9
 );

 $irregularVerbs = array(
    'ser/estar' => array('be', 'was/were', 'been'),
    'ganarle' => array('beat', 'beat', 'beaten'),
    'empezar' => array('begin', 'began', 'begun'),
    'doblar' => array('bend', 'bent', 'bent'),
    'morder' => array('bite', 'bit', 'bitten'),

 );

 $continentes = array(
    'Europa' => array(
        'Espania' => array('Madrid', '&#127466; &#127480;'),
        'Alemania' => array('Berlín', '&#127465; &#127466;')
    ),
    'America' => array(
        'Colombia' => array('Bogota', '&#127464;&#127476;'),
        'Argentina' => array('Buenos Aires', '&#127462;&#127479;'),
    )

 );
 
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
 </head>
 <body>
    <span>
        <h1>Meses:</h1> <br>
        <?php
        for ($i=0; $i < count($meses); $i++) { 
            echo $meses[$i]." ";
        }
        ?>
    </span><br>
    <span>
        <h1>Tablero para jugar a los barcos: </h1><br>
        <?php
            foreach ($tableroBarcos as $key => $value) {
                for ($i=0; $i < count($value); $i++) { 
                    echo $key.$value[$i]." ";
                }
                echo '<br>';
            }
        ?>
    </span><br>
    <span>
        <h1>Nota de los alumnos de 2ºDAW para el módulo DWES: </h1><br><br>
        <?php
            foreach ($notaAlumnos as $key => $value) {
                echo "Nota de ".$key. ": ".$value."<br>";
            }
        ?>

    </span><br>
    <span>
        <h1>Verbos irregulares en inglés: </h1><br>
        <?php
            foreach ($irregularVerbs as $spanish => $verb) {
                echo $spanish.": <br>";
                for ($i=0; $i < count($verb); $i++) { 
                    echo "- ".$verb[$i]."<br>";
                }
            }
        ?>

    </span><br>
    <span>
        <h1>Información sobre continentes, países, capitales y banderas: </h1><br>
        <?php
            foreach ($continentes as $continente => $paises) {
                echo $continente.": <br>";
                foreach ($paises as $pais => $info) {
                    echo $pais.": <br>";
                    for ($i=0; $i < count($info); $i++) { 
                        echo "- ".$info[$i]."<br>";
                    }
                } 
            }
        ?>
    </span>



 </body>
 </html>