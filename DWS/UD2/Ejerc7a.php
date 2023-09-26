<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>DNI</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="Claves" content="Geany 1.35" />
</head>

<body>
    <?php
        $dni = "47477809J";
        function compruebaDNI($dni) {
            $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
            $numeros = intval(substr($dni, 0, 8));
            $letra = substr($dni, 8);
            $result = $numeros % 23;
            if ($letra == $letras[$result]) {
                return true;
            }
            else {
                return false;
            }
        }
        if(compruebaDNI($dni)) {
            echo "El DNI $dni es correcto";
        }
        else {
            echo "El DNI $dni es INcorrecto";
        }
    ?>
</body>

</html>