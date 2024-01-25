const button = document.getElementById("submit_btn");
// Definición de usuarios registrados en formato JSON
const jsonRegistrados = `[{
    "nombre": "juan",
    "apellidos": "garcía",
    "edad": 23,
    "sexo": "Masculino",
    "email": "juan.garcia@gmail.com",
    "contraseña": "abcde"},  
{
    "nombre": "lucia",
    "apellidos": "martinez",
    "edad": 25,
    "sexo": "Femenino",
    "email": "lucia.martinez@gmail.com",
    "contraseña":"1234"
}]`

// Parseo de la cadena JSON a un array de objetos de usuarios
const registrados = JSON.parse(jsonRegistrados);

// Definición de la clase Registrado para representar a un usuario

class Registrado {
    constructor(nombre, apellidos, edad, sexo, email, contrasena) {
        this.nombre = nombre;
        this.apellidos = apellidos;
        this.edad = edad;
        this.sexo = sexo;
        this.email = email;
        this.contrasena = contrasena;
    }
}
// Creación de una colección de objetos 'Registrado' a partir del array de usuarios registrados
const collecion_registrados = registrados.map(({nombre, apellidos, edad, sexo, email, contraseña}) => 
new Registrado(nombre, apellidos, edad, sexo, email, contraseña));

// Función para filtrar usuarios de la colección según los valores del formulario

const filter_user_from_collection = function(){
    const nombre = document.getElementById("nombre").value;
    const apellidos = document.getElementById("apellidos").value;
    const edad = document.getElementById("edad").value;
    const sexo = document.querySelector('#sexo').value;
    const email = document.getElementById("email").value;
    const contrasena = document.getElementById("contrasena").value;
    const filtrados = collecion_registrados.filter(registrado => registrado.nombre === nombre && registrado.apellidos === apellidos && registrado.edad === parseInt(edad) && registrado.sexo === sexo && registrado.email === email && registrado.contrasena === contrasena);
    return filtrados;
}

// Inicialización de la imagen y sus estilos
const img = document.createElement("img");

img.src = "";
img.style.width = "40px";
img.style.height = "40px";
img.style.left = "50%";
img.style.borderRadius = "50%";
img.style.margin = "0 auto";
img.style.display = "none";

document.getElementsByClassName("icon")[0].appendChild(img);

//Mostrar imagen

const mostrarImagen = function(){
    img.style.display = "block";
}

//Ocultar imagen

const ocultarImagen = function(){
    img.style.display = "none";
}

//Alternar imagen

const imagenSuccess = function(){
    img.src = "imgs/success.png";
}

const imagenError = function(){
    img.src = "imgs/error.png";
}

// Función para comprobar si los campos del formulario están rellenos

const comprobarCamposRellenos = function(){
    const nombre = document.getElementById("nombre").value;
    const apellidos = document.getElementById("apellidos").value;
    const edad = document.getElementById("edad").value;
    const sexo = document.querySelector('#sexo').value;
    const email = document.getElementById("email").value;
    const contrasena = document.getElementById("contrasena").value;
    if (nombre === "" || apellidos === "" || edad === "" || sexo === "none" || email === "" || contrasena === ""){
        return false;
    }
    else {
        return true;
    }
}

// Función para borrar los campos del formulario 

const borrarCampos = function(){
    document.getElementById("nombre").value = "";
    document.getElementById("apellidos").value = "";
    document.getElementById("edad").value = "";
    document.querySelector("#sexo").value = "none";
    document.getElementById("email").value = "";
    document.getElementById("contrasena").value = "";
}

// Función principal de validación
const validar = function(){
    const error = document.createElement("p");
    if((error.innerHTML = compruebaCampo("")) === ""){
        if (comprobarCamposRellenos()){
            const filtrados = filter_user_from_collection();
            if (filtrados.length > 0){
                imagenSuccess();
                mostrarImagen();
                setTimeout(() => {ocultarImagen();borrarCampos();window.location.href = "src/page_successful.html"; document.activeElement.blur();}, 2000);
            } else {
                imagenError();
                mostrarImagen();
                setTimeout(() => {ocultarImagen();borrarCampos(); document.activeElement.blur();}, 2000);
            }
        }
        else {
            imagenError();
            mostrarImagen();
            setTimeout(() => {borrarCampos(); ocultarImagen();document.activeElement.blur();}, 2000);
        }
    } else {
        document.getElementById("errorcase").style.textAlign = "left";
        document.getElementById("errorcase").appendChild(error);
    }
}

const compruebaCampo = function(id){
    var result = "";
    var cont = 0;
    const nombre = document.getElementById("nombre").value;
    const apellidos = document.getElementById("apellidos").value;
    const edad = document.getElementById("edad").value;
    const sexo = document.querySelector('#sexo').value;
    const email = document.getElementById("email").value;
    const contrasena = document.getElementById("contrasena").value;
    if (id === "nombre" || id === ""){
        if (nombre === ""){
            result += "El campo 'nombre' no puede estar vacío.<br>";
            cont++;
        }
    }
    if (id === "apellidos" || id === ""){
        if (apellidos === ""){
            result += "El campo 'apellidos' no puede estar vacío.<br>";
            cont++;
        }
    }
    if (id === "edad" || id === ""){
        if (edad === ""){
            result += "El campo 'edad' no puede estar vacío.<br>";
            cont++;
        }
    }
    if (id === "sexo" || id === ""){
        if (sexo === "none"){
            result += "El campo 'sexo' no puede estar vacío.<br>";
            cont++;
        }
    }
    if (id === "email" || id === ""){
        if (email === ""){
            result += "El campo 'email' no puede estar vacío.<br>";
            cont++;
        }
    }
    if (id === "contrasena" || id === ""){
        if (contrasena === ""){
            result += "El campo 'contraseña' no puede estar vacío.<br>";
            cont++;
        }
    }
    if (cont > 3){
        result = "Hay más de 3 campos vacíos.<br>";
    }
    return result;
}

