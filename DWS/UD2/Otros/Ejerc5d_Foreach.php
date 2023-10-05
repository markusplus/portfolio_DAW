<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Medias</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="Tablas de multiplicar" content="Geany 1.35" />
</head>

<body>
	<?php
    $result = "";
        $estudiantesNotas = array(
            "Marco" => array(10, 8, 9, 5, 7),
            "Ivan" => array(6, 5, 9, 5, 7),
            "Marc" => array(7, 8, 9, 8, 10),
            "Juan" => array(4, 5, 2, 5, 7),
            "Rafa" => array(7, 10, 10, 10, 7)
        );
        foreach ($estudiantesNotas as $estudiante => $notas) {
            $media = 0;
            $tamano = 0;
            foreach ($notas as $nota) {
                $media += $nota;
                $tamano++;
            }
            $result = $result . "El estudiate $estudiante tiene una media de " . ($media / $tamano) . "<br>"; 
        
        }
        echo $result;
	?>
</body>

</html>