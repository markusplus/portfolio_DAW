<?php
    if(isset($_POST["modificar_btn"])) {
        $nombre = $_POST["nombre_txt"];
        $instrumento = $_POST["instrumento_txt"];
        $nacionalidad = $_POST["nacionalidad_txt"];
        $website = $_POST["website_txt"];
        $biografia = $_POST["biografia_txt"];
        $con = mysqli_connect("localhost", "root", "", "discografia");
        $query = mysqli_prepare($con, "UPDATE artistas SET nombre=?, instrumento=?, nacionalidad=?, website=?, biografia=? WHERE nombre=?");
        mysqli_stmt_bind_param($query, "ssssss", $nombre, $instrumento, $nacionalidad, $website, $biografia, $_COOKIE["nombre"]);
        mysqli_stmt_execute($query);
        mysqli_close($con);
        echo "<h1>Artista modificado correctamente</h1>";
        echo "<button onclick='window.location.href=\"menu.php\"'>Volver</button>";
    }
?>