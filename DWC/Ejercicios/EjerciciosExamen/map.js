const diccionario = {
    "hello" : "hola",
    "world" : "mundo",
    "bye" : "adiós"
}

const traducirOracion = (oracion) => {
    traduccion = oracion.split(" ").map(palabra => diccionario[palabra]);
    return traduccion.join(" ");
}
console.log(traducirOracion("hello world bye world"));