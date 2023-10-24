//Crea una función que cuente cuántas veces aparece un caracter en una 
//cadena de texto
const conteoRecursivoCaracteres = (c, texto) => {
    if(texto.length > 0) {
        if(texto[0] === c) {
            return 1 + conteoRecursivoCaracteres(c, texto.slice(1));
        }
        else {
            return conteoRecursivoCaracteres(c, texto.slice(1));
        }
    }
    else {
        return 0;
    }
}

console.log(conteoRecursivoCaracteres("d", "dado"));