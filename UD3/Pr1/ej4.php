<?php
    /**
     * 
     * @author Pablo Merida Velasco
     * 
     * 4. Modifica la página inicial realizada, incluyendo una imagen de cabecera en función de la estación del año en la que nos encontremos y un color de fondo en función de la hora del día.
     */
    $hora = 2; 
    $mes = 12;

    if ($hora > 24) {
        echo 'La hora introducida es errónea';
    };

    if ($hora >= 12 && $hora <= 24) {
        echo '<style>
                body{
                    background-color: orange;
                }
            </style>
            <p>Es por la tarde</p>';
    };

    if ($hora < 12 && $hora <= 24) {
        echo '<style>
                body{
                    background-color: lightblue;
                }
            </style>
            <p>Es por la mañana</p>';
    };

    switch ($mes) {
        case 12:
        case 1: 
        case 2:
            echo '<br><img src="img/invierno.jpg" height=30% width=30% alt="invierno">';
            break;

        case 3:
        case 4: 
        case 5:
            echo '<br><img src="img/primavera.jpg" height=30% width=30% alt="primavera">';
            break;
        
        case 7:
        case 8:
        case 9:
            echo '<br><img src="img/verano.jpg" height=30% width=30% alt="verano">';
            break;
        
        case 10:
        case 11:
            echo '<br><img src="img/otono.jpg" height=30% width=30% alt="otono">';
            break;
    }
?>
