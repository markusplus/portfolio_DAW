<?php
    if (isset($_COOKIE['visitas'])) {
        $contador = $_COOKIE["visitas"] + 1;
        setcookie("visitas", $contador);
    }
    else {
        setcookie("visitas", 0);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
<body>
    <a href="webContador.php"><h1>Accede a la web con el contador PHP</h1></a>
    
</body>
</html>