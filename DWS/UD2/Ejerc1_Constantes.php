<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Conversor</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.35" />
</head>

<body>
	<?php
		$pulgada = 7;
		$libra = 5;
		const CONST_PULGADA = 2.54;
		const CONST_LIBRA = 0.45359237;
		echo "La versión del intérprete de PHP de nuestro servidor es " . PHP_VERSION;
		echo "<br> La ruta en la que se almacenan las librerías es " . PHP_LIBDIR;
		echo "<br> La ruta completa del archivo es ". __FILE__;
		echo "<br><br>$pulgada pulgadas son ".($pulgada * CONST_PULGADA). " centímetros<br>";
		echo "$libra libras son ".($libra * CONST_LIBRA). " km";
	?>
</body>

</html>
