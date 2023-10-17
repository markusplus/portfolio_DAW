<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador</title>
</head>
<body>
    <?php
        if(isset($_COOKIE["visitas"])) {
            $cont = $_COOKIE["visitas"];
            if (isset($_GET["reset"])) {
                setcookie("visitas", 0);
                $cont = 0;
            }
            echo "Cookie: " . intval($_COOKIE["visitas"]);
            $cont++;
            echo "<br>Contador: " . $cont;
            setcookie("visitas", $cont);
        }
        else {
            setcookie("visitas", 0);
        }
    ?>
    <a href="index.html"><h1>Volver</h1><br></a>
    <form method="get">
        <input type="submit" name="reset" value="Reset"/>
    </form>
</body>
</html>