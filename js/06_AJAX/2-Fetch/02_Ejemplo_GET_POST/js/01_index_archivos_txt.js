document.addEventListener("DOMContentLoaded", () => {
  document.querySelector("#GET").addEventListener("click", () => {
    console.log("Hola");
    
    fetch("ejemplo.php?valor=GET&nombre=Pablo")
      .then(response => {
        if (!response.ok) {
          throw new Error("Error en la petición al servidor");
        }
        return response.text();
      })
      .then((data) => {
        document.querySelector("#mensaje").textContent = data;
      })
      .catch((error) => {
        console.error("Error: ", error);
      });
  });

  document.querySelector("#POST").addEventListener("click", () => {
    fetch("ejemplo.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: "valor=POST&nombre=Pablo",
    })
      .then(response => {
        if (!response.ok) {
          throw new Error("Error en la petición al servidor");
        }
        return response.text();
      })
      .then((data) => {
        document.querySelector("#mensaje").textContent = data;
      })
      .catch((error) => {
        console.error("Error: ", error);
      });
  });
});
