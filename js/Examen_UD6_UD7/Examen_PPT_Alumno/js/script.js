$(function () {
  localStorage.removeItem("oponente");
  localStorage.removeItem("personaje");

  $("#planeta").on("change", function () {
    let planeta = $(this).val();
    if (planeta) {
      cargarPersonajes(); // Llamar a cargar personaje cuando se seleccione un planeta
    }
  });
  getPlanetas();

  asignarOponente();
  $("#confirmarPersonaje").on("click", mostrarPersonajes);
});

function getPlanetas() {
  $.ajax({
    type: "GET",
    url: "php/get_personajes.php",
    data: "data",
    dataType: "json",
    success: function (response) {
      let planetas = [];

      response.forEach((p) => {
        if (!planetas.includes(p.planeta)) {
          planetas.push(p.planeta);
        }
      });

      //   console.log(planetas);

      let selectPlanetas = $("#planeta");
      //   console.log(selectPlanetas);

      selectPlanetas.empty();
      selectPlanetas.append(
        '<option value="" disabled selected>Elige un planeta...</option>'
      );

      planetas.forEach((p) => {
        selectPlanetas.append(`<option value="${p}">${p}</option>`);
      });
      $("#personaje").prop("disabled", false);
    },
  });
}

async function cargarPersonajes() {
  try {
    let response = await axios.get("php/get_personajes.php");

    let personaje = response.data;
    console.log(personaje);

    let selectPersonajes = $("#personaje");
    selectPersonajes.empty(); // Limpiar personaje anteriores

    // Agregar una opción predeterminada
    selectPersonajes.append(
      '<option value="" disabled selected>Elije un personaje...</option>'
    );

    // Insertar personaje ordenados
    personaje.forEach((p) => {
      if (p.planeta == $("#planeta").val())
        selectPersonajes.append(`<option value="${p.id}">${p.nombre}</option>`);
    });

    $("#confirmarPersonaje").prop("disabled", false);
  } catch (error) {
    console.error("Error al cargar personaje: " + error);
  } finally {
    console.log("Petición de personaje realizada.");
  }
}

async function asignarPersonaje() {
  try {
    let response = await axios.get("php/get_personajes.php");

    let personaje = response.data;

    let personajeNombre = $("#personaje").find(":selected").text();

    let personajeElegido = {};
    personaje.forEach((p) => {
      if (p.nombre == personajeNombre) {
        personajeElegido = { id: p.id, nombre: p.nombre, imagen: p.imagen };
      }
    });

    localStorage.setItem("personaje", JSON.stringify(personajeElegido));
  } catch (error) {
    console.error("Error al cargar personaje: " + error);
  } finally {
    console.log("Petición de personaje realizada.");
  }
}

async function asignarOponente() {
  try {
    let response = await axios.get("php/get_personajes.php");

    let personaje = response.data;

    let oponenteId = Math.floor(Math.random() * personaje.length + 1);

    let oponente = {};
    personaje.forEach((p) => {
      if (p.id == oponenteId) {
        oponente = { id: p.id, nombre: p.nombre, imagen: p.imagen };
      }
    });

    localStorage.setItem("oponente", JSON.stringify(oponente));
  } catch (error) {
    console.error("Error al cargar personaje: " + error);
  } finally {
    console.log("Petición de personaje realizada.");
  }
}

// Funcion para mostrar los personajes
function mostrarPersonajes() {
  // Si le das dos veces al botón de seleccionar si que va bien
  $("#arena").css("display", "block");

  asignarPersonaje();
  let personajeElegido = JSON.parse(localStorage.getItem("personaje"));
  let oponente = JSON.parse(localStorage.getItem("oponente"));

  $("#jugador1").text(personajeElegido.nombre);
  $("#jugador2").text(oponente.nombre);
  $("#imgJugador1").prop("src", `img/${personajeElegido.imagen}`);
  $("#imgJugador2").prop("src", `img/${oponente.imagen}`);

  juego();
}

// Funcion del juego
function juego() {
  $("#seccionJuego").show();

  let winsUsuario = 0;
  let winsMaquina = 0;

  $(".eleccion").on("click", function () {
    let eleccionJugador = $(this).data("eleccion");

    let opciones = ["piedra", "papel", "tijera"];
    let eleccionMaquina = opciones[Math.floor(Math.random() * opciones.length)];

    switch (eleccionJugador) {
      case "piedra":
        if (eleccionMaquina == "papel") {
          $("#resultado").text("Perdiste");
          winsMaquina++;
        } else if (eleccionMaquina == "tijera") {
          $("#resultado").text("Ganaste");
          winsUsuario++;
        } else {
          $("#resultado").text("Empate");
        }
        break;
      case "papel":
        if (eleccionMaquina == "tijera") {
          $("#resultado").text("Perdiste");
          winsMaquina++;
        } else if (eleccionMaquina == "piedra") {
          $("#resultado").text("Ganaste");
          winsUsuario++;
        } else {
          $("#resultado").text("Empate");
        }
        break;
      case "tijera":
        if (eleccionMaquina == "piedra") {
          $("#resultado").text("Perdiste");
          winsMaquina++;
        } else if (eleccionMaquina == "papel") {
          $("#resultado").text("Ganaste");
          winsUsuario++;
        } else {
          $("#resultado").text("Empate");
        }
        break;
      default:
        break;
    }

    $("#eleccionJugador").text(eleccionJugador);
    $("#eleccionMaquina").text(eleccionMaquina);
    $("#marcador").text(`${winsUsuario} - ${winsMaquina}`);

    if (winsMaquina + winsUsuario == 3) {
      $(".eleccion").hide();
      if (winsMaquina > winsUsuario) {
        alert("Has perdido");
        location.reload();
      } else {
        alert("Has ganado");
        location.reload();
      }
    }
  });

  async function addCombate() {
    let personajeElegido = JSON.stringify(localStorage.getItem("personaje"));
    let oponente = JSON.stringify(localStorage.getItem("oponente"));
    let parametros = {
      personaje1: personajeElegido,
      personaje2: oponente,
      resultado: "resultado",
    };

    $.ajax({
      type: "POST",
      url: "php/guardar_combate.php",
      data: parametros,
      dataType: "json",
    })
      .then(function (respuesta) {})
      .fail(function (error) {
        console.error("Error con la petición: " + error);
      })
      .always(function () {
        console.log("Petición realizada.");
      });
  }
}
