const sumar = (array) => {
    if(array.length === 0) {
        return 0;
    }
    else {
        return sumar(array.slice(1)) + array[0];
    }
}
array = [1,2,3,4];
console.log(sumar(array));