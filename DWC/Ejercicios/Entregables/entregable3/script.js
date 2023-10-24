//Ejerc1
var texto = " ¡APRENDE JAVASCRIPT PARA MEJORAR TUS HABILIDADES EN JAVASCRIPT! ";
texto = texto.trim()
//Ejerc2
texto = texto.toLowerCase()
//Ejerc3
texto = texto.replaceAll("javascript", "JavaScript")
//Ejerc4
var pos = 0
var posiciones = Array()
while ((result = texto.indexOf("JavaScript", pos)) !== -1) {
    posiciones.push(result)
    pos = result + 1
}
console.log(texto)
console.log(posiciones)
//Ejerc5
filtrado = texto.substring(posiciones[0])
console.log(filtrado)
//Ejerc6
dividido = texto.split(" ")
console.log(dividido)
//Ejerc7
cont = 0
for (let i = 0; i < dividido.length; i++) {
    if(!dividido[i][cont].toLowerCase().match(/[a-z]/i)) {
        i--
        cont++
    }
    else {
        dividido[i] = dividido[i].substring(0, cont) + dividido[i][cont].toUpperCase() + dividido[i].substring(cont + 1);
        cont = 0;
    }
}
console.log(dividido)
//Ejerc8
textoFinal = dividido.toString()
textoFinal = textoFinal.replaceAll(",", " ")
console.log(textoFinal)
//Ejerc9
while (textoFinal.length < 70) {
    textoFinal += "."
}
console.log(textoFinal + " Tamaño: " + textoFinal.length)