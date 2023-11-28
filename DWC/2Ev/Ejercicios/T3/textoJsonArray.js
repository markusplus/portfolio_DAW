var textoJsonArray = '[{"nombre": "Juan", "edad": 25, "ciudad": "Madrid"}, {"nombre":"Ana", "edad": 30, "ciudad": "Barcelona"}]';
obj = JSON.parse(textoJsonArray);

obj.forEach(function(element) {
    element.contacto = {
        email: "juan@example.com",
        telefono: "123-456-789"
    };
});

texto = JSON.stringify(obj);
console.log(texto);
