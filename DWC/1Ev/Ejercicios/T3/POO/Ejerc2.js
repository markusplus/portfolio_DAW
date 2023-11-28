/* Crea una clase Fecha, SIN USAR EL OBJETO Date() que realice las siguientes
funciones:
Inicializa las propiedades privadas día, mes y año (sin valor ninguno)
Tienes que definir el método privado isValidDate(día, mes, año) que realice lo
siguiente
Coge como parámetro el día, el mes y el año y devuelve si la fecha es válida
Para ello, has de tener en cuenta lo siguiente:
- Un año es bisiesto si su división por 4 es igual a 0
- los días del mes para un año no bisiesto son:
[31,28,31,30,31,30,31,31,30,31,30,31]
3) Crea un método público parse_date (fecha_str) que coja como parámetro el
string de una fecha (separado por “-” o por “/”) y asigne los valores día, mes y año
en la clase SOLO EN EL CASO EN QUE LA FECHA SEA VÁLIDA
4) Crea un método público .toString() que muestre la fecha en el siguiente formato:
“20 de noviembre del 2020”
“25 de febrero del 2021” */

class Fecha {

    #isValidDate(dia, mes, ano) {
        result = true;
        meses = [31,28,31,30,31,30,31,31,30,31,30,31];
        if (ano % 4 == 0) {
            meses[1] = 29;
        } 
        else {
            if (!dia <= meses[mes-1]) {
                result = false;
            }
        }
        return result;
    }
    
    parse_date(fecha_str) {
        fecha_str.indexOf("/") !== 0?fecha_arr = fecha_str.split("/"): fecha_arr = fecha_str.split("-")
        this.dia = fecha_arr[0];
        this.mes = fecha_arr[1];
        this.ano = fecha_arr[2];
        return fecha_arr;
    }
    
}
fecha = new Fecha();
//console.log(fecha.parse_date("22/02/2002"));