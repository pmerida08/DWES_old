// Con AXIOS no ahorra un .then

async function miPeticion() {
  try {
    let response = await axios.get(
      "https://jsonplaceholder.typicode.com/users"
    );

    let json = await response.data;

    json.forEach((element) => {
      console.log(element.username);
    });
  } catch (error) {
    console.log("Tenemos un error: " + error.response.status);
  } finally {
    console.log("Me muestro siempre");
  }
}

miPeticion();
