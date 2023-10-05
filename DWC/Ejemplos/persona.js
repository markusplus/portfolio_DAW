const persona = {
    'nombre' : 'juan',
    'apellido' : 'martinez',
    'nombre_completo': function() {return this.nombre + " " + this.apellido}
}

console.log(Object.keys(persona))