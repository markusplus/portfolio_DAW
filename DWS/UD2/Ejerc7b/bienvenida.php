<?php
    include 'comprobaciones.php';
	if(isset($_GET["enviar_btn"])){
        if (compruebaDNI($_GET["dni_txt"]) == 1) {
            echo "Bienvenido, " . $_GET["nombre_txt"] . ".";
        }
		else if(compruebaDNI($_GET["dni_txt"]) == 0){
            echo "<script language='javascript'> alert('El nif no es correcto'); </script>";
        }
        else if(compruebaDNI($_GET["dni_txt"]) == -1){
            echo "<script language='javascript'> alert('El numero de digitos no es correcto'); </script>";
        }
	} else if(isset($_POST["enviar_btn"])){
		if (compruebaDNI($_POST["dni_txt"]) == 1) {
            echo "Bienvenido, " . $_POST["nombre_txt"] . ".";
        }
		else if(compruebaDNI($_POST["dni_txt"]) == 0){
            echo "<script language='javascript'> alert('El nif no es correcto'); </script>";
        }
        else if(compruebaDNI($_POST["dni_txt"]) == -1){
            echo "<script language='javascript'> alert('El numero de digitos no es correcto'); </script>";
        }
	}
?>