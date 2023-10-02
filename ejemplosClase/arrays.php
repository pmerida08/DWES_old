<?php

    $aPaises = array(
        array('id' => 'es', 'pais' => 'España', 'capital' => 'Madrid'),
        array('id' => 'it', 'pais' => 'Italia', 'capital' => 'Roma'),
        array('id' => 'fr', 'pais' => 'Francia', 'capital' => 'Paris'),
    );

    //Obtener un array con los paises


    //Opcion 1
    echo '<br>Opcion 1 <br>';
    $nombrePaises = array();
    foreach ($aPaises as $pais) {
        $nombrePaises[] = $pais['pais'];
    }
    print_r($nombrePaises);

    //Opcion 2
    echo '<br> Opcion 2 <br>';
    //array_map devuelve un array

    $nombrePaises = array_map(function ($pais){
        return $pais['pais'];
    }, $aPaises);

    print_r($nombrePaises);


    //Crea un script que defina un array de numeros enteros y utilizando una funcion anonima genere un array con el cuadrado de los mismos.
    echo '<br> Cuadrados <br>';
    $numEnteros = array(1, 2, 3, 4, 5);

    $cuadrados = array_map(function ($cuadrado){
        return $cuadrado ** 2;
    }, $numEnteros);

    print_r($cuadrados);
