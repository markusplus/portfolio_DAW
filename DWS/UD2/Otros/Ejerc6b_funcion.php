<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Tabla</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="Cálculos" content="Geany 1.35" />
</head>

<body>
    <?php
        $a = 4;
        $b = 2;
        $operaciones = array("suma", "resta", "multiplicación", "división");
        function realizaOperaciones($a, $b) {
            $result = array(0, 0, 0, 0);
            for($i = 0; $i < 4; $i++) {
                switch ($i) {
                    case 0:
                        $result[$i] = $a + $b;
                        break;
                    case 1:
                        $result[$i] = $a - $b;
                        break;

                    case 2:
                        $result[$i] = $a * $b;
                        break;
                    case 3:
                        $result[$i] = $a / $b;
                        break;
                }
            }
            return $result;
        }
        $result = realizaOperaciones($a, $b);
        for ($i=0; $i < 4; $i++) { 
            echo "El resultado de la " . $operaciones[$i] . " entre $a y $b es: " . $result[$i] . "<br>";
        }

    ?>
</body>

</html>