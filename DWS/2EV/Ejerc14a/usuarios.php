<?php
    if(isset($_POST["crear_btn"])) {
        session_start();
        echo "<h1>" . $_SESSION["usuario"] .", introduce la información del usuario:</h1>";
        echo "<form name='crear_form' action='gestion_usuarios.php' method='POST'>";
        echo "<label for='nombre_txt'>Nombre: </label>";
        echo "<input type='text' name='nombre_txt' id='nombre_txt'><br><br>";
        echo "<label for='contrasena_psw'>Contraseña: </label>";
        echo "<input type='password' name='contrasena_psw' id='contrasena_psw'><br><br>";
        echo "<label for='tipo_slc'>Tipo: </label>";
        echo "<select name='tipo_slc' id='tipo_slc'>";
        echo "<option value='1'>Administrador</option>";
        echo "<option value='0'>Usuario</option>";
        echo "</select><br><br>";
        echo "<input type='submit' value='Aceptar' name='aceptar_btn'>";
        echo "<input type='submit' value='Volver' name='volver_btn'>";
        echo "</form>";
    } else if(isset($_POST["mostrar_btn"])) {
        session_start();
        echo "<h1>" . $_SESSION["usuario"] .", estos son los usuarios registrados:</h1>";
        $con = mysqli_connect("localhost", "root", "", "discografia");
        $usuarios = mysqli_query($con, "SELECT * FROM usuarios");
        echo "<table border='1'>";
        while($fila = mysqli_fetch_array($usuarios, MYSQLI_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $fila["nombre"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<form action='gestion_usuarios.php' method='POST'>";
        echo "<br><input type='submit' value='Volver' name='volver_btn'>";
        echo "</form>";
        mysqli_close($con);
    } else if(isset($_POST["eliminar_btn"])) {
        echo "<h1>Selecciona el nombre del usuario que quieres eliminar:</h1>";
        $con = mysqli_connect("localhost", "root", "", "discografia");
        $usuarios = mysqli_query($con, "SELECT * FROM usuarios");
        echo "<form action='gestion_usuarios.php' method='POST'>";
        echo "<select name='usuario_slc' id='usuario_slc'>";
        while($fila = mysqli_fetch_array($usuarios, MYSQLI_ASSOC)) {
            if($fila["nombre"] != $_SESSION["usuario"]) {
                echo "<option value='" . $fila["nombre"] . "'>" . $fila["nombre"] . "</option>";
            }
        }
        echo "</select><br><br>";
        echo "<input type='submit' value='Eliminar' name='eliminar_btn'>";
        echo "<input type='submit' value='Volver' name='volver_btn'>";
        echo "</form>";
        mysqli_close($con);
    } else if(isset($_POST["salir_btn"])) {
        session_start();
        session_destroy();
        header("Location: index.php");
    }
?>