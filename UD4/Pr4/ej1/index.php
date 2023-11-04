<?php
/**
 * 
 * 
 * 
 */

$csv_file = 'config/RegMisAlu.csv';
$file = fopen($csv_file, 'r');


function check_name($name) {
    $encoding = mb_detect_encoding($name, 'UTF-8, ISO-8859-1', true);
    $name = iconv($encoding, 'ASCII//TRANSLIT', $name);
    $name = trim(strtolower($name));

    // Quita caracteres que son sustituidos por tildes y ñ
    $caracteres_a_eliminar = array("~", "'");
    $name = str_replace($caracteres_a_eliminar, '', $name);
    
    return $name;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
        $alumno = fgetcsv($file);

        while (($fila = fgetcsv($file)) !== false) {
            $alumno = $fila[0];
            $alumno_checked = check_name($alumno);
            echo "$alumno_checked\n";
        }

        fclose($file);
    ?>
    
</body>
</html>