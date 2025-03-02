//EJEMPLO CONTRA UNA API MUY SENCILLA DE FECTH
fetch("https://jsonplaceholder.typicode.com/users")
    .then(response => {
        //console.log(response);
        if(response.ok && response.status == 200){
            let json = response.json(); //Pasamos la promesa a formato JSON
            return json;
        }else{
            throw new Error("Error en la petición al sercidor");
        }
    })
    .then(json => {
        //Podemos acceder a lo que ha devuelto el servidor
        json.forEach(element => {
            console.log(element.username);    
        });
    })
    .catch(e => {console.log(e)});