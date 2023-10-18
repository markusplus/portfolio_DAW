function calculaProductoEscalar(vector1, vector2) {
    return vector1[0] * vector2[0] + vector1[1] * vector2[1]
}

function calculaMagnitud(vector) {
    return Math.sqrt(vector[0]**2 + vector[1]**2)
}

function calculaAnguloSeparacion(vector1, vector2) {
    angulo = Math.acos((calculaProductoEscalar(vector1, vector2)) / (calculaMagnitud(vector1) * calculaMagnitud(vector2)))
    return angulo
}

function convertirSexagesimal(rad) {
    return rad * 180 / Math.PI
}

vector1 = [4, 0]
vector2 = [2, 1]
console.log(calculaMagnitud(vector2))
console.log(calculaAnguloSeparacion(vector1, vector2))
console.log(convertirSexagesimal(calculaAnguloSeparacion(vector1, vector2)))