<?php 
    $cookie = intval($_COOKIE["contador"]) + 1;
    setcookie("cookie2", $cookie);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
<body>
    <a href="webContador.php"><h1>Visitar página</h1></a>
    
</body>
</html>