<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de artistas</title>
</head>
<body>
    <?php
        if(isset($_POST["artista_slc"])) {
            $artista = $_POST["artista_slc"];
            if($artista != "todos") {
                $con = mysqli_connect("localhost", "root", "", "discografia");
                $query = mysqli_query($con, "SELECT artistas.nombre, biografia, artistas.nacionalidad, instrumento, artistas.website, grupos.nombre, discos.titulo 
                                                FROM artistas 
                                                INNER JOIN integrantes ON artistas.idartista = integrantes.idartista 
                                                INNER JOIN grupos ON integrantes.idgrupo = grupos.idgrupo 
                                                INNER JOIN discos ON discos.idgrupo = grupos.idgrupo 
                                                WHERE artistas.nombre = '$artista'");
                $artistas = mysqli_fetch_array($query, MYSQLI_NUM);
                mysqli_close($con);
                echo "<h1>Información del artista</h1>";
                echo "<p><b>Nombre:</b> $artistas[0]</p>";
                echo "<p><b>Biografía:</b> $artistas[1]</p>";
                echo "<p><b>Nacionalidad:</b> $artistas[2]</p>";
                echo "<p><b>Instrumento:</b> $artistas[3]</p>";
                echo "<p><b>Website:</b> $artistas[4]</p>";
                echo "<p><b>Grupo:</b> $artistas[5]</p>";
                echo "<p><b>Disco:</b> $artistas[6]</p>";
            }
            else {
                $con = mysqli_connect("localhost", "root", "", "discografia");
                $query = mysqli_query($con, "SELECT artistas.nombre, biografia, artistas.nacionalidad, instrumento, artistas.website, grupos.nombre, discos.titulo 
                                                FROM artistas 
                                                LEFT JOIN integrantes ON artistas.idartista = integrantes.idartista 
                                                INNER JOIN grupos ON integrantes.idgrupo = grupos.idgrupo 
                                                INNER JOIN discos ON discos.idgrupo = grupos.idgrupo");
                mysqli_close($con);
                echo "<h1>Información de los artistas</h1>";
                $nombres = array();
                $discos = array();
                while($artistas = mysqli_fetch_array($query, MYSQLI_NUM)) {
                    if(!in_array($artistas[0], $nombres)) {
                        if(count($nombres) > 0) {
                            echo "<p><b>Discos:</b>".$discos[count($discos)-1]."</p>";
                            echo "<hr>";
                        }
                        array_push($nombres, $artistas[0]);
                        array_push($discos, $artistas[6]);
                        echo "<p><b>Nombre:</b> $artistas[0]</p>";
                        echo "<p><b>Biografía:</b> $artistas[1]</p>";
                        echo "<p><b>Nacionalidad:</b> $artistas[2]</p>";
                        echo "<p><b>Instrumento:</b> $artistas[3]</p>";
                        echo "<p><b>Website:</b> $artistas[4]</p>";
                        echo "<p><b>Grupo:</b> $artistas[5]</p>";
                    }
                    else {
                        $discos[count($discos)-1] .= ", " . $artistas[6];
                    }
                }
                echo "<p><b>Discos:</b>".$discos[count($discos)-1]."</p>";
                echo "<hr>";
            }
            echo "<button onclick='window.location.href=\"menu.php\"'>Volver</button>";
        } else if(isset($_POST["artista_slc_modificar"])) {
            $artista = $_POST["artista_slc_modificar"];
            
        }
    ?>
</body>
</html>