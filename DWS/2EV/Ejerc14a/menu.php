<?php 
    $con = mysqli_connect("localhost", "root", "", "discografia");
    function verificarInicio($con) {
        if(isset($_POST["usuario_txt"]) && isset($_POST["contrasena_psw"])) {
            $usuario = $_POST["usuario_txt"];
            $contrasena = $_POST["contrasena_psw"];
            $usuarios = mysqli_query($con, "SELECT * FROM usuarios WHERE nombre='$usuario' AND pwd='$contrasena'");
            $rows = mysqli_fetch_array($usuarios, MYSQLI_ASSOC);
            if($rows != null) {
                session_start();
                $_SESSION["usuario"] = $usuario;
                if($rows["tipo"] == 1) {
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return -1;
            }
        }else {
            return -1;
        }
    } 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
</head>
<body>
    <?php
        $inicio_sesion = verificarInicio($con);
        if($inicio_sesion == 1 || $inicio_sesion == 0) {
            echo "<h1>Bienvenido/a " . $_SESSION["usuario"] . ". Seleccione la opción deseada.</h1>";
        } else {
            echo "<h1>Usuario o contraseña incorrectos</h1>";
        }
        mysqli_close($con);
    ?>
</body>
</html>