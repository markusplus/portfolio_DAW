<?php
$color = $_COOKIE["color"];
$nombre = $_COOKIE["nombre"];
echo $nombre;
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