<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador</title>
</head>
<body>
    <?php
        if (isset($_GET["reset"])) {
            setcookie("visitas", 0);
        }
        $cont = $_COOKIE["visitas"];
        echo "Cookie: " . $_COOKIE["visitas"];
        echo "<br>Contador: " . $cont + 1;
    ?>
    <a href="index.php"><h1>Página principal</h1><br></a>
    <form method="get">
        <input type="submit" name="reset" value="Reset"/>
    </form>
</body>
</html>