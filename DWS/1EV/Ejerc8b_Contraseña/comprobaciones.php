<?php
        function compruebaDNI($dni) {
            $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
            $numeros = intval(substr($dni, 0, 8));
            $letra = substr($dni, 8);
            $result = $numeros % 23;
            if (strlen($dni) == 9) {
                if ($letra == $letras[$result]) {
                    return 1;
                }
                else {
                    return 0;
                }
            }
            else {
                return -1;
            }
        }

        function compruebaContra($contra) {
            if ($contra == $_GET["psw_generada"]) {
                return true;
            }
            else {
                return false;
            }
        }

        if(isset($_GET["enviar_btn"])){
            if (compruebaDNI($_GET["dni_txt"]) == 1 && $_GET["psw_txt"] == $_GET["psw_generada"]) {
                echo "Calculadora de descuentos:" . "<br /><br />";
                ?>
                    <!DOCTYPE html>
                    <html lang="es">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Comprobaciones</title>
                    </head>
                    <body>
                        <form name="formulario_1" id="form1" action="calculadora.php" method="get" enctype="application/x-www-form-urlencoded">
                            <label>Nombre del producto: </label>
                            <input type="text" name="nombre_txt" />
                            <br /><br />
                            <label>Precio: </label>
                            <input type="text" name="precio_txt" />
                            <br /><br />
                            <label>Porcentaje de descuento: </label>
                            <input type="text" name="porcentaje_txt" />
                            <br /><br />
                            <input type="submit" name="enviar_btn" value="Calcular" />
                        </form>
                    </body>
                    </html>
                <?php
            }
            else if(compruebaDNI($_GET["dni_txt"]) == 0){
                echo "<script language='javascript'> alert('El nif no es correcto'); </script>";
            }
            else if(compruebaDNI($_GET["dni_txt"]) == -1){
                echo "<script language='javascript'> alert('El numero de digitos no es correcto'); </script>";
            }
            else {
                echo "<script language='javascript'> alert('La contraseña introducida no coincide con la creada automáticamente'); </script>";
            }
        }
?>