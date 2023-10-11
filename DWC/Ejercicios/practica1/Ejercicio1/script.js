let recursos = ["piedra", "papel", "tijeras"]
var tabla_resultados = [[0, -1, 1],[1, 0, -1],[-1, 1, 0]]
var fin = false
var contJugador = 0
var contRival = 0

var eleccion

function tiraJugador(num) {
    if(!fin) {
        eleccion = num
        var rival = Math.floor(Math.random() * 3)
    	switch(tabla_resultados[eleccion][rival]) {
            case 1:
                contJugador++
                document.getElementById("textoPartida").innerHTML = "Tu rival eligió: " + recursos[rival] + ". " + contJugador + "/" + contRival
        		console.log("Tu rival eligió: " + recursos[rival] + ". " + contJugador + "/" + contRival)
                break
            case -1: 
                contRival++
          document.getElementById("textoPartida").innerHTML = "Tu rival eligió: " + recursos[rival] + ". " + contJugador + "/" + contRival
    			console.log("Tu rival eligió: " + recursos[rival] + ". " + contJugador + "/" + contRival)
                break
            case 0: 
          document.getElementById("textoPartida").innerHTML = "Tu rival eligió: " + recursos[rival] + ". " + contJugador + "/" + contRival
    			console.log("Tu rival eligió: " + recursos[rival] + ". " + contJugador + "/" + contRival)
                break
    	}
    	compruebaVictoria()
    }
}

function compruebaVictoria() {
    if(contJugador === 3) {
		document.getElementById("textoPartida").innerHTML = "El jugador ha ganado. " + contJugador + "/" + contRival
        fin = true
        document.querySelectorAll("button").forEach(function(button) {button.remove()})
        document.getElementById("elige_text").style.display = "none"
	}
	if(contRival === 3) {
		document.getElementById("textoPartida").innerHTML = "El ordenador ha ganado. " + contJugador + "/" + contRival
        fin = true
        document.querySelectorAll("button").forEach(function(button) {button.remove()})
        document.getElementById("elige_text").style.display = "none"
	}
}
