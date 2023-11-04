<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/muestraVerbos.css">
    <title>Formulario de Verbos</title>
</head>
<body>
    <form method='post' action='corregir.php' class="verbos-form">
        <table class="verbos-table">
            <?php foreach ($indiceVerbosAleatorios as $key => $indiceVerbo) { ?>
                <tr>
                    <?php
                    $posicionInput = array_rand([0, 1, 2, 3], $dificultad);
                    if (!is_array($posicionInput)) {
                        $posicionInput = [$posicionInput];
                    }
                    $verbosDelIndice = $verbos[$indiceVerbo];

                    foreach ($verbosDelIndice as $clave => $valor) { ?>
                        <td>
                            <?php if (in_array($clave, $posicionInput)) { ?>
                                <input type='text' name='respuestas[<?=$indiceVerbo?>][<?=$clave?>]' required class="verbos-input">
                            <?php } else { ?>
                                <span class="verbos-span"><?=$valor?></span>
                            <?php } ?>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>
        <input type='submit' name='corregir' value='Corregir' class="verbos-submit">
    </form>
</body>
</html>
