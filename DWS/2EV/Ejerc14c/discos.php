<?php
    include("conexiones.php");
    if(isset($_POST["dis_mostrar_btn"])) {
        session_start();
        echo "<h1>" . $_SESSION["usuario"] .", selecciona el disco o el grupo del que deseas obtener información:</h1>";
        echo "<select name='grupo_slc' id='grupo_slc' onchange='actualizaDiscos(this.options[this.selectedIndex].text)' form=discos_form>";
        echo "<option value='' selected disabled hidden>Selecciona grupo</option>";
        $con = conectar();
        $sql = "SELECT nombre FROM grupos";
        $resultado = mysqli_query($con, $sql);
        while($fila = mysqli_fetch_array($resultado)) {
            echo "<option value='" . $fila["nombre"] . "'>" . $fila["nombre"] . "</option>";
        }
        echo "</select>";
        echo "<script src='script.js'></script>";
        echo " <select name='disco_slc' id='disco_slc' form='discos_form'>";
        echo "<option value='' selected disabled hidden>Selecciona disco</option>";
        $sql = "<script src='script.js'>formaConsulta()</script>";
        //$resultado = mysqli_query($con, $sql);
        /*  while($fila = mysqli_fetch_array($resultado)) {
            echo "<option value='" . $fila["titulo"] . "'>" . $fila["titulo"] . "</option>";
        }  */ 
        echo "</select>";
        echo $sql;
        echo "<form id='discos_form' action='gestion_discos.php' method='POST'>";
        echo " Incluir canciones: <input type='checkbox' name='incluir_chk' id='incluir_chk'><br><br>";
        echo "<input type='submit' value='Mostrar' name='mostrar_btn'>";
        echo "</form>";
        echo "<button onclick='window.location.href=\"menu.php\"'>Volver</button>";

    }
?>