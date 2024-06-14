<?php

include("../config/tests_cnf.php");


foreach ($aTests as $test) {
    $test_disponibles[] = [$test['idTest'], $test['Permiso'], $test['Categoria']];
}



// Otra manera de hacerlo...

// array_map(function($test) use (&$test_disponibles) {
//     $test_disponibles[] = [$test['idTest'], $test['Permiso'], $test['Categoria']];
// }, $aTests);

// var_dump($test_disponibles);