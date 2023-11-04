<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numInputs = $_POST['numInputs'];
    $sum = 0;
    for ($i = 1; $i <= $numInputs; $i++) {
        $input_name = 'input_' . $i;
        if (isset($_POST[$input_name])) {
            $sum += $_POST[$input_name];
        }
    }
    echo "La suma de los números es: $sum";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Suma de números</title>
</head>
<body>
    <form method="post">
        <label for="numInputs">Número de inputs:</label>
        <input type="number" name="numInputs"><br><br>
        <?php
        if (isset($_POST['numInputs'])) {
            $numInputs = $_POST['numInputs'];
            for ($i = 1; $i <= $numInputs; $i++) {
                echo "<label for='input_$i'>Número $i:</label>";
                echo "<input type='number' id='input_$i' name='input_$i' required><br><br>";
            }
            echo "<input type='submit' value='Sumar'>";
        }
        ?>
    </form>
</body>
</html>
