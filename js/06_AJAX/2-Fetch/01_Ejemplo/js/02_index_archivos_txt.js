document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("cambiaContenido").addEventListener("click", () => {
    fetch("holamundo.txt")
      .then((respuesta) => {
        if (!respuesta.ok) {
          throw new Error("Error en la petición al servidor");
        }
        return respuesta.text();
      })
      .then((contenido) => {
        document.getElementById("contenido").innerHTML = contenido;
      })
      .catch((error) => {
        console.log("Error: ", error);
      });
  });
});
