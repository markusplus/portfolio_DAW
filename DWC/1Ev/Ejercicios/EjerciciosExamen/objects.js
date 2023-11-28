/*
Crea un objeto que represente un estudiante con propiedades como nombre, edad y grado.
Imprime en la consola la información del estudiante.
*/
class Estudiante {
    constructor(nombre, edad, grado) {
        this.nombre = nombre;
        this.edad = edad;
        this.grado = grado;
    }
}
estudiante = new Estudiante("Marc", 21, "DAW2");
console.log(estudiante)

/*
Escribe una función que tome un objeto como parámetro y devuelva un array con los valores
de todas las propiedades del objeto.
*/
let perro = {
    nombre:"Pipo",
    color:"Negro",
    edad: 5,
    macho: true
};
const devuelvePropiedades = (object) => {
    claves = Object.keys(object);
    valores = claves.map(clave => object[clave])
    return valores
}
console.log(devuelvePropiedades(perro));
