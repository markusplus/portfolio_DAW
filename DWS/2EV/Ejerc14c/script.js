result = "";
function actualizaDiscos(grupo) {
    result = grupo;
}

function formaConsulta() {
    return "SELECT titulo FROM discos WHERE idgrupo = (SELECT idgrupo FROM grupos WHERE nombre = '" + result + "')";
}

function getGrupo() {
    return result;
}