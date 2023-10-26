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
    <?php 
        $gestor = fopen("pasajeros.csv", "r");
        $lineas = file("pasajeros.csv");
        foreach ($lineas as $numero => $linea) {
            $numero_de_linea = $numero + 1;
            $palabras = explode(";", $linea);
            echo "<hr class='solid'>";
            for($i = 0; $i < count($palabras); $i++) {
                if($numero > 0) {
                    echo "<p>$palabras[$i]</p>";
                }
            }
        }
    ?>
</body>
</html>