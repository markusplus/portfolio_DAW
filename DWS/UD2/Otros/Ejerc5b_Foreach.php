<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Suma números</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="Tablas de multiplicar" content="Geany 1.35" />
</head>

<body>
	<?php
        $array = [2,6,2,6,1];
        print_r ($array);
        $result = 0;
        foreach ($array as $num => $valor) {
            $result += $array[$num];
        }
        echo "<br>La suma de todos los números del array es: " . $result;
	?>
</body>

</html>