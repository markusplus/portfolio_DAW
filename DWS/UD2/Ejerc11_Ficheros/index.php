<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV</title>
</head>
<body>
    <table style='border: 3px solid black; border-collapse:collapse'>
        <?php
            $gestor = fopen("clientes.csv", "r");
            $lineas = file("clientes.csv");
            foreach ($lineas as $numero => $linea) {
 	            $numero_de_linea = $numero + 1;
                $palabras = explode(";", $linea);
                echo "<tr>";
                for($i = 0; $i < count($palabras); $i++) {
                    if($numero > 0) {
                        echo "<td align='right' style='border: 1px solid black;'>$palabras[$i]</td>";
                    }
                    else {
                        echo "<td bgcolor='grey' align='center' style='border: 1px solid black;font-weight:bold'>$palabras[$i]</td>";
                    }
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>