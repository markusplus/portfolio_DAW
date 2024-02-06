<?php
    include("conexiones.php");
    if(isset($_POST["dis_mostrar_btn"]) || isset($_POST["volver_mostrar_btn"])) {
        session_start();
        echo "<h1>" . $_SESSION["usuario"] .", selecciona el disco o el grupo del que deseas obtener información:</h1>";
        echo "<form id='discos_form' action='gestion_discos.php' method='POST'>";
        echo "<select name='grupo_slc' id='grupo_slc' form=discos_form>";
        echo "<option value='' selected disabled hidden>Selecciona grupo</option>";
        $con = conectar();
        $sql = "SELECT nombre FROM grupos";
        $resultado = mysqli_query($con, $sql);
        while($fila = mysqli_fetch_array($resultado)) {
            echo "<option value='" . $fila["nombre"] . "'>" . $fila["nombre"] . "</option>";
        }
        echo "</select>";
        echo " <select name='disco_slc' id='disco_slc' form='discos_form'>";
        echo "<option value='' selected disabled hidden>Selecciona disco</option>";
        $sql = "SELECT titulo FROM discos";
        $resultado = mysqli_query($con, $sql);
        while($fila = mysqli_fetch_array($resultado)) {
            echo "<option value='" . $fila["titulo"] . "'>" . $fila["titulo"] . "</option>";
        }
        echo "</select>";
        echo " Incluir canciones: <input type='checkbox' name='incluir_chk' id='incluir_chk'><br><br>";
        echo "<input type='submit' value='Mostrar' name='mostrar_btn'>";
        echo "</form>";
        echo "<button onclick='window.location.href=\"menu.php\"'>Volver</button><br><br>";
        echo "<form action='index.php' method='POST'>";
        echo "<input type='submit' value='Cerrar sesión' name='cerrar_sesion_btn'>";
        echo "</form>";
        mysqli_close($con);
    }
    else if(isset($_POST["dis_crear_btn"]) || isset($_POST["volver_crear_btn"])) {
        echo '<h1>Crear disco</h1>';
        echo '<form action="gestion_discos.php" method="POST" enctype="multipart/form-data">';
        echo '<label for="titulo">Título:</label>';
        echo '<input type="text" name="titulo" id="titulo" required><br><br>';
        echo '<label for="anio">Año:</label>';
        echo '<input type="number" name="anio" id="anio" required><br><br>';
        echo '<label for="sello">Sello:</label>';
        echo '<select name="sello" id="sello" required>';
        echo "<option value='' selected disabled hidden>Selecciona sello</option>";
        $con = conectar();
        $sql = "SELECT nombre FROM sellos";
        $resultado = mysqli_query($con, $sql);
        while($fila = mysqli_fetch_array($resultado)) {
            echo '<option value="' . $fila["nombre"] . '">' . $fila["nombre"] . '</option>';
        }
        mysqli_close($con);
        echo '</select><br><br>';
        echo '<label for="grupo">Grupo:</label>';
        echo '<select name="grupo" id="grupo" required>';
        echo "<option value='' selected disabled hidden>Selecciona grupo</option>";
        $con = conectar();
        $sql = "SELECT nombre FROM grupos";
        $resultado = mysqli_query($con, $sql);
        while($fila = mysqli_fetch_array($resultado)) {
            echo '<option value="' . $fila["nombre"] . '">' . $fila["nombre"] . '</option>';
        }
        mysqli_close($con);
        echo '</select><br><br>';
        echo '<label for="cubierta">Cubierta:</label>';
        echo '<input type="file" name="cubierta" id="cubierta"><br><br>';
        echo '<label for="cantidad_canciones">Cantidad de canciones:</label>';
        echo '<input type="number" name="cantidad_canciones" id="cantidad_canciones" required><br><br>';
        echo '<label for="descripcion">Descripción:</label>';
        echo '<textarea name="descripcion" id="descripcion"></textarea><br><br>';
        echo '<input type="submit" name="crear_disco_btn" value="Aceptar">';
        echo '<input type="button" value="Volver" onclick="window.location.href=\'menu.php\'">';
        echo '</form>';
        echo '<form action="index.php" method="POST">';
        echo '<input type="submit" value="Cerrar sesión" name="cerrar_sesion_btn">';
        echo '</form>';
    }
    else if(isset($_POST["dis_modificar_btn"])) {
    }
    else {
        header("location: index.php");
    }
?>