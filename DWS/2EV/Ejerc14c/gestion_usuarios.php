<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de usuarios</title>
</head>
<body>
    <?php
        if(isset($_POST["aceptar_btn"])) {
            echo "<h1>Creando usuario...</h1>";
            $nombre = $_POST["nombre_txt"];
            $contrasena = password_hash($_POST["contrasena_psw"], PASSWORD_DEFAULT);
            $tipo = $_POST["tipo_slc"];
            $con = mysqli_connect("localhost", "root", "", "discografia");
            mysqli_query($con, "INSERT INTO usuarios(nombre, pwd, tipo) VALUES('$nombre', '$contrasena', '$tipo')");
            mysqli_close($con);
            echo "<h1>Usuario $nombre creado correctamente</h1>";
            echo "<form action='menu.php' method='POST'>";
            echo "</form>";
            echo "<button onclick='window.location.href=\"menu.php\"'>Volver</button>";
        } else if(isset($_POST["eliminar_btn"])) {
            $usuario = $_POST["usuario_slc"];
            $con = mysqli_connect("localhost", "root", "", "discografia");
            $query = mysqli_query($con, "SELECT * FROM usuarios WHERE nombre='$usuario'");
            $cod = mysqli_fetch_array($query, MYSQLI_ASSOC);
            mysqli_query($con, "DELETE FROM usuarios WHERE nombre='$usuario'");
            echo "<h1>Usuario con código " . $cod['codigo'] . " eliminado correctamente</h1>";
            echo "<form action='menu.php' method='POST'>";
            echo "</form>";
            echo "<button onclick='window.location.href=\"menu.php\"'>Volver</button>";
            mysqli_close($con);
        }
    ?>
</body>
</html>