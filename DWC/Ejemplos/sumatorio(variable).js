class Sumatorio {
    constructor(...args) {
    //constructor() {
        this.aux = args;
        //this.aux = [...arguments]
    }
    Sumar() {
        return this.aux.reduce((a, b) => a + b);
    }
    toString() {
        return 'Sumar[${this.aux.join(",")}] = ${this.Sumar()}';
    }
}
suma = new Sumatorio(1,2,3);
console.log(suma.Sumar());
console.log(suma.toString())