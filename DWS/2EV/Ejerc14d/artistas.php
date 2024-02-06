<?php
    include("conexiones.php");
    if(isset($_POST["art_crear_btn"])) {
        session_start();
        echo "<h1>" . $_SESSION["usuario"] .", introduce la información del artista:</h1>";
        echo "<form name='crear_form' action='gestion_artistas.php' method='POST'>";
        echo "<label for='nombre_txt'>Nombre: </label>";
        echo "<input type='text' name='nombre_txt' id='nombre_txt'><br><br>";
        echo "<label for='instrumento_txt'>Instrumento: </label>";
        echo "<input type='text' name='instrumento_txt' id='instrumento_txt'><br><br>";
        echo "<label for='nacionalidad_txt'>Nacionalidad: </label>";
        echo "<input type='text' name='nacionalidad_txt' id='nacionalidad_txt'><br><br>";
        echo "<label for='website_txt'>Website: </label>";
        echo "<input type='text' name='website_txt' id='website_txt'><br><br>";
        echo "<label for='biografia_txt'>Biografia: </label>";
        echo "<textarea name='biografia_txt' id='biografia_txt' cols='30' rows='10'></textarea><br><br>";
        echo "<input type='submit' value='Aceptar' name='aceptar_btn'>";
        echo "</form>";
        echo "<button onclick='window.location.href=\"menu.php\"'>Volver</button>";
        
    } else if(isset($_POST["art_mostrar_btn"])) {
        session_start();
        echo "<h1>" . $_SESSION["usuario"] .", selecciona el artista del que deseas obtener información:</h1>";
        echo "<form action='gestion_artistas.php' method='POST'>";
        echo "<select name='artista_slc' id='artista_slc'>";
        $con = conectar();
        $artistas = mysqli_query($con, "SELECT * FROM artistas");
        while($fila = mysqli_fetch_array($artistas, MYSQLI_ASSOC)) {
            echo "<option value='" . $fila["nombre"] . "'>" . $fila["nombre"] . "</option>";
        }
        echo "<option value='todos'>Mostrar todos</option>";
        echo "</select><br><br>";
        echo "<input type='submit' value='Mostrar' name='mostrar_btn'>";
        echo "</form>";
        echo "<button onclick='window.location.href=\"menu.php\"'>Volver</button>";
        mysqli_close($con);
    } else if(isset($_POST["art_eliminar_btn"])) {
        session_start();
        echo "<h1>" . $_SESSION["usuario"] .", selecciona el artista que deseas eliminar:</h1>";
        $con = conectar();
        $artistas = mysqli_query($con, "SELECT * FROM artistas");
        echo "<form action='gestion_artistas.php' method='POST'>";
        echo "<select name='artista_slc_eliminar' id='artista_slc_eliminar'>";
        while($fila = mysqli_fetch_array($artistas, MYSQLI_ASSOC)) {
            echo "<option value='" . $fila["nombre"] . "'>" . $fila["nombre"] . "</option>";
        }
        echo "</select><br><br>";
        echo "<input type='submit' value='Eliminar' name='eliminar_btn'>";
        echo "</form>";
        echo "<button onclick='window.location.href=\"menu.php\"'>Volver</button>";
        mysqli_close($con);
    } else if(isset($_POST["art_modificar_btn"])) {
        session_start();
        echo "<h1>" . $_SESSION["usuario"] .", selecciona el artista que deseas modificar:</h1>";
        $con = conectar();
        $artistas = mysqli_query($con, "SELECT * FROM artistas");
        echo "<form action='gestion_artistas.php' method='POST'>";
        echo "<select name='artista_slc_modificar' id='artista_slc'>";
        while($fila = mysqli_fetch_array($artistas, MYSQLI_ASSOC)) {
            echo "<option value='" . $fila["nombre"] . "'>" . $fila["nombre"] . "</option>";
        }
        echo "</select><br><br>";
        echo "<input type='submit' value='Modificar' name='modificar_btn'>";
        echo "</form>";
        echo "<button onclick='window.location.href=\"menu.php\"'>Volver</button>";
        mysqli_close($con);
    }
?>