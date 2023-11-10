class Persona {
    #nombre
    #apellidos
    #edad
    constructor(nombre, apellidos, edad) {
        this.nombre = nombre;
        this.apellidos = apellidos;
        this.edad = edad;
    }
    toString() {
        return `Nombre: ${this.nombre}, Apellidos: ${this.apellidos}, Edad: ${this.edad}`;
    }
}
p1 = new Persona("Marc", "Jovani Caballer", 22);
console.log(p1.toString());