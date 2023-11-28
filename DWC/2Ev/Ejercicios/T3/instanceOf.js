class Persona {
    constructor(nombre, apellidos) {
        this.nombre = nombre;
        this.apellidos = apellidos;
    }
}

class Rectangulo {
    constructor(base, altura) {
        this.base = base;
        this.altura = altura;
    }
}

function calcularAreaODevolverNombre(objeto) {
    if (objeto instanceof Rectangulo) {
        const area = objeto.base * objeto.altura;
        return area;
    } else if (objeto instanceof Persona) {
        const nombreCompleto = `${objeto.nombre} ${objeto.apellidos}`;
        return nombreCompleto;
    } else {
        return "Objeto no reconocido";
    }
}

const persona = new Persona("John", "Doe");
const rectangulo = new Rectangulo(10, 5);

console.log(calcularAreaODevolverNombre(persona));
console.log(calcularAreaODevolverNombre(rectangulo));
