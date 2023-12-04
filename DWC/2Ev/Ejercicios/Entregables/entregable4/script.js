class Empleado {
    constructor(nombre, edad, puesto) {
        this.nombre = nombre;
        this.edad = edad;
        this.puesto = puesto;
    }
    mostrarInformacion() {
        return `Nombre: ${this.nombre}, Edad: ${this.edad}, Puesto: ${this.puesto}`;
    }
}

class Desarrollador extends Empleado {
    constructor(nombre, edad, puesto, lenguaje) {
        super(nombre, edad, puesto);
        this.lenguaje = lenguaje;
    }
    mostrarInformacion() {
        return super.mostrarInformacion() + `, Lenguaje: ${this.lenguaje}`;
    }
}

const fs = require('fs');

function creaInstancias(x) {
    let Datos = fs.readFileSync(x);
    Datos = JSON.parse(Datos);
    let empleados = [];
    Datos.forEach (element => {
        if (element.lenguaje) {
            empleados.push(new Desarrollador(element.nombre, element.edad, element.puesto, element.lenguaje));
        } else {
            empleados.push(new Empleado(element.nombre, element.edad, element.puesto));
        }
    });
    return empleados;
}

let empleados = creaInstancias('/workspaces/portfolio_DAW/DWC/2Ev/Ejercicios/Entregables/entregable4/empleados.json');
console.log(empleados);

function mostrarTodosEmpleados(array) {
    array.forEach(element => {
        console.log(element.mostrarInformacion());
    });
}

mostrarTodosEmpleados(empleados);
