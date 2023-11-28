<?php
if(isset($_GET["submit_btn"])) {
    if(isset($_GET["color_txt"])) {
        $color = $_GET["color_txt"];
        if(substr(strval($color), 0, 1) == "#" && strlen(substr(strval($color), 1)) == 6) {
            setcookie("color", $color);
            setcookie("nombre", "", time() - 3600);
        }
        else {
            header("Location:" . $_SERVER['HTTP_REFERER']);
            setcookie("error", 1);
        }
    }
}
if(isset($_COOKIE["error"])){
    if($_COOKIE["error"] == 1) {
        echo "<script language='javascript'> alert('Campos erróneos'); </script>";
        setcookie("error", 0);
    }
}
?>
<style type="text/css">
    body {
        background-color: <?php echo $color;?>
    }
</style>
<html>
    <head>
        <title>Inicio</title>
    </head>
    <body>
        <script>
            const btn = document.getElementById("submit_btn")
            btn.disabled = true
        </script>
        <form name="formulario1" id="form1" action="bienvenida.php" method="get" enctype="application/x-www-form-urlencoded">
		<label>Nombre: </label>
		<input type="text" name="nombre_txt" />
		<br /><br />
        <label>Color (formato #000000): </label>
		<input type="text" name="color_txt"/>
		<br /><br />
		<input type="submit" id="submit_btn" name="submit_btn" value="Acceder"/>
	</form>
    </body>
</html>