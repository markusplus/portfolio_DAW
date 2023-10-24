// programación de un reloj digital en JavaScript

// 1. Crear la función que actualice el reloj

const clockUpdate = function(){
    const date = new Date();
    horas = date.getHours()
    if(horas < 10) {
        horas = "0" + horas;
    }
    minutos = date.getMinutes()
    if(minutos < 10) {
        minutos = "0" + minutos;
    }
    segundos = date.getSeconds()
    if(segundos < 10) {
        segundos = "0" + segundos;
    }
    document.getElementById("clock").innerHTML = `${horas} : ${minutos} : ${segundos}` 
    // document.getElementById("horas").textContent = date.getHours();
    // document.getElementById("minutos").textContent = date.getMinutes();
    // document.getElementById("segundos").textContent = date.getSeconds();
}

// 2. Ejecutar la función cada segundo. 
setInterval(clockUpdate, 1000)

// Implementar el botón que muestre la fecha actual y la oculte

// 1. Crear un botón en el HTML
// 2. Obtener el botón en el script
var button = document.getElementById("fecha_button");
// 3. Crear una variable booleana para saber si la fecha está visible
let isVisible = document.getElementById("date").isVisible
// 4 Crear la función callback que muestre la fecha.
/*
const mostrarFecha = function(){
    ....
    ....
    ....
}
*/


// 5 Crear la función callback que oculte la fecha
/*
const ocultarFecha = function(){
    .....
    .....
    .....
}
*/


// 6. Crear un evento click para mostrar la fecha
// ...........

// 7. Crear evento para ocultar la fecha
// ...........