$(function () {
  $(".grabar").css("display", "none");
  $("#cdgCli").on("blur", buscarCliente);
  //   $("#fecha").on("blur", inputFecha);
  $("#categorias").on("change", function () {
    let categoriaId = $(this).val();
    if (categoriaId) {
      cargarEventos(categoriaId); // Llamar a cargar eventos cuando se seleccione una categoría
    }
  });
  cargarCategorias();

  $("#entradas").on("input", function () {
    let ctgId = $("#categorias").val();
    if (ctgId) {
      verificarEntradas(ctgId);
    }
  });

  $(".form-datos").on("submit", addEvento);
  
});

// Cliente
function buscarCliente() {
  let cdgCli = $("#cdgCli").val();
  let parametros = {
    cliente: cdgCli,
  };

  $.ajax({
    type: "POST",
    url: "php/cliente.php",
    data: parametros,
    dataType: "json",
  })
    .then(function (respuesta) {
      $("#nameCli").val(respuesta.data[0].nomApe);
    })
    .fail(function (error) {
      console.error("Error con la petición: " + error);
      $("#nameCli").val("Cliente no existe");
    })
    .always(function () {
      console.log("Petición realizada.");
    });
}

// Fecha
const inputFecha = () => {};

//  Cargar Categorias

async function cargarCategorias() {
  try {
    let response = await axios.get("php/categorias.php");

    let categorias = response.data.data;

    // Ordenar categorías por la descripción (orden alfabético)
    categorias.sort((a, b) => a.descripcion.localeCompare(b.descripcion));

    let select = $("#categorias");
    select.empty(); // Limpiar opciones previas

    // Agregar una opción predeterminada
    select.append(
      '<option value="" disabled selected>Seleccione una categoría</option>'
    );

    // Insertar las categorías ordenadas
    categorias.forEach((categoria) => {
      select.append(
        `<option value="${categoria.id}">${categoria.descripcion}</option>`
      );
    });
  } catch (error) {
    console.error("Error con la petición: " + error);
  } finally {
    console.log("Petición realizada.");
  }
}

// Cargar eventos

async function cargarEventos(categoriaId) {
  try {
    let response = await axios.get("php/eventos.php", {
      params: { categoria: categoriaId }, // Enviar el id de la categoría como parámetro
    });

    let eventos = response.data.data;

    // Ordenar eventos alfabéticamente por su descripción
    eventos.sort((a, b) => a.descripcion.localeCompare(b.descripcion));

    let selectEventos = $("#eventos");
    selectEventos.empty(); // Limpiar eventos anteriores

    // Agregar una opción predeterminada
    selectEventos.append(
      '<option value="" disabled selected>Seleccione un evento</option>'
    );

    // Insertar eventos ordenados
    eventos.forEach((evento) => {
      selectEventos.append(
        `<option value="${evento.id}">${evento.descripcion}</option>`
      );
    });
  } catch (error) {
    console.error("Error al cargar eventos: " + error);
  } finally {
    console.log("Petición de eventos realizada.");
  }
}

// Comprobar entradas

async function verificarEntradas(categoriaId) {
  try {
    let response = await axios.get("php/eventos.php", {
      params: { categoria: categoriaId }, // Enviar el id del evento y la cantidad de entradas
    });

    let eventos = response.data.data; // Suponemos que devuelve un solo evento

    let eventoElegido = eventos.find(
      (evento) => evento.idcategoria == categoriaId
    );

    let disponibles = parseInt(eventoElegido.entradas); // Entradas disponibles

    let entradas = parseInt($("#entradas").val()); // Cantidad de entradas solicitadas

    if (entradas > disponibles) {
      $(".errorAforo").text("No hay suficientes entradas disponibles");
    } else {
      $(".errorAforo").text("");
    }
  } catch (error) {
    console.error("Error al verificar entradas: " + error);
  }
}

// Agregar evento
async function addEvento(event) {
  event.preventDefault();

  let id = $("#cdgCli").val();
  let nameCli = $("#nameCli").val();
  let idCategoria = $("#categorias").val();
  let selectCategorias = $("#categorias").find(":selected").text();
  let selectEventos = $("#eventos").val();
  let fecha = new Date($("#fecha").val()).toLocaleDateString();
  let entradas = parseInt($("#entradas").val());

  try {
    if ((!id, !nameCli, !selectCategorias, !selectEventos, !fecha, !entradas)) {
      throw new Error("Todos los campos son obligatorios");
    } else {
      let response = await axios.get(
        `php/eventos.php?categoria=${idCategoria}`
      );
      let data = response.data.data;
      console.log(data);
      
      data.forEach((evento) => {
        if (evento.id == selectEventos) {
          let cuerpoTabla = $(".table-condensed > tbody");

          let fila = `<tr data-id="${selectEventos}">
            <td>${selectCategorias}</td>
            <td>${entradas}</td>
            <td>${evento.precioEntrada}</td>
            <td>${evento.entradas}</td>
            <td><button class="btn btn-danger btn-sm editar">Editar</button></td>
            <td><button class="btn btn-danger btn-sm eliminar">Eliminar</button>
          </td>`;

          cuerpoTabla.append(fila);
          $(".grabar").css("display", "block");
        }
      });
    }
  } catch (error) {
    console.error("Error al agregar evento: " + error);
  }
  
//   $('.grabar').click(function () {
//     // Recogemos los datos de la tabla
//     const table = $('.table tbody tr');

//     // Por cada fila ejecutamos una petición AJAX
//     table.each(function (index, element) {
//         const usuario = $('#cdgCli').val();
//         const idEvento = $(element).find('td').eq(0).text();
//         const entradas = $(element).find('td').eq(2).text();
//         const total = $(element).find('td').eq(4).text();
//         const fecha = $(element).find('td').eq(5).text();

//         // Realizamos la petición AJAX
//         axios.post('php/compra.php', new URLSearchParams({
//             usuario: usuario,
//             idEvento: idEvento,
//             entradas: entradas,
//             importe: total,
//             fecha: fecha
//         }))
//             .then(function (response) {
//                 console.log(response);
//             })
//             .catch(function (error) {
//                 // Si hay un error, lo mostramos por consola
//                 console.error(error);
//         });

//         // Actualizamos el número de entradas en la base de datos
//         axios.post('php/actualizarEntradas.php', new URLSearchParams({
//             evento: idEvento,
//             tickets: entradas
//         }));
//     });

//     // Vaciamos la tabla, ocultamos el botón de grabar
//     $('.table tbody').empty();
//     $('button[type="type"]').hide();
// });
}


