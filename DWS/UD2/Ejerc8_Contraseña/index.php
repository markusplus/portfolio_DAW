<!DOCTYPE html>
<html lang="es">
<head>
	<title>Env&iacute;o de datos por GET y POST</title>
	<meta charset="utf-8" />
</head>
<body>
    <?php
        include 'libreria.php';
        if(isset($_GET["enviar_btn"])){
            if (($result = generar($_GET["dni_txt"])) != "") {
                echo $result . "<br><br>";
            }
            else {
                echo "Cantidad de caracteres introducidos incorrecta<br><br>";
            }
        }
    ?>
	<form name="envia-get_frm" action="index.php" method="get" enctype="application/x-www-form-urlencoded">
		<label>Generador de contraseñas:</label>
		<br /><br />
		<label>Introduzca la cantidad de dígitos de la contraseña(8-12):</label>
		<input type="text" name="dni_txt" />
		<br /><br />
		<input type="submit" name="enviar_btn" value="Pulsa Get" />
	</form>
</body>
<html>
