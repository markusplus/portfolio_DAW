<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Paises y Capitales</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="Tablas de multiplicar" content="Geany 1.35" />
</head>

<body>
	<?php
        $result = "";
        $paisesCapitales = array(
            "España" => "Madrid",
            "Francia" => "París",
            "Alemania" => "Berlín",
            "Inglaterra" => "Londres",
            "Estonia" => "Tallín"
        );
        foreach ($paisesCapitales as $pais => $capital) {
            $result = $result . "País: " . $pais . ", Capital: " . $capital . "<br>";
        }
        echo $result;
	?>
</body>

</html>