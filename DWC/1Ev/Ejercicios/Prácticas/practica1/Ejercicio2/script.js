function calculaPromedios(mapa) {
    const result = new Map()
    for (const[key, value] of mapa) {
        result.set(key, promedio(value))
    }
    return result
}

function promedio(array) {
    let result = 0
    for(let i = 0; i < array.length; i++) {
        result += array[i]    
    }
    return (result / array.length)
}

function calculaMediaClase(mapa) {
    let result = 0
    for (const[key, value] of mapa) {
        result += value
    }
    return result / mapa.size

}

const calificaciones = new Map([
    ["Marc", [85, 90, 80]],
    ["David", [60, 85, 60]],
    ["Juan", [40, 50, 70]],
]);

const mapa = calculaPromedios(calificaciones)
console.log("Nota media de la clase: " + calculaMediaClase(mapa))