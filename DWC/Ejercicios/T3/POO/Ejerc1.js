class Rectangulo {
    constructor(alto, ancho) {
        this.alto = alto
        this.ancho = ancho
    }
    #calcularArea() {
        return this.alto * this.ancho;
    }
    #calcularPerimetro() {
        return this.alto * 2 + this.ancho * 2;
    }
    fitsIn(rect) {
        return this.#calcularArea() <= rect.obtenerArea()?true:false;
          
    }
    obtenerArea() {
        return this.#calcularArea();
    }
    obtenerPerimetro() {
        return this.#calcularPerimetro();
    }
    obtener
}
rect1 = new Rectangulo(2, 5);
rect2 = new Rectangulo(2, 6);
console.log(rect1.obtenerArea());
console.log(rect1.obtenerPerimetro());
console.log(rect1.fitsIn(rect2))