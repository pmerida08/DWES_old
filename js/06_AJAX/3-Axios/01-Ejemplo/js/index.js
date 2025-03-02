// Con AXIOS no ahorra un .then

axios
  .get("https://jsonplaceholder.typicode.com/users")
  .then((response) => {
    response.data.forEach((element) => {
      console.log(element.username);
    });
  })
  .catch((error) => {
    console.log("Tenemos un error: " + error.response.status);
  })
  .finally(() => {
    console.log("Me muestro siempre");
  });
