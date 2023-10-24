var fin = false
var array = new Array()
while(!fin) {
  aux = prompt("Escribe lo que quieras")
  if(aux === "stop") {
    fin = true
  }
  else {
    array.push(aux)
  }
}
console.log(array)
var suma_let = array.reduce((a, b) => a + b).length
alert("El array: " + "('" + array.toString() + "')" + " tiene " + suma_let + 
  " caracteres en total")