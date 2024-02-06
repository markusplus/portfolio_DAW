<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de discos</title>
</head>
<body>
    <?php 
        include("conexiones.php");
        if(isset($_POST["mostrar_btn"])) {
            $con = conectar();
            $grupo = $_POST["grupo_slc"];
            $disco = $_POST["disco_slc"];
            $incluir = isset($_POST["incluir_chk"]) ? true : false;
            if($grupo != "" && $disco != "") {
                $sql = "SELECT * FROM discos WHERE idgrupo=(SELECT idgrupo FROM grupos WHERE nombre='$grupo') AND titulo='$disco'";
            }
            else if($grupo != "") {
                $sql = "SELECT * FROM discos WHERE idgrupo IN (SELECT idgrupo FROM grupos WHERE nombre='$grupo')";
            } else if ($disco != ""){
                $sql = "SELECT * FROM discos WHERE titulo='$disco'";
            } else {
                echo "<h1>No se ha seleccionado ni grupo ni disco</h1>";
                echo "<form action='discos.php' method='POST'>";
                echo "<input type='submit' value='Volver' name='volver_btn'>";
                echo "</form>";
            }
            $resultado = mysqli_query($con, $sql);
            if($resultado != null) {
                while($fila = mysqli_fetch_array($resultado)) {
                    echo "<h1>Información del disco:</h1>";
                    echo "<img src='" . $fila["cubierta"] . "' alt='Portada del disco' width='50' height='50'>";
                    echo "<p>Título: " . $fila["titulo"] . "</p>";
                    $idsello = $fila["idsello"];
                    $sql_sellos = "SELECT nombre FROM sellos WHERE idsello='$idsello'";
                    $resultado_sellos = mysqli_query($con, $sql_sellos);
                    if($resultado_sellos != null) {
                        $fila_sellos = mysqli_fetch_array($resultado_sellos);
                        echo "<p>Discográfica: " . $fila_sellos["nombre"] . "</p>";
                    }
                    echo "<p>Año: " . $fila["anyo"] . "</p>";
                    if($incluir) {
                        $sql = "SELECT c.titulo FROM canciones c INNER JOIN cancionesdisco cd ON c.idcancion = cd.idcancion INNER JOIN discos d ON d.iddisco = cd.iddisco WHERE cd.iddisco='" . $fila["iddisco"] . "'";
                        $resultado_canciones = mysqli_query($con, $sql);
                        echo "<h2>Canciones:</h2>";
                        echo "<ul>";
                        while($fila = mysqli_fetch_array($resultado_canciones)) {
                            echo "<li>" . $fila[0] . "</li>";
                        }
                        echo "</ul>";
                    }
                    echo "<hr>";
                }
            } else {
                echo "<h1>No se ha encontrado el disco o grupo seleccionado</h1>";
            }
            echo "<form action='discos.php' method='POST'>";
            echo "<input type='submit' value='Volver' name='volver_mostrar_btn'>";
            echo "</form>";
            mysqli_close($con);
        }

        else if(isset($_POST["crear_disco_btn"])) {
            if(isset($_POST["cantidad_canciones"])) {
                $titulo = $_POST["titulo"];
                setcookie("titulo", $titulo);
                $anio = $_POST["anio"];
                setcookie("anio", $anio);
                $sello = $_POST["sello"];
                setcookie("sello", $sello);
                $grupo = $_POST["grupo"];
                setcookie("grupo", $grupo);
                $cubierta = "img/" . $_FILES["cubierta"]["name"];
                setcookie("cubierta", $cubierta);
                $cantidad_canciones = $_POST["cantidad_canciones"];
                echo "<h2>Dar de alta canciones:</h2>";
                echo "<form action='canciones.php' method='POST'>";
                for($i = 1; $i <= $cantidad_canciones; $i++) {
                    echo "<h3>Canción $i:</h3>";
                    echo "<label>Título:</label>";
                    echo "<input type='text' name='titulo' required>";
                    echo "<label>Autor:</label>";
                    echo "<input type='text' name='autor' required>";
                    echo "<br><br>";
                    echo "<label>Fecha:</label>";
                    echo "<input type='date' name='fecha' required>";
                    echo "<label>Duración:</label>";
                    echo "<input type='text' name='duracion' required>";
                    echo "<br><br>";
                    echo "<label>Letra:</label>";
                    echo "<textarea name='letra' required></textarea>";
                    echo "<br><br>";
                }
                echo "<input type='submit' value='Guardar canciones' name='guardar_canciones_btn'>";
                echo "</form>";
            }
            echo "<form action='discos.php' method='POST'>";
            echo "<input type='submit' value='Volver' name='volver_crear_btn'>";
            echo "</form>";
        }
    ?>
</body>
</html>