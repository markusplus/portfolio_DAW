<?php
$color = $_COOKIE["color"];
$nombre = $_COOKIE["nombre"];
if(isset($_GET["submit_btn"])){
    $color = $_GET["color_txt"];
    //if(substr(strval($color), 0, 1) == "#" && strlen(substr(strval($color), 1)) == 6) {
        setcookie("color", $color);
    //} 
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