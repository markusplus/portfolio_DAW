<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Suma 10 primeros</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="Tablas de multiplicar" content="Geany 1.35" />
</head>

<body>
	<?php
        $result = "La suma de los 10 primeros números es: ";
        $nums = 0;
        for ($i=1; $i <= 10; $i++) { 
            $nums += $i;
            if ($i == 1) {
                $result = $result . " $i ";
            }
            else if($i > 1 && $i < 10) {
                $result = $result . " + $i ";
            }
            else if($i == 10) {
                $result = $result . "+ $i = " . $nums;
            }
        }
        echo $result;
	?>
</body>

</html>