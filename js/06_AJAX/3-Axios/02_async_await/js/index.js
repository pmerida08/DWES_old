async function miPeticion(){
try {
    let response = await axios.get("https://jsonplaceholder.typicode.com/users");
    let json = await response.data;
    json.forEach(element => {
        console.log(element.name); // Mostramos el nombre de cada usuario
    });
} catch (error) {
    console.log("Tenemos un error ",error.response.status);
}finally{
    console.log("--Me ves siempre--");
    
}
}
miPeticion();