array = Array.from(Array.from({length: 20}, (_, i) => Math.floor(Math.random() * 20)+1))
const result = array.filter((pares) => pares % 2 === 0)
console.log(array)
console.log(result)
console.log(result.sort((a,b) => a-b).reverse())