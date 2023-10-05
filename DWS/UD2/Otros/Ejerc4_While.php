<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Tablas</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="Tablas de multiplicar" content="Geany 1.35" />
</head>

<body>
	<?php
        $i = 0;
        $j = 0;
        echo "TABLAS DE MULTIPLICAR<br>";
		while ($i <= 10) {
            echo "Tabla del $i: <br>";
            while($j <= 10) {
                echo "$i * $j = " . ($i * $j) . "<br>";
                $j++;
            }
            $i++;
            $j = 0;
            echo "<br>";
        }
	?>
</body>

</html>