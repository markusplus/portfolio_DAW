class Persona {
    #nombre
    #apellidos
    #edad
    #contrasena
    #fechaRegistro = this.obtenerFechaActual()

    set nombre(nuevoNombre) {
        this.#nombre = nuevoNombre;
      }
    
    set apellidos(nuevosApellidos) {
        this.#apellidos = nuevosApellidos;
    }
    
    set edad(nuevaEdad) {
        if (nuevaEdad >= 0) {
          this.#edad = nuevaEdad;
        } else {
          console.error('La edad no puede ser un número negativo.');
        }
    }
    
    set contrasena(nuevaContrasena) {
        this.#contrasena = nuevaContrasena;
    }

    get nombre() {
        return this.#nombre;
    }
    
      // Getter para los apellidos
    get apellidos() {
        return this.#apellidos;
    }
    
      // Getter para la edad
    get edad() {
        return this.#edad;
    }
    
      // Getter para la contraseña
    get contrasena() {
        return this.#contrasena;
    }
    
      // Getter para la fecha de registro
    get fechaRegistro() {
        return this.#fechaRegistro;
    }

    agregarCeroAntes(numero) {
        return numero < 10 ? '0' + numero : numero;
    }

    obtenerFechaActual() {
        var fecha = new Date();
      
        var dia = agregarCeroAntes(fecha.getDate());
        var mes = agregarCeroAntes(fecha.getMonth() + 1);
        var anio = agregarCeroAntes(fecha.getFullYear());
        var horas = agregarCeroAntes(fecha.getHours());
        var minutos = agregarCeroAntes(fecha.getMinutes());
        var segundos = agregarCeroAntes(fecha.getSeconds());
      
        var fechaFormateada = dia + '/' + mes + '/' + anio + ' ' + horas + ':' + minutos + ':' + segundos;
        return fechaFormateada;
    }
}

const guardarDatos = () => {
    const nombre = document.getElementById("nombre").value;
    const apellidos = document.getElementById("apellidos").value;
    const edad = document.getElementById("edad").value;
    if(edad < 18) {
        alert("El usuario ha de ser mayor de edad");
        return;
    }
    const contrasena = document.getElementById("password").value;
    nuevaPersona = new Persona();
    nuevaPersona.nombre = nombre;
    nuevaPersona.apellidos = apellidos;
    nuevaPersona.edad = edad;
    nuevaPersona.contrasena = contrasena;
    mostrarResultado(nuevaPersona);
    limpiarFormulario();
}

const mostrarResultado = (instancia) => {
    const resultadoDiv = document.getElementById("resultado");
    resultadoDiv.innerHTML = `<p>Nombre: ${instancia.nombre}</p>
                              <p>Apellidos: ${instancia.apellidos}</p>
                              <p>Edad: ${instancia.edad}</p>
                              <p>Constraseña: ${instancia.contrasena}</p>
                              <p>Fecha de Registro: ${instancia.fechaRegistro}</p>`;
}

const limpiarFormulario = () => {
    document.getElementById("nombre").value = "";
    document.getElementById("apellidos").value = "";
    document.getElementById("edad").value = "";
    document.getElementById("password").value = "";
}

function agregarCeroAntes(numero) {
    return numero < 10 ? '0' + numero : numero;
}

const actualizarReloj = () => {
    var fecha = new Date();
      
    var dia = agregarCeroAntes(fecha.getDate());
    var mes = agregarCeroAntes(fecha.getMonth() + 1);
    var anio = agregarCeroAntes(fecha.getFullYear());
    var horas = agregarCeroAntes(fecha.getHours());
    var minutos = agregarCeroAntes(fecha.getMinutes());
    var segundos = agregarCeroAntes(fecha.getSeconds());
      
    document.getElementById("reloj").innerHTML = `Fecha y Hora: ${dia}/${mes}/${anio}, ${horas}:${minutos}:${segundos}` 
    
}

setInterval(actualizarReloj, 1000);