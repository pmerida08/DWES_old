<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mastermind en PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #eee;
        }

        .board {
            background: #ccc;
            padding: 20px;
            width: 300px;
            margin: auto;
            border-radius: 10px;
        }

        .row {
            display: flex;
            justify-content: center;
            margin-bottom: 5px;
        }

        .slot {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 1px solid black;
            margin: 5px;
        }

        .submit-btn {
            margin-top: 10px;
            padding: 10px;
            background: #333;
            color: white;
            border: none;
            cursor: pointer;
        }

        select {
            margin: 5px;
        }
    </style>
</head>

<body>

    <div class="board">
        <h2>Mastermind</h2>
        <form method="POST">
            <?php
            session_start();

            $colores = ['red', 'blue', 'yellow', 'green', 'orange', 'purple'];
            $checkColours = ["black", "white", "grey"];

            if (!isset($_SESSION['secreto'])) {
                $_SESSION['secreto'] = array_rand(array_flip($colores), 4);
                $_SESSION['intentos'] = [];
            }
            // var_dump($_SESSION['secreto']); 

            if (isset($_POST['jugada'])) {
                $_SESSION['intentos'][] = $_POST['jugada'];
            }

            foreach ($_SESSION['intentos'] as $intento) {
                echo "<div class='row'>";
                foreach ($intento as $color) {
                    echo "<div class='slot' style='background:$color;'></div>";
                }
                echo "</div>";
            }

            if (!empty($_SESSION['intentos'])) {
                $ultimaJugada = end($_SESSION['intentos']);

                if ($ultimaJugada === $_SESSION['secreto']) {
                    echo "<h3>¡Has ganado!</h3>";
                } else {
                    $secretoTemp = $_SESSION['secreto'];
                    $negros = 0;
                    $blancos = 0;

                    // Contar aciertos en color y posición (negros)
                    for ($i = 0; $i < 4; $i++) {
                        if ($ultimaJugada[$i] === $secretoTemp[$i]) {
                            $negros++;
                            $secretoTemp[$i] = null; // Marcar como usado
                            $ultimaJugada[$i] = null;
                        }
                    }

                    

                    // Contar aciertos solo en color (blancos)
                    foreach ($ultimaJugada as $i => $color) {
                        if ($color !== null && in_array($color, $secretoTemp)) {
                            $blancos++;
                            $key = array_search($color, $secretoTemp);
                            $secretoTemp[$key] = null; // Marcar como usado
                        }
                    }

                    

                    echo "<div class='row'>";
                    for ($i = 0; $i < $negros; $i++) {
                        echo "<div class='slot' style='background:{$checkColours[0]};'></div>";
                    }
                    for ($i = 0; $i < $blancos; $i++) {
                        echo "<div class='slot' style='background:{$checkColours[1]};'></div>";
                    }
                    for ($i = 0; $i < 4 - ($negros + $blancos); $i++) {
                        echo "<div class='slot' style='background:{$checkColours[2]};'></div>";
                    }
                    echo "</div>";
                }
            }
            ?>

            <div class="row">
                <?php for ($i = 0; $i < 4; $i++) { ?>
                    <select name="jugada[]">
                        <?php foreach ($colores as $color) { ?>
                            <option value="<?= $color ?>"><?= $color ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
            </div>

            <button type="submit" class="submit-btn">Intentar</button>
        </form>

        <form method="POST">
            <button type="submit" name="reset" class="submit-btn">Reiniciar</button>
        </form>

        <ul>
            <li>Negro -> Posición correcta</li>
            <li>Blanco -> Existe</li>
            <li>Gris -> No existe</li>
        </ul>

        <?php
        if (isset($_POST['reset'])) {
            session_destroy();
            exit();
        }
        ?>
    </div>

</body>

</html>
