function calculaProductoEscalar(vector1, vector2) {
    result = 0
    for (let i = 0; i < vector1.length; i++) {
        result += vector1[i] * vector2[i]
    }
    return result
}

function calculaMagnitud(vector) {
    result = 0
    for (let i = 0; i < vector.length; i++) {
        result += vector[i]**2
    }
    return Math.sqrt(result)
}

function calculaAnguloSeparacion(vector1, vector2) {
    angulo = Math.acos((calculaProductoEscalar(vector1, vector2)) / (calculaMagnitud(vector1) * calculaMagnitud(vector2)))
    return angulo
}

function convertirSexagesimal(rad) {
    return rad * 180 / Math.PI
}

vector1 = [4, 0, 2]
vector2 = [2, 1, 4]
console.log(calculaAnguloSeparacion(vector1, vector2))
console.log(convertirSexagesimal(calculaAnguloSeparacion(vector1, vector2)))