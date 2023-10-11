<?php
    
    if(isset($_GET["submit_btn"])){
        $color = $_GET["color_txt"];
        $nombre = $_GET["nombre_txt"];
        //if(substr(strval($color), 0, 1) == "#" && strlen(substr(strval($color), 1)) == 6) {
            setcookie("color", $color);
            setcookie("nombre", $nombre);
        //} 
    }
?>
<html>
    <head>
        <title>Inicio</title>
    </head>
    <body>
        <form name="formulario1" id="form1" action="bienvenida.php" method="get" enctype="application/x-www-form-urlencoded">
		<label>Nombre: </label>
		<input type="text" name="nombre_txt" />
		<br /><br />
        <label>Color (formato #000000): </label>
		<input type="text" name="color_txt"/>
		<br /><br />
		<input type="submit" name="submit_btn" value="Acceder"/>
	</form>
    </body>
</html>