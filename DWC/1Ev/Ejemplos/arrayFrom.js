const getMatriz = (length) => Array.from( {length:length}, (_, i) => Array.from( {length:length}, (_, j) => length*i+j+1))
console.log(getMatriz(3))
const getIdentity = (length) => Array.from( {length:length}, (_, i) => Array.from( {length:length}, (_, j) => i === j ? 1:0))
console.log(getIdentity(5))
const getLowerTriangle = (length) => Array.from({length:length}, (_, i) => 
                                    Array.from({length:length}, (_, j) =>j <= i ? 1:0))
console.log(getLowerTriangle(5))