<?php
/**
 * 
 * * author: Pablo Mérida Velasco
 * * date: 27/09/2023
 * 
 * 
 */

$mes = 2;
$anio = 2024;
$nDias = 31;

switch ($mes) {
    case 1:
        printf("El mes de Enero tiene %d días.", $nDias);
        break;
    
    case 2:
        if ($anio % 4 == 0 && ($anio % 400 == 0 || $anio % 100 != 0 )){
            printf("El mes de Febrero tiene %d días.", $nDias - 2);
            break;
        } else {
            printf("El mes de Febrero tiene %d días.", $nDias - 3);
            break;
        }
            
    case 3:
        printf("El mes de Marzo tiene %d días.", $nDias);
        break;
    
    case 4:
        printf("El mes de Abril tiene %d días.", $nDias -1);
        break;
    
    case 5:
        printf("El mes de Mayo tiene tiene %d días.", $nDias);
        break;
    
    case 6:
        printf("El mes de Junio tiene tiene %d días.", $nDias -1);
        break;
    
    case 7:
        printf("El mes de Julio tiene tiene %d días.", $nDias);
        break;
    
    case 8:
        printf("El mes de Agosto tiene %d días.", $nDias);
        break;
    
    case 9:
        printf("El mes de Septiembre tiene tiene %d días.", $nDias -1);
        break;
    
    case 10:
        printf("El mes de Octubre tiene %d días.", $nDias);
        break;
    
    case 11:
        printf("El mes de Noviembre tiene %d días.", $nDias -1);
        break;
    
    case 12:
        printf("El mes de Diciembre tiene %d días.", $nDias);
        break;    
}