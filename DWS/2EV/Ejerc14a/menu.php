<?php 
    $con = mysqli_connect("localhost", "root", "", "discografia");
    function verificarInicio($con) {
        session_start();
        if(isset($_POST["usuario_txt"]) && isset($_POST["contrasena_psw"])) {
            encriptaConstrasenaPrimerUsuario();
            $usuario = $_POST["usuario_txt"];
            $contrasena = $_POST["contrasena_psw"];
            $usuarios = mysqli_query($con, "SELECT * FROM usuarios WHERE nombre='$usuario'");
            $usuarios = mysqli_fetch_array($usuarios, MYSQLI_ASSOC);
            if(password_verify($contrasena, $usuarios["pwd"])) {
                if($usuarios != null) {
                    $_SESSION["usuario"] = $usuario;
                    if($usuarios["tipo"] == 1) {
                        return 1;
                    } else {
                        return 0;
                    }
                } else {
                    return -1;
                }
            }else {return -1;}
        }else {
            if(isset($_SESSION["usuario"])) {
                $usuarios = mysqli_query($con, "SELECT * FROM usuarios WHERE nombre='$_SESSION[usuario]'");
                $usuarios = mysqli_fetch_array($usuarios, MYSQLI_ASSOC);
                if($usuarios["tipo"] == 1) {
                    return 1;
                } else {
                    return 0;
                }
            }else {
                return -1;
            }
        }
    } 

    function encriptaConstrasenaPrimerUsuario() {
        $con = mysqli_connect("localhost", "root", "", "discografia");
        $psw = mysqli_query($con, "SELECT pwd FROM usuarios WHERE codigo=1");
        $psw = mysqli_fetch_array($psw, MYSQLI_ASSOC);
        $psw_hash = password_hash($psw["pwd"], PASSWORD_DEFAULT);
        mysqli_query($con, "UPDATE usuarios SET pwd='$psw_hash' WHERE codigo=1 AND LENGTH(pwd) < 5");
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
        if($inicio_sesion == 1) {
            echo "<h1>Bienvenido/a " . $_SESSION["usuario"] . ". Seleccione la opción deseada.</h1>";
            echo '<form action="usuarios.php" method="POST">';
            echo '<input type="submit" value="crear" name="crear_btn">';
            echo '<input type="submit" value="mostrar" name="mostrar_btn">';
            echo '<input type="submit" value="eliminar" name="eliminar_btn"><br><br>';
            echo '<input type="submit" value="Cerrar" name="salir_btn">';
            echo '</form>';
        } else if($inicio_sesion == 0) {
            echo "<h1>Bienvenido/a " . $_SESSION["usuario"];
        } else {
            echo "<h1>Usuario o contraseña incorrectos</h1>";
        }
        mysqli_close($con);
    ?>
</body>
</html>