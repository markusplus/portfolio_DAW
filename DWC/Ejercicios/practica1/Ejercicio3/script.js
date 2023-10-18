function generarVariableAleatoria(cantidad) {
    var numeros = []
    const param1 = Math.random()*10
    const param2 = Math.random()*10+1
    for(var i = 0; i < cantidad; i++) {
        var u1 = Math.random()
        var u2 = Math.random()
        var z = Math.sqrt(-2 * Math.log(u1)) * Math.cos(2 * Math.PI * u2)
        numeros.push(z)
    }
    return numeros
}

function calculaMedia(array) {
    result = array.reduce((acum, el) => acum + el) / array.length
    return result
}

function generaDistribucionNormal(array) {
    const media = calculaMedia(array)
    console.log(media)
    const varianza = calculaVarianza(array)
    console.log(varianza)
    array = array.map((d) => (d - media) / varianza)
    return array;
}

function calculaVarianza(array) {
  return Math.sqrt((array.reduce((acum, el) => acum + (el - calculaMedia(array))**2)) / (array.length))
}

var randomVariable = generarVariableAleatoria(1000)
console.log(randomVariable)
console.log(generaDistribucionNormal(randomVariable))