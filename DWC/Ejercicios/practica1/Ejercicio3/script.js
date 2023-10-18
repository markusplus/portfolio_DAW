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

function generaDistribucionNormal(array) {
    const media = 0
    const varianza = 1
    const d = array.map((d) => (d - media) / varianza)
    return d
}

var randomVariable = generarVariableAleatoria(1000)
document.getElementById("texto").innerHTML = randomVariable
alert(d)