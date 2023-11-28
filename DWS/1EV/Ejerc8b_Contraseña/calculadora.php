<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <?php
        if(isset($_GET["enviar_btn"])){
            $precio = $_GET["precio_txt"];
            $descuento = $_GET["porcentaje_txt"];
            if(is_numeric($precio) && is_numeric($descuento)) {
                $precio = floatval($precio);
                $descuento = floatval($descuento);
                echo "Datos calculados:<br>" . "Producto: " . $_GET["nombre_txt"] . "<br>";
                echo "Precio: $precio<br>Porcentaje de descuento: $descuento<br>";
                $precio_final = $precio - (($precio * $descuento) / 100);
                echo "Precio final: $precio_final";
            }
            else {
                echo "<script language='javascript'> alert('Los tipos de datos no son correctos'); </script>";
            }
        }
    ?>
</body>
</html>