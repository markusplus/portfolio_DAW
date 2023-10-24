var hora = parseInt(prompt("Introduce una hora: "))
var minuto = parseInt(prompt("Introduce un minuto: "))
var dia = parseInt(prompt("Introduce un dia: "))

var segundos = (hora * 3600) + (minuto * 60) + (dia * 86400)
alert(hora + " hora(s), " + minuto + " minuto(s) y " + dia + " día(s) equivalen a " + segundos + " segundos")