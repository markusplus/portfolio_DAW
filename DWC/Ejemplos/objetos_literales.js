class Rectangulo {}

let rect1 = new Rectangulo();
let rect2 = new Rectangulo();
Object.assign(rect1, {base: 2, altura: 3});
Object.assign(rect2, {base: 4, altura: 4});

rect1.getArea = function() {
    return this.base * this.altura;
}
Object.assign(rect1, {getPerimetro: function(){return this.base * 2 + this.altura * 2}});
Object.prototype.getArea = function() {return this.base * this.altura;};
console.log(rect1.getArea())
console.log(rect1.getPerimetro())
console.log(rect2.getArea());