boton = document.getElementById("cont_button");
cont = 0;
const cuentaClick = () => {
    cont++;
    document.getElementById("text").innerHTML = cont;
}
boton.addEventListener("click", cuentaClick)