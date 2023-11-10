/*
Crea una función que tome dos conjuntos (sets) como parámetros y devuelva un nuevo
conjunto con los elementos que son comunes a ambos conjuntos (intersección).
*/
set1 = new Set([1,2,3,4,5]);
set2 = new Set([4,5,6,7]);
const interseccion = (set1, set2) => {
    return [...set1].filter((num) => set2.has(num));
}
console.log(interseccion(set1, set2));

//Implementa una función que verifique si un elemento específico está presente en un conjunto.
const presente = (el, set1) => {
    return set1.has(el) ? true : false;
}
console.log(presente(3, new Set([1,2,3,4])));