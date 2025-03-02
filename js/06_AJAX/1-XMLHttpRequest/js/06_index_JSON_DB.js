document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("boton").addEventListener("click", mostrar);
});

function mostrar(){
    // Quedarnos con el valor que ha puesto el usuario
    var puntos = document.getElementById("puntuacion").value;

    // Crear un objeto JSON con los datos para enviarlos al servidor
    var objeto = {
        "tabla": "alumnos",
        "valor": parseInt(puntos)
    };

    // Creamos la instancia de XMLHttpRequest
    var xhr = new XMLHttpRequest();
    var txt = "";

    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200){
            var array = JSON.parse(this.responseText);
            // Recorremos el resultado
            for (var a in array){
                txt += array[a].alumno + " : " + array[a].puntuacion + "<br/>";
            }
            document.getElementById("texto").innerHTML = txt;
        }
    };

    // Convertir el objeto JSON a una cadena de texto para enviarlo en la petición AJAX
    var parametros = JSON.stringify(objeto);

    // OPCIÓN 1 - GET
    xhr.open("GET", "Ajax_JSON_bbdd.php?objeto=" + parametros, true);
    xhr.send();
}
