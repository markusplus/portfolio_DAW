let str = " ¡Hola Mundo! "
const filtrado = str.trim().toLowerCase().replace(/o/, 'x')
const posiciones = (txt) => {
    const posiciones = []
    for(idx in txt) {
        if(txt[idx] == "x") {
            posiciones.push(idx)
        }
    }
    return posiciones
}
console.log(filtrado)
console.log(posiciones(filtrado))
