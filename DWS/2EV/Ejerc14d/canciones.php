<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canciones</title>
</head>
<body>
    <?php 
        include("conexiones.php");
        if(isset($_POST["guardar_canciones_btn"])) {
            // Recoger los datos del disco
            $titulo_disco = $_COOKIE["titulo"];
            $anio_disco = $_COOKIE["anio"];
            $sello_disco = $_COOKIE["sello"];
            $grupo_disco = $_COOKIE["grupo"];
            $cubierta_disco = $_COOKIE["cubierta"];

            // Recoger los datos de las canciones
            $titulo_cancion = $_POST["titulo"];
            $autor_cancion = $_POST["autor"];
            $fecha_cancion = $_POST["fecha"];
            $duracion_cancion = $_POST["duracion"];
            $letra_cancion = $_POST["letra"];

            // Iniciar la transacción
            mysqli_begin_transaction($conexion);

            // Insertar el disco
            $insertar_disco = mysqli_query($conexion, "INSERT INTO discos (titulo, anyo, idsello, idgrupo, cubierta) VALUES ('$titulo_disco', '$anio_disco', (SELECT idsello FROM sellos WHERE nombre='$sello_disco'), (SELECT idgrupo FROM grupos WHERE nombre='$grupo_disco'), '$cubierta_disco')");

            // Insertar las canciones
            $insertar_canciones = true;
            foreach ($canciones as $cancion) {
                $insertar_cancion = mysqli_query($conexion, "INSERT INTO canciones (titulo, autor, duracion, letra) VALUES ('$titulo_cancion', '$autor_cancion', $duracion_cancion, '$letra_cancion')");
                if (!$insertar_cancion) {
                    $insertar_canciones = false;
                    break;
                }
            }

            // Comprobar si se insertaron tanto el disco como las canciones
            if ($insertar_disco && $insertar_canciones) {
                // Confirmar la transacción
                mysqli_commit($conexion);
                echo "El disco y las canciones se han insertado correctamente.";
            } else {
                // Revertir la transacción
                mysqli_rollback($conexion);
                echo "Ha ocurrido un error al insertar el disco y las canciones.";
            }
        }
    ?>
</body>
</html>