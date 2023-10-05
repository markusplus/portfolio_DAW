<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Nombres productos</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="Claves" content="Geany 1.35" />
</head>

<body>
    <?php
        $producto_original = "nombre del producto, con: caracteres especiales; ";
	  	  $nombre_blancos = trim($producto_original);
		  $nombre_minusculas = strtolower($nombre_blancos);
		  $nombre_caracteres = str_replace(array(";", ".", ",", ":"), "", $nombre_minusculas);
          $nombre_mayus = ucwords($nombre_caracteres);
		  $result = $nombre_mayus;
          echo "Producto original:<br>" . $producto_original . "<br>";
          echo "Producto procesado:<br>" . $result;
    ?>
</body>