// Cambio de color del botón al pasar el ratón por encima con un hover

const changeButtonColorOnHover = function() {
    
    button.addEventListener("mouseover", function() {
        button.style.backgroundColor = "green";
    });
    
    button.addEventListener("mouseout", function() {
        devolverColorBoton();
    });
}
changeButtonColorOnHover();

// Devuelvo el color original al botón al quitar el ratón

const devolverColorBoton = function(){
    document.getElementById("submit_btn").style.backgroundColor = "#083eb2";
}

// Validación al pulsar Enter y flechas arriba y abajo para cambiar de campo
const error = document.createElement("p");

const validarEnter = function(event){
    if (event.keyCode === 13){
        if (document.activeElement.nextElementSibling.id === "registro"){
            validar();
        } else if ((error.innerHTML = compruebaCampo(document.activeElement.id)) !== ""){
            document.getElementById("errorcase").innerHTML = "";
            document.getElementById("errorcase").appendChild(error);
        } else {
            document.activeElement.nextElementSibling.focus();
        }
    }
}

document.addEventListener("keydown", validarEnter);

const validarFlechas = function(event){
    if (event.keyCode === 38){
        document.activeElement.previousElementSibling.focus();
    } else if (event.keyCode === 40){
        document.activeElement.nextElementSibling.focus();
    }
}

document.addEventListener("keydown", validarFlechas);

// Cambio de color del borde de los campos del nombre y placeholder

const cambiarColorNombre = function(){
    document.getElementById("nombre").style.borderColor = "white";
    document.getElementById("nombre").placeholder = "";
}

const devolverColorNombre = function(){
    document.getElementById("nombre").style.borderColor = "#1f53c5";
    document.getElementById("nombre").placeholder = "Ingrese su nombre";
}

// Cambio de color del borde de los campos de los apellidos y placeholder

const cambiarColorApellidos = function(){
    document.getElementById("apellidos").style.borderColor = "white";
    document.getElementById("apellidos").placeholder = "";
}

const devolverColorApellidos = function(){
    document.getElementById("apellidos").style.borderColor = "#1f53c5";
    document.getElementById("apellidos").placeholder = "Ingrese sus apellidos";
}

// Cambio de color del borde de los campos de la edad y placeholder

const cambiarColorEdad = function(){
    document.getElementById("edad").style.borderColor = "white";
    document.getElementById("edad").placeholder = "";
}

const devolverColorEdad = function(){
    document.getElementById("edad").style.borderColor = "#1f53c5";
    document.getElementById("edad").placeholder = "Ingrese su edad";
}

// Cambio de color del borde de los campos del sexo y placeholder

const cambiarColorSexo = function(){
    document.getElementById("sexo").style.borderColor = "white";
}

const devolverColorSexo = function(){
    document.getElementById("sexo").style.borderColor = "#1f53c5";
}

// Cambio de color del borde de los campos del email y placeholder

const cambiarColorEmail = function(){
    document.getElementById("email").style.borderColor = "white";
    document.getElementById("email").placeholder = "";
}

const devolverColorEmail = function(){
    document.getElementById("email").style.borderColor = "#1f53c5";
    document.getElementById("email").placeholder = "Ingrese su email";
}

// Cambio de color del borde de los campos de la contraseña y placeholder

const cambiarColorContrasena = function(){
    document.getElementById("contrasena").style.borderColor = "white";
    document.getElementById("contrasena").placeholder = "";
}

const devolverColorContrasena = function(){
    document.getElementById("contrasena").style.borderColor = "#1f53c5";
    document.getElementById("contrasena").placeholder = "Ingrese su contraseña";
}
// Event listener para cambiar el color del campo activo
document.addEventListener("focusin", function(event) {
    switch (event.target.id) {
        case "nombre":
            cambiarColorNombre();
            break;
        case "apellidos":
            cambiarColorApellidos();
            break;
        case "edad":
            cambiarColorEdad();
            break;
        case "sexo":
            cambiarColorSexo();
            break;
        case "email":
            cambiarColorEmail();
            break;
        case "contrasena":
            cambiarColorContrasena();
            break;
    }
});

// Event listener para devolver el color normal al campo cuando se cambie de elemento activo
document.addEventListener("focusout", function(event) {
    document.getElementById("errorcase").innerHTML = "";
    switch (event.target.id) {
        case "nombre":
            devolverColorNombre();
            break;
        case "apellidos":
            devolverColorApellidos();
            break;
        case "edad":
            devolverColorEdad();
            break;
        case "sexo":
            devolverColorSexo();
            break;
        case "email":
            devolverColorEmail();
            break;
        case "contrasena":
            devolverColorContrasena();
            break;
    }
});
