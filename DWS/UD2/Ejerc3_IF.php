<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Puntuación</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.35" />
</head>

<body>
	<?php
		$habilidad = 50;
        $result = "Nivel Experto";
        if ($habilidad >= 0 && $habilidad <= 25) {
            $result = "Nivel Principiante";
        }
        else if($habilidad > 25 && $habilidad <= 50) {
            $result = "Nivel Intermedio";
        }
        else if($habilidad > 50 && $habilidad <= 75) {
            $result = "Nivel Avanzado";
        }
        else if($habilidad > 75 && $habilidad <= 100) {
            $result = "Nivel Experto";
        }
        else {
            $result = "El valor introduciodo no es correcto, no está comprendido entre 0 y 100";
        }
        echo $result;
	?>
</body>

</html>