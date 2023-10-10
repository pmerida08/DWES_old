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

// Definimos las variables tipo text con valor inicial
$name = $email = $website = $gender = $comment = "";
// Declarar variables de error para las restricciones de las entradas
$nameErr = $emailErr = $websiteErr = $genderErr = "";

// Para género trabajaremos con un array.
$aGenero = array("Hombre", "Mujer", "Otro");

// Variables para los checkboxes de vehículos.
$aVehiculo = array('Bike', 'Car', 'Patinete');
$vehiculoSeleccionado = array();

// Opciones para el combo.
$aOpciones = array(
    array("valor" => 1, "literal" => "Opción 1"),
    array("valor" => 2, "literal" => "Opción 2"),
    array("valor" => 3, "literal" => "Opción 3"),
    array("valor" => 4, "literal" => "Opción 4")
);
$opcionSeleccionada = 1;

// Variables para la marca de coches.
$cars = array("Renault", "Mercedes", "Citroen", "Volvo", "Seat");
$carsSeleccionados = array();

$lprocesaFormulario = false;
$lerror = false;

// Detectamos error en la validación de los datos del formulario.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lprocesaFormulario = true;

    // Validación del nombre
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $lerror = true;
    } else {
        $name = test_input($_POST["name"]);
    }

    // Validación del email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $lerror = true;
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Formato de correo incorrecto";
            $lerror = true;
        }
    }

    // Validación URL (Propuesta: Formato URL válida)
    $website = test_input($_POST["website"]);

    // Validación comentario (Propuesta: Formato comentario válido)
    $comment = test_input($_POST["comment"]);

    // Validación del género
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
        $lerror = true;
    } else {
        $gender = test_input($_POST["gender"]);
    }

    // Obtener vehículos seleccionados
    if (isset($_POST['vehicle']) && is_array($_POST['vehicle'])) {
        $vehiculoSeleccionado = $_POST['vehicle'];
    }

    // Obtener coches seleccionados
    if (isset($_POST['cars']) && is_array($_POST['cars'])) {
        $carsSeleccionados = $_POST['cars'];
    }

    // Obtener opción seleccionada
    if (isset($_POST['combo'])) {
        $opcionSeleccionada = $_POST['combo'];
    }

    if ($lerror) {
        $lprocesaFormulario = false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios 4</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php
    if (!$lprocesaFormulario) { ?>
        <h1>Validación formulario. PHP</h1>
        <p><span class="error">* Campos requeridos...</span></p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        Nombre: <input type="text" name="name" value="<?php echo $name;?>"><span class="error">* <?php echo $nameErr;?></span><br><br>
        Email: <input type="text" name="email" value="<?php echo $email;?>"><span class="error">* <?php echo $emailErr;?></span><br><br>
        URL: <input type="text" name="website" value="<?php echo $website;?>"><span class="error">* <?php echo $websiteErr;?></span><br><br>
        Comentario: <br>
            <textarea name="comment" cols="40" rows="5"><?php echo $comment?></textarea><br><br>
        Género:
        <?php
            foreach ($aGenero as $valor) {
                $check = ($gender == $valor) ? "checked" : "";
                echo "<input type=\"radio\" name=\"gender\" value=\"$valor\" $check>$valor";
            }    
            echo "<span class=\"error\">* $genderErr</span><br/><br/>";
        ?>
        Transporte:<br>
        <?php
            foreach ($aVehiculo as $valor) {
                $selected = (in_array($valor, $vehiculoSeleccionado)) ? 'checked' : '';
                echo "<input type=\"checkbox\" name=\"vehicle[]\" value=\"$valor\" $selected>$valor";
            }
        ?>
        <br><br>
        Selecciona opción:
            <select name="combo">
            <?php
                foreach ($aOpciones as $valor) {
                    $selected = ($opcionSeleccionada == $valor['valor']) ? 'selected' : '';
                    echo "<option value=\"" . $valor['valor'] . "\" $selected>" . $valor['literal'] . "</option>";
                }
            ?>
            </select>
            <br><br>
        Coche:<br>
        <?php
            foreach ($cars as $valor) {
                $selected = (in_array($valor, $carsSeleccionados)) ? 'checked' : '';
                echo "<input type=\"checkbox\" name=\"cars[]\" value=\"$valor\" $selected>$valor";     
            }
        ?>
        <br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    <?php
    } else {
        echo "<h1>Formulario procesado con éxito.</h1>";
        echo "<p>Nombre: $name</p>";
        echo "<p>Email: $email</p>";
        echo "<p>URL: $website</p>";
        echo "<p>Comentario: $comment</p>";
        echo "<p>Género: $gender</p>";
        echo "<p>Transporte: " . implode(", ", $vehiculoSeleccionado) . "</p>";
        echo "<p>Opción seleccionada: $opcionSeleccionada</p>";
        echo "<p>Coches seleccionados: " . implode(", ", $carsSeleccionados) . "</p>";
    }
    ?>
</body>
</html>
