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
    document.getElementById("clock").innerHTML = `${horas}:${minutos}:${segundos}` 
}

// 2. Ejecutar la función cada segundo. 
setInterval(clockUpdate, 1000)

// Implementar el botón que muestre la fecha actual y la oculte

// 1. Crear un botón en el HTML
// 2. Obtener el botón en el script
button = document.getElementById("fecha_button");
fecha = document.getElementById("date");
// 3. Crear una variable booleana para saber si la fecha está visible
const isVisible = function() {return fecha.style.visibility === "visible"?true:false};
// 4 Crear la función callback que muestre la fecha.
const mostrarFecha = function(){
    const date = new Date();
    fecha.innerHTML = `${date.getDate()}/${date.getMonth()+1}/${date.getFullYear()}` 
    fecha.style.visibility = "visible";
    button.innerHTML = "Ocultar fecha";
    console.log(isVisible());
}
// 5 Crear la función callback que oculte la fecha
const ocultarFecha = function(){
    fecha.style.visibility = "hidden";
    button.innerHTML = "Mostrar fecha";
    console.log(isVisible())
}
const alternarFecha = function(){
    !isVisible()?mostrarFecha():ocultarFecha();
}
// 6. Crear un evento click para mostrar la fecha
button.addEventListener("click", alternarFecha);

// 7. Crear evento para ocultar la fecha
//button.addEventListener("click", ocultarFecha);
