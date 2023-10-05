const texto = "eSto eS uN TexTo!"
const aux = texto.split("")

var almacen = Array()
const result = aux.filter((mayus) => (mayus === mayus.toUpperCase()) && mayus !== " " && mayus !== "!")

const contador = result.reduce((acum, el) => {
    if (el in acum){
        acum[el]++
    } else {
        acum[el] = 1
    }
    return acum
}, {})

console.log(contador)
