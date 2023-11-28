//Crea una función que tome un string como parámetro y devuelva la longitud de ese string.
const tamanoString = (str) => {
    return str.length;
}
console.log(tamanoString("Hola"));

//Escribe una función que invierta un string. Por ejemplo, si le pasas "Hola", debería devolver
//"aloH";.
const invierteString = (str) => {
    aux = [];
    for(let i = 0; i < str.length; i++) {
        aux[i] = str[str.length - i - 1];
    }
    return aux.join("");
}
console.log(invierteString("Hola"));

//Dada una oración, escribe una función que cuente el número de palabras en ella.
const contarPalabras = (oracion) => {
    cont = 0;
    oracion.split(" ").forEach((palabra) => {
        if(palabra !== ""){
            cont++
        }
    });
    return cont;
}
console.log(contarPalabras("Hola qué tal estás?"));