<!DOCTYPE html>
<html lang="es">
<head>
	<title>Env&iacute;o de datos por GET y POST</title>
	<meta charset="utf-8" />
</head>
<body>
    <?php
        $result = "";
        ?>
            <style type="text/css">
                #form2{
                    display:none;
                }
            </style>
        <?php
        include 'libreria.php';
        if(isset($_GET["enviar_btn"])){
            $result = generar($_GET["dni_txt"]);
            if ($result != "") {
                echo "Su contraseña es: <strong>" . $result . "</strong><br><br>";
                ?>
                    <style type="text/css">
                        #form1{
                        display:none;
                        }
                        #form2{
                        display:inherit;
                        }
                    </style>
                <?php
            }
            else {
                echo "Cantidad de caracteres introducidos incorrecta<br><br>";
            }
        }
    ?>
	<form name="formulario_1" id="form1" action="index.php" method="get" enctype="application/x-www-form-urlencoded">
		<label>Generador de contraseñas:</label>
		<br /><br />
		<label>Introduzca la cantidad de dígitos de la contraseña(8-12):</label>
		<input type="text" name="dni_txt" />
		<br /><br />
		<input type="submit" name="enviar_btn" value="Pulsa Get" />
	</form>
    <form name="formulario_2" id="form2" action="comprobaciones.php" method="get" enctype="application/x-www-form-urlencoded">
		<label>Introduce la información requerida:</label>
		<br /><br />
		<label>Nombre:</label>
		<input type="text" name="nombre_txt" />
		<br /><br />
        <label>DNI:</label>
		<input type="text" name="dni_txt" />
        <br /><br />
        <label>Contraseña:</label>
		<input type="password" name="psw_txt" />
        <br /><br />
        <textarea name="psw_generada" style="display:none"><?php echo $result?></textarea>
		<input type="submit" name="enviar_btn" value="Validar DNI y Contraseña" />
	</form>
</body>
<html>
