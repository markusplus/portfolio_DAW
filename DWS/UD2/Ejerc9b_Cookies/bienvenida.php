<?php
if(isset($_GET["nombre_txt"]) && isset($_GET["color_txt"])) {
    $nombre = $_GET["nombre_txt"];
    $color = $_GET["color_txt"];
    if(substr(strval($color), 0, 1) == "#" && strlen(substr(strval($color), 1)) == 6) {
        setcookie("nombre", $nombre);
        setcookie("color", $color);
    }
    else {
        header("Location:" . $_SERVER['HTTP_REFERER']);
        setcookie("error", 1);
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
        <title>Bienvenida</title>
    </head>
    <body>
        <p>Bienvenido/a <?php echo $nombre; ?>, tu color es <?php echo $color; ?></p>
        <p><a href="despedida.php">Sigue el enlace para la despedida, fue bonito mientras duró</a></p>
    </body>
</html>