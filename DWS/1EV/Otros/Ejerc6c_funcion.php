<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Claves</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="Claves" content="Geany 1.35" />
</head>

<body>
    <?php
        $usuario = "Pepe";

        function generaClaves($usuario) {
            $result = [];
            $fin = false;
            $cont = 0;
            while($fin == false) {
                $numRand = strval(rand(1, 20));
                if($numRand < 10) {
                    $aux = $usuario . "0" . $numRand;
                }
                else {
                    $aux = $usuario . $numRand;
                }
                if (array_search($aux, $result) == false) {
                    array_push($result, $aux);
                    $cont++;
                }
                else {
                    $fin = true;
                }
            }
            return $result;
        }

        $result = generaClaves($usuario);
        echo "$usuario tiene " . count($result) . " claves posibles para utilizar, y son las siguientes:<br>";
        for ($i=0; $i < count($result); $i++) { 
            echo $result[$i] . "<br>";
        }

    ?>
</body>

</html>