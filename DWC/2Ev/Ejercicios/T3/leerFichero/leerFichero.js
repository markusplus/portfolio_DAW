ficheroLeido = require('fs').readFileSync('/workspaces/portfolio_DAW/DWC/2Ev/Ejercicios/T3/leerFichero/mi_fichero.txt', 'utf8');
var array = ficheroLeido.split("\n");
console.log(array.sort().reverse());

