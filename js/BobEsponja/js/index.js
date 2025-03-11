window.addEventListener("DOMContentLoaded",inicio);

function inicio(){
    document.getElementById("consultar").addEventListener("click",consultar);
    // document.getElementById("crear").addEventListener("click",crear);
    // document.getElementById("actualizarPUT").addEventListener("click",actualizarPUT);
    // document.getElementById("actualizarPATCH").addEventListener("click",actualizarPATCH);
    // document.getElementById("eliminar").addEventListener("click",eliminar);
}

async function consultar(){
    let nombre = document.getElementById("nombrePersonaje").value.trim();
    let resultadoDiv = document.getElementById("resultado");

    if(nombre === ""){
        resultadoDiv.innerHTML = "Elige un personaje";
        return;
    }

    try {
        let responsePersonaje = await axios.get("index.php",{
            params: { objeto: JSON.stringify({tabla: "personajes", nombre: nombre})}
        });
        if (responsePersonaje.data.length === 0){
            resultadoDiv.innerHTML ="Personaje no encontrado.";
            return;
        }

        let personaje = responsePersonaje.data[0];
        console.log(personaje);
        


    } catch (error) {
        
    }
}