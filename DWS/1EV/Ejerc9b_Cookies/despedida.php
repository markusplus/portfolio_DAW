<?php
$color = $_COOKIE["color"];
$nombre = $_COOKIE["nombre"];
if(isset($_COOKIE["error"])){
    if($_COOKIE["error"] == 1) {
        echo "<script language='javascript'> alert('Campos erróneos'); </script>";
        setcookie("error", 0);
    }
}
?>
<style type="text/css">
    body {
        background-color: <?php echo $color; ?>;
    }
</style>
<html>
    <head>
        <title>Despedida</title>
    </head>
    <body>
        <form name="formulario1" id="form1" action="index.php" method="get" enctype="application/x-www-form-urlencoded">
		<label>Adiós <?php echo $nombre; ?>, tu color es <?php echo $color; ?>, si no lo cambias.</label>
		<br /><br />
        <label>Y ahora como vienes te vas, si quieres cambiar el color estás a tiempo: </label>
		<input type="text" name="color_txt"/>
		<br /><br />
		<input type="submit" name="submit_btn" value="Bye"/>
	</form>
    </body>
</html>