<?php
/**
 * 
 * 
 * @author Pablo Merida Velasco
 * 
 * 1. Crear una aplicación que permita mediante un formulario practicar el
 * aprendizaje de los verbos irregulares en inglés.
 * Criterios de validación:
 * 
 * • Array de configuración con todos los verbos.
 * 
 * • Formulario configuración que permita seleccionar número de verbos y 
 * número de preguntas por verbo. Incluye un input tipo text y una lista
 * desplegable.
 * 
 * • Formulario de entrada según los datos recogidos en el formulario de
 * configuración y mostrado conjuntamente.
 * 
 * • Validación del formulario mostrando el porcentaje de aciertos y marcando de
 * manera diferenciada los aciertos de los fallos.
 * 
 * • Opción que permita mostrar todas las respuestas.
 * 
 * • Aplicar estilos y criterios de usabilidad.
 * 
 */

 $arrayEnglish = array(
    "ser/estar" => array("am", "was", "been"),
    "ganarle (a alguien)" => array("beat", "beat", "beaten"),
    "empezar" => array("begin", "began", "begun"),
    "doblar" => array("bend", "bent", "bent"),
    "morder" => array("bite", "bit", "bitten"),
    "soplar" => array("blow", "blew", "blown"),
    "romper" => array("break", "broke", "broken"),
    "llevar, traer" => array("bring", "brought", "brought"),
    "construir" => array("build", "built", "built"),
    "comprar" => array("buy", "bought", "bought"),
    "coger" => array("catch", "caught", "caught"),
    "elegir" => array("choose", "chose", "chosen"),
    "venir" => array("come", "came", "come"),
    "costar" => array("cost", "cost", "cost"),
    "hacer" => array("do", "did", "done"),
    "dibujar" => array("draw", "drew", "drawn"),
    "soñar" => array("dream", "dreamed", "dreamed"),
    "conducir" => array("drive", "drove", "driven"),
    "beber" => array("drink", "drank", "drunk"),
    "comer" => array("eat", "ate", "eaten"),
    "caer" => array("fall", "fell", "fallen"),
    "sentir" => array("feel", "felt", "felt"),
    "luchar" => array("fight", "fought", "fought"),
    "encontrar" => array("find", "found", "found"),
    "volar" => array("fly", "flew", "flown"),
    "olvidar" => array("forget", "forgot", "forgotten"),
    "perdonar" => array("forgive", "forgave", "forgiven"),
    "conseguir" => array("get", "got", "gotten"),
    "dar" => array("give", "gave", "given"),
    "ir" => array("go", "went", "gone"),
    "crecer" => array("grow", "grew", "grown"),
    "tener" => array("have", "had", "had"),
    "oír" => array("hear", "heard", "heard"),
    "esconder" => array("hide", "hid", "hidden"),
    "golpear" => array("hit", "hit", "hit"),
    "sujetar" => array("hold", "held", "held"),
    "doler" => array("hurt", "hurt", "hurt"),
    "guardar" => array("keep", "kept", "kept"),
    "saber" => array("know", "knew", "known"),
    "aprender" => array("learn", "learned", "learned"),
    "marcharse" => array("leave", "left", "left"),
    "prestar" => array("lend", "lent", "lent"),
    "permitir" => array("let", "let", "let"),
    "perder" => array("lose", "lost", "lost"),
    "hacer, fabricar" => array("make", "made", "made"),
    "significar, querer decir" => array("mean", "meant", "meant"),
    "conocer por primera vez, quedar" => array("meet", "met", "met"),
    "pagar" => array("pay", "paid", "paid"),
    "poner" => array("put", "put", "put"),
    "leer" => array("read", "read", "read"),
    "sonar, llamar por telefono" => array("ring", "rang", "rung"),
    "levantar" => array("rise", "rose", "risen"),
    "correr" => array("run", "ran", "run"),
    "decir" => array("say", "said", "said"),
    "ver" => array("see", "saw", "seen"),
    "vender" => array("sell", "sold", "sold"),
    "enviar" => array("send", "sent", "sent"),
    "mostrar, demostrar" => array("show", "showed", "shown"),
    "cerrar" => array("shut", "shut", "shut"),
    "cantar" => array("sing", "sang", "sung"),
    "sentarse" => array("sit", "sat", "sat"),
    "dormir" => array("sleep", "slept", "slept"),
    "hablar" => array("speak", "spoke", "spoken"),
    "gastar" => array("spend", "spent", "spent"),
    "estar de pie" => array("stand", "stood", "stood"),
    "nadar" => array("swim", "swam", "swum"),
    "tomar" => array("take", "took", "taken"),
    "enseñar" => array("teach", "taught", "taught"),
    "contar, decirle a alguien" => array("tell", "told", "told"),
    "pensar" => array("think", "thought", "thought"),
    "lanzar, arrojar" => array("throw", "threw", "thrown"),
    "entender" => array("understand", "understood", "understood"),
    "despertar" => array("wake", "woke", "woken"),
    "llevar puesto, ponerse" => array("wear", "wore", "worn"),
    "ganar" => array("win", "won", "won"),
    "escribir" => array("write", "wrote", "written")
 );

 if(isset($_POST['submit'])){

 };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <style>
        * {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: beige;
            margin: 20px 30px;
        }
        p

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .list {
            list-style: none;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
            margin: 10px 30px;
            padding: 40px;
            text-align: center;
        }

        .verb {
            font-weight: 600;
            font-style: oblique;
        }


    </style>
</head>
<body>
    <form method="post">
        <h1>Verbos irregulares inglés</h1>
        <label>Número de verbos del test: </label>
        <input type="number" name="numVerbs" id="numVerbs">
        <label>Elige dificultad: </label>
        <select name="difficulty" id="difficulty">
            <option value="1">Fácil</option>
            <option value="2">Medio</option>
            <option value="3">Difícil</option>
        </select>
        <button type="submit" name="submit">Enviar</button>
            <?php 
                foreach ($arrayEnglish as $spanish => $verbs) {
                    echo "<p class='verb'>".$spanish."</p>";
                    echo "<ul class='list'>";
                    foreach ($verbs as $verb) {
                        echo "<li>".$verb."</li>";                 
                    }
                    echo "</ul>";
                }
            ?>
    </form>
</body>
</html>

