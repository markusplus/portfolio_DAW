let recursos = ["piedra", "papel", "tijeras"]
var tabla_resultados = [[0, -1, 1],[1, 0, -1],[-1, 1, 0]]
var fin = false
var contJugador = 0
var contRival = 0
while(!fin) {
	var eleccion = recursos.indexOf(prompt("¿piedra, papel o tijera?"))
	var rival = Math.floor(Math.random() * 3)
	if(tabla_resultados[eleccion][rival] !== 0) {
		if(tabla_resultados[eleccion][rival] === 1) {
			contJugador++
      alert("Tu rival eligió: " + recursos[rival] + ". " + contJugador + "/" + contRival)
			console.log("Tu rival eligió: " + recursos[rival] + ". " + contJugador + "/" + contRival)
		}
		else {
			contRival++
      alert("Tu rival eligió: " + recursos[rival] + ". " + contJugador + "/" + contRival)
			console.log("Tu rival eligió: " + recursos[rival] + ". " + contJugador + "/" + contRival)
		}
	}
	if(contJugador === 3) {
		alert("El jugador ha ganado. " + contJugador + "/" + contRival)
    fin = true
	}
	else if(contRival === 3) {
		alert("El ordenador ha ganado. " + conJugador + "/" + contRival)
    fin = true
	}
}