<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasajeros</title>
</head>
<body>
    <form name="form2" method="post" action="reservas.php">
        <script>
            function cambiaEdad(edad) {
                if (parseInt(document.getElementById("edad_num"+edad).value, 10) >= 14) {
                    document.getElementById("contenedor_dni"+edad).style.visibility = "visible";
                }
                else {
                    document.getElementById("contenedor_dni"+edad).style.visibility = "hidden";
                }
            }
        </script>
        <label>Introduzca los datos de la reserva:</label>
        <?php
            if(isset($_GET["num_pasajeros_txt"])) {
                $numPasajeros = $_GET["num_pasajeros_txt"];
                setcookie("numPasajeros", $numPasajeros);
                for($i = 0; $i < $numPasajeros; $i++) {
                    echo "<br><br><label><strong>Pasajero $i:</strong></label><br><br>";
                    echo "<label>Nombre: </label><input type='text' name='nombre_txt$i'>";
                    echo "<label> Apellidos: </label><input type='text' name='apellidos_txt$i'><br><br>";
                    echo "<label>Edad: </label><input type='number' name='edad_num$i' id='edad_num$i' onchange='cambiaEdad($i)'>";
                    echo "<div id='contenedor_dni$i' style='visibility: hidden; display: inline-block'><label> DNI: </label><input type='text' name='dni_txt$i'></div>";
                }
            }
        ?>
        <br><br>
        <input type="submit" name="reservar_btn" value="Reservar">
    </form>
</body>
</html>