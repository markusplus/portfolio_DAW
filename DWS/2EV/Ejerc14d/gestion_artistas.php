<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de artistas</title>
</head>
<body>
    <?php
        include("conexiones.php");
        if(isset($_POST["artista_slc"])) {
            $artista = $_POST["artista_slc"];
            if($artista != "todos") {
                $con = conectar();
                $query = mysqli_query($con, "SELECT artistas.nombre, biografia, artistas.nacionalidad, instrumento, artistas.website, grupos.nombre, discos.titulo 
                                                FROM artistas 
                                                LEFT JOIN integrantes ON artistas.idartista = integrantes.idartista 
                                                LEFT JOIN grupos ON integrantes.idgrupo = grupos.idgrupo 
                                                LEFT JOIN discos ON discos.idgrupo = grupos.idgrupo 
                                                WHERE artistas.nombre = '$artista'");
                $query2 = mysqli_query($con, "SELECT DISTINCT d.titulo
                FROM artistas a 
                INNER JOIN integrantes i ON a.idartista = i.idartista 
                INNER JOIN grupos g ON g.idgrupo = i.idgrupo 
                INNER JOIN discos d ON i.idgrupo = d.idgrupo
                WHERE a.nombre = '$artista'");
                $result = "";
                $artistas = mysqli_fetch_array($query, MYSQLI_NUM);
                mysqli_close($con);
                echo "<h1>Información del artista</h1>";
                echo "<p><b>Nombre:</b> $artistas[0]</p>";
                echo "<p><b>Biografía:</b> $artistas[1]</p>";
                echo "<p><b>Nacionalidad:</b> $artistas[2]</p>";
                echo "<p><b>Instrumento:</b> $artistas[3]</p>";
                echo "<p><b>Website:</b> $artistas[4]</p>";
                echo "<p><b>Grupo:</b> $artistas[5]</p>";
                while($discos = mysqli_fetch_array($query2, MYSQLI_NUM)) {
                    $result .= $discos[0].", ";
                }
                $result = rtrim($result, ", ");
                echo "<p><b>Discos:</b> ".$result."</p>";
            }
            else {
                $con = conectar();
                $query = mysqli_query($con, "SELECT DISTINCT artistas.nombre, biografia, artistas.nacionalidad, instrumento, artistas.website, grupos.nombre 
                                                FROM artistas 
                                                LEFT JOIN integrantes ON artistas.idartista = integrantes.idartista 
                                                LEFT JOIN grupos ON integrantes.idgrupo = grupos.idgrupo");
                echo "<h1>Información de los artistas</h1>";
                while($artistas = mysqli_fetch_array($query, MYSQLI_NUM)) {
                    $result = "";
                    echo "<p><b>Nombre:</b> $artistas[0]</p>";
                    echo "<p><b>Biografía:</b> $artistas[1]</p>";
                    echo "<p><b>Nacionalidad:</b> $artistas[2]</p>";
                    echo "<p><b>Instrumento:</b> $artistas[3]</p>";
                    echo "<p><b>Website:</b> $artistas[4]</p>";
                    echo "<p><b>Grupo:</b> $artistas[5]</p>";
                    $query2 = mysqli_query($con, "SELECT DISTINCT d.titulo
                                                FROM artistas a 
                                                INNER JOIN integrantes i ON a.idartista = i.idartista 
                                                INNER JOIN grupos g ON g.idgrupo = i.idgrupo 
                                                INNER JOIN discos d ON i.idgrupo = d.idgrupo
                                                WHERE a.nombre = '$artistas[0]'");
                    while($discos = mysqli_fetch_array($query2, MYSQLI_NUM)) {
                        $result .= $discos[0].", ";
                    }
                    $result = rtrim($result, ", ");
                    echo "<p><b>Discos:</b> ".$result."</p>";
                    echo "<hr>";
                }
                mysqli_close($con);
            }
            echo "<button onclick='window.location.href=\"menu.php\"'>Volver</button>";
        } else if(isset($_POST["artista_slc_modificar"])) {
            $artista = $_POST["artista_slc_modificar"];
            $con = conectar();
            $query = mysqli_prepare($con, "SELECT * FROM artistas WHERE nombre = ?");
            mysqli_stmt_bind_param($query, "s", $artista);
            mysqli_stmt_execute($query);
            $query = mysqli_stmt_get_result($query);
            $artista = mysqli_fetch_array($query, MYSQLI_ASSOC);
            setcookie("nombre", $artista["nombre"]);
            mysqli_close($con);
            echo "<h1>Modifica los datos del artista</h1>";
            echo "<form action='modificar_artista.php' method='POST'>";
            echo "<label for='nombre_txt'>Nombre: </label>";
            echo "<input type='text' name='nombre_txt' id='nombre_txt' value='".$artista["nombre"]."'><br><br>";
            echo "<label for='instrumento_txt'>Instrumento: </label>";
            echo "<input type='text' name='instrumento_txt' id='instrumento_txt' value='".$artista["instrumento"]."'><br><br>";
            echo "<label for='nacionalidad_txt'>Nacionalidad: </label>";
            echo "<input type='text' name='nacionalidad_txt' id='nacionalidad_txt' value='".$artista["nacionalidad"]."'><br><br>";
            echo "<label for='website_txt'>Website: </label>";
            echo "<input type='text' name='website_txt' id='website_txt' value='".$artista["website"]."'><br><br>";
            echo "<label for='biografia_txt'>Biografia: </label>";
            echo "<textarea name='biografia_txt' id='biografia_txt' cols='30' rows='10'>".$artista["biografia"]."</textarea><br><br>";
            echo "<input type='submit' value='Aceptar' name='modificar_btn'>";
            echo "</form>";
            echo "<button onclick='window.location.href=\"menu.php\"'>Volver</button>";
        } else if(isset($_POST["artista_slc_eliminar"])) {
            $con = conectar();
            $stmt = mysqli_prepare($con, "DELETE FROM artistas WHERE nombre = ?");
            mysqli_stmt_bind_param($stmt, "s", $_POST["artista_slc_eliminar"]);
            if (mysqli_stmt_execute($stmt)) {
                echo "<h1>Artista eliminado correctamente</h1>";
            } else {
                echo "<h1>Error al eliminar el artista</h1>";
            }
            mysqli_close($con);
            echo "<button onclick='window.location.href=\"menu.php\"'>Volver</button>";
        } else if(isset($_POST["aceptar_btn"])) {
            $con = conectar();
            $stmt = mysqli_prepare($con, "INSERT INTO artistas (nombre, biografia, nacionalidad, instrumento, website) VALUES (?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "sssss", $_POST["nombre_txt"], $_POST["biografia_txt"], $_POST["nacionalidad_txt"], $_POST["instrumento_txt"], $_POST["website_txt"]);
            mysqli_stmt_execute($stmt);
            mysqli_close($con);
            echo "<h1>Artista añadido correctamente</h1>";
            echo "<button onclick='window.location.href=\"menu.php\"'>Volver</button>";
        }
    ?>
</body>
</html>