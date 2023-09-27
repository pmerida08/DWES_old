<?php

/**
 * author: Pablo Mérida Velasco
 * date: 27/09/2023
 * 
 */
$num1 = 7;
$num2 = 14;
$num3 = 1;

if ($num1 < $num2 && $num2 < $num3) {
    echo $num1.", ".$num2.", ".$num3; 
} elseif ($num1 < $num3 && $num3 < $num2) {
    echo $num1.", ".$num3.", ".$num2; 
} elseif ($num2 < $num1 && $num1 < $num3) {
    echo $num2.", ".$num1.", ".$num3; 
} elseif ($num2 < $num3 && $num3 < $num1) {
    echo $num2.", ".$num3.", ".$num1; 
} elseif ($num3 < $num2 && $num2 < $num1) {
    echo $num3.", ".$num2.", ".$num1; 
} else {
    echo $num3.", ".$num1.", ".$num2; 
}
