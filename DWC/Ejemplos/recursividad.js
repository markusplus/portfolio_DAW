//FIBONACCI
function fibonacci (n) {
    if(n == 0) {
        return 0
    }
    if(n == 1) {
        return 1
    }
    if (n > 1) {
        return fibonacci(n-2) + fibonacci(n - 1)
    }
}
//FACTORIAL
function factorial(n) {
    if(n == 0) {
        return 1
    }
    else {
        return n * factorial(n-1)
    }
}

const factorial2 = (n) => n == 0?1:n*factorial(n-1)

console.log(factorial(3))
console.log(factorial2(3)) 