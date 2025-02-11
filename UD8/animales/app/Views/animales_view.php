<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animales</title>
</head>

<body>
    <h1>Animales</h1>
    <h2>Listado de animales</h2>
    <form action="" method="post">
        <input type="text" name="filter" id="filter" onkeyup="showAnimalesFetch(this.value)">
    </form>

    <?php include 'list.animales.view.php'; ?>
    <script>
        function showAnimales(str) {
            var xhttp;
            if (str.length == 0) {
                document.getElementById("resultado").innerHTML = "";
                return;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("resultado").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "http://animales.local/getAnimales.php?q=" + str, true);
            xmlhttp.send();
        }

        function showAnimalesFetch(str) {
            var xhttp;
            if (str.length == 0) {
                document.getElementById("resultado").innerHTML = "";
                return;
            }

            fetch("http://animales.local/getAnimales.php?q=" + str).then(response => response.text()).then(data => {
                document.getElementById("resultado").innerHTML = data;
            }).catch(error => {
                console.error(error);
            });
        }
    </script>

</body>

</html>