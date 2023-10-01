<?php

/**
 * 
 * @author Pablo Merida
 * 
 * 2. Sumar los 3 primeros números pares.
 * 
 */
$sumPairs = 0; 
$count = 0;
$num = 0;
while ($count < 3) {
    if ($num % 2 == 0) {
        $sumPairs += $num;
        $count++;
    }
    $num++;
}

echo 'La suma de los 3 primeros pares es de: ' . $sumPairs;