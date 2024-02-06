<?php 
    include("conexiones.php");
    $con = conectar();
    function verificarInicio($con) {
        session_start();
        if(isset($_POST["usuario_txt"]) && isset($_POST["contrasena_psw"])) {
            encriptaConstrasenaPrimerUsuario();
            $usuario = $_POST["usuario_txt"];
            $contrasena = $_POST["contrasena_psw"];
            $stmt = mysqli_prepare($con, "SELECT * FROM usuarios WHERE nombre=?");
            mysqli_stmt_bind_param($stmt, "s", $usuario);
            mysqli_stmt_execute($stmt);
            $usuarios = mysqli_stmt_get_result($stmt);
            $usuarios = mysqli_fetch_array($usuarios, MYSQLI_ASSOC);
            if($usuarios != null) {
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
            }else {return -1;}
        }else {
            if(isset($_SESSION["usuario"])) {
                $stmt = mysqli_prepare($con, "SELECT * FROM usuarios WHERE nombre=?");
                mysqli_stmt_bind_param($stmt, "s", $_SESSION["usuario"]);
                mysqli_stmt_execute($stmt);
                $usuarios = mysqli_stmt_get_result($stmt);
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
        $con = conectar();
        $stmt = mysqli_prepare($con, "SELECT pwd FROM usuarios WHERE codigo=1");
        mysqli_stmt_execute($stmt);
        $psw = mysqli_stmt_get_result($stmt);
        $psw = mysqli_fetch_array($psw, MYSQLI_ASSOC);
        $psw_hash = password_hash($psw["pwd"], PASSWORD_DEFAULT);
        $stmt = mysqli_prepare($con, "UPDATE usuarios SET pwd=? WHERE codigo=1 AND LENGTH(pwd) < 5");
        mysqli_stmt_bind_param($stmt, "s", $psw_hash);
        mysqli_stmt_execute($stmt);
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
            //Usuarios
            echo '<form action="usuarios.php" method="POST">';
            echo '<label><strong>Usuarios: </strong></label>';
            echo '<input type="submit" value="crear" name="usr_crear_btn">';
            echo '<input type="submit" value="mostrar" name="usr_mostrar_btn">';
            echo '<input type="submit" value="eliminar" name="usr_eliminar_btn"><br><br>';
            echo '</form>';
            //Artistas
            echo '<form action="artistas.php" method="POST">';
            echo '<label><strong>Artistas: </strong></label>';
            echo '<input type="submit" value="crear" name="art_crear_btn">';
            echo '<input type="submit" value="mostrar" name="art_mostrar_btn">';
            echo '<input type="submit" value="modificar" name="art_modificar_btn">';
            echo '<input type="submit" value="eliminar" name="art_eliminar_btn"><br><br>';
            echo '</form>';
            //Discos
            echo '<form action="discos.php" method="POST">';
            echo '<label><strong>Discos: </strong></label>';
            echo '<input type="submit" value="crear" name="dis_crear_btn">';
            echo '<input type="submit" value="mostrar" name="dis_mostrar_btn">';
            echo '<input type="submit" value="modificar" name="dis_modificar_btn"><br><br>';
            echo '</form>';
            echo "<form action='index.php' method='POST'>";
            echo "<input type='submit' value='Cerrar sesión' name='cerrar_sesion_btn'>";
            echo "</form>";
        } else if($inicio_sesion == 0) {
            echo "<h1>Bienvenido/a " . $_SESSION["usuario"];
            //Artistas
            echo '<form action="artistas.php" method="POST">';
            echo '<label><strong>Artistas: </strong></label>';
            echo '<input type="submit" value="crear" name="art_crear_btn">';
            echo '<input type="submit" value="mostrar" name="art_mostrar_btn">';
            echo '</form>';
            echo "<form action='index.php' method='POST'>";
            echo "<input type='submit' value='Cerrar sesión' name='cerrar_sesion_btn'>";
            echo "</form>";
        } else {
            echo "<h1>Usuario o contraseña incorrectos</h1>";
        }
        mysqli_close($con);
    ?>
</body>
</html>