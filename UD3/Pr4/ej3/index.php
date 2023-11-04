<?php
/**
 * Función para limpiar datos de entrada
 * parametro: cadena procedente de un formulario.
 * return: cadena limpia
 */

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nombre = $correo = $sitioWeb = $sexo = $comentario = "";
$nombreErr = $correoErr = $sitioWebErr = $sexoErr = "";
$generos = array("Masculino", "Femenino", "Otro");
$interesesSeleccionados = array();

$lprocesaFormulario = false;
$lerror = false;

// Validación de los datos del formulario.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lprocesaFormulario = true;

    // Validación del nombre
    if (empty($_POST["nombre"])) {
        $nombreErr = "El nombre es obligatorio";
        $lerror = true;
    } else {
        $nombre = test_input($_POST["nombre"]);
    }

    // Validación del correo
    if (empty($_POST["correo"])) {
        $correoErr = "El correo es obligatorio";
        $lerror = true;
    } else {
        $correo = test_input($_POST["correo"]);
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $correoErr = "Formato de correo incorrecto";
            $lerror = true;
        }
    }

    // Validación del sitio web (Propuesta: Formato de URL válida)
    $sitioWeb = test_input($_POST["sitioWeb"]);

    // Validación del comentario (Propuesta: Formato de comentario válido)
    $comentario = test_input($_POST["comentario"]);

    // Validación del género
    if (empty($_POST["sexo"])) {
        $sexoErr = "El género es obligatorio";
        $lerror = true;
    } else {
        $sexo = test_input($_POST["sexo"]);
    }

    // Intereses seleccionados
    if (isset($_POST['intereses']) && is_array($_POST['intereses'])) {
        $interesesSeleccionados = $_POST['intereses'];
    }

    if ($lerror) {
        $lprocesaFormulario = false;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php
    if (!$lprocesaFormulario) { ?>
        <h1>Curriculum Vitae</h1>
        <p><span class="error">* Campos requeridos...</span></p>
        <form action="<?php echo ($_SERVER["PHP_SELF"]);?>" method="post">
        Nombre: <input type="text" name="nombre" value="<?php echo $nombre;?>"><span class="error">* <?php echo $nombreErr;?></span><br><br>
        Correo: <input type="text" name="correo" value="<?php echo $correo;?>"><span class="error">* <?php echo $correoErr;?></span><br><br>
        Sitio Web: <input type="text" name="sitioWeb" value="<?php echo $sitioWeb;?>"><span class="error">* <?php echo $sitioWebErr;?></span><br><br>
        Comentario: <br>
            <textarea name="comentario" cols="40" rows="5"><?php echo $comentario?></textarea><br><br>
        Género:
        <?php
            foreach ($generos as $genero) {
                $check = ($sexo == $genero) ? "checked" : "";
                echo "<input type=\"radio\" name=\"sexo\" value=\"$genero\" $check>$genero";
            }
            echo "<span class=\"error\">* $sexoErr</span><br/><br/>";
        ?>
        Intereses:
        <?php
            $intereses = array("Deportes", "Música", "Tecnología", "Arte");
            foreach ($intereses as $interes) {
                $checked = in_array($interes, $interesesSeleccionados) ? 'checked' : '';
                echo "<input type=\"checkbox\" name=\"intereses[]\" value=\"$interes\" $checked> $interes";
            }
        ?>
        <br><br>
        <input type="submit" name="submit" value="Enviar">
        </form>
    <?php
    } else {
        echo "<h1>Curriculum Vitae Procesado</h1>";
        echo "<p>Nombre: $nombre</p>";
        echo "<p>Correo: $correo</p>";
        echo "<p>Sitio Web: $sitioWeb</p>";
        echo "<p>Comentario: $comentario</p>";
        echo "<p>Género: $sexo</p>";
        echo "<p>Intereses: " . implode(", ", $interesesSeleccionados) . "</p>";
    }
    ?>
</body>
</html>
