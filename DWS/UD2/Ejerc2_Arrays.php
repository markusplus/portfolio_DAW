<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Arrays con libros</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.35" />
</head>

<body>
	<?php
		$libros = array(
					array(
						"titulo" => "La verdad sobre el caso Harry Quebert",
						"autor" => "Joël Dicker",
						"ano" => "2012"
						),
					array(
						"titulo" => "Brisingr",
						"autor" => "Christopher Paolini",
						"ano" => "2008"
						),
					array(
						"titulo" => "La sombra del viento",
						"autor" => "Carlos Ruiz Zafón",
						"ano" => "2001"
						)
					);
		echo "Muestra todo el array con print_r:<br>";
		print_r($libros);
		echo "<br><br>";
		echo "Información de '" . $libros[1]["titulo"] . "':<br>Autor: " . 
			$libros[1]["autor"] . "<br>Año: " . $libros[1]["ano"];
		$libros[3] = array(
						"titulo" => "Territorio Comanche",
						"autor" => "Arturo Pérez-Reverte",
						"ano" => "2000"
						);
		echo "<br><br>";
		echo "Información de '" . $libros[count($libros)-1]["titulo"] . "':<br>Autor: " . 
			$libros[count($libros)-1]["autor"] . "<br>Año: " . $libros[count($libros)-1]["ano"];
		echo "<br><br>";
		echo "Muestra todo el array con print_r:<br>";
		print_r($libros);
	?>
</body>

</html>
