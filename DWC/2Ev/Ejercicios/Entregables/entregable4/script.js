class Empleado {
    constructor(nombre, edad, puesto) {
        this.nombre = nombre;
        this.edad = edad;
        this.puesto = puesto;
    }
    mostrarInformacion() {
        console.log(`Nombre: ${this.nombre}, Edad: ${this.edad}, Puesto: ${this.puesto}`);
    }
}

class Desarrollador extends Empleado {
    constructor(nombre, edad, puesto, lenguaje) {
        super(nombre, edad, puesto);
        this.lenguaje = lenguaje;
    }
    mostrarInformacion() {
        console.log(super.mostrarInformacion()+`, Lenguaje: ${this.lenguaje}`);
    }
}

const fs = require('fs');

function leerEmpleados(x) {
    let Datos = fs.readFileSync(x);
    Datos = JSON.parse(Datos);
    console.log(Datos);
}

console.log(leerEmpleados('empleados.json'));

