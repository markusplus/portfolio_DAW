<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Medias</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="Tablas de multiplicar" content="Geany 1.35" />
</head>

<body>
    <table border="1">
        <?php
            $cont = 1;
            $concat = "";
            for ($i = 0; $i < 10; $i++) {
                $concat .= '<tr>';
                for ($j = 1; $j <= 10; $j++) {
                    $concat .= '<td>' . $cont .'</td>';
                    $cont += $j;
                }
                $cont += 10;
            }
            echo $concat;
        ?>

    </table>
</body>

</html>