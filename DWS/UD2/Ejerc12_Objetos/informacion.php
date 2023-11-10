<?php 
    include "reservas.php";
    $fichero = "pasajeros.csv";
    if(isset($_COOKIE["numPasajeros"])) {
        session_start();
        if(isset($_SESSION["pasajeros"])) {
            $pasajeros = $_SESSION["pasajeros"];
            for ($i=0; $i < $_COOKIE["numPasajeros"]; $i++) { 
                if(!is_null($pasajeros[$i])) {
                    file_put_contents($fichero, $pasajeros[$i]->toString(), FILE_APPEND);
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
</head>
<body>
    <p>Información de las personas que han contratado vuelos:</p>
    <?php 
        $lineas = file("pasajeros.csv");
        foreach ($lineas as $numero => $linea) {
            $numero_de_linea = $numero + 1;
            $palabras = explode(";", $linea);
            echo "<hr class='solid'>";
            for($i = 0; $i < count($palabras); $i++) {
                echo "$palabras[$i]<br>";
            }
        }
        //Crea un botón con un enlace a index.php
    ?>
    <br>
    <a href="index.php">
        <button>Volver a inicio</button>
    </a>
</body>
</html>