<?php
session_start();
?>
<?php
    function verificaTarjeta() {
        if(isset($_POST["Submit"])) {
            if(isset($_POST["numero"])) {
                $numero = $_POST["numero"];
                $numero = str_replace(" ", "", $numero);
                $impares = array();
                $suma = 0;
                for ($i = 0; $i < strlen($numero); $i++) {
                    if($i % 2 == 0 || $i == 0) {
                        $aux = $numero[$i] * 2;
                        if($aux > 9) {
                            $aux = $aux - 9;
                        }
                        array_push($impares, $aux);
                    }
                    else{
                        array_push($impares, "");
                    }
                }
                for ($i = 0; $i < count($impares); $i++) {
                    if($impares[$i] == "") {
                        $impares[$i] = $numero[$i];
                    }
                    $suma += intval($impares[$i]);
                }
                if($suma % 10 == 0 && $suma <= 150) {
                    return true;
                }
                else {
                    return false;
                }
                //echo implode("",$impares);
                //echo $suma;
            }
        }
    }
    function verificaFecha() {
        if(isset($_POST["Submit"])) {
            if(isset($_POST["año"])) {
                if(intval($_POST["año"]) > date("Y")) {
                    return true;
                }
                else if(intval(intval($_POST["año"])) == date("Y")) {
                    if(isset($_POST["mes"])) {
                        if(intval($_POST["mes"]) > date("m")) {
                            return true;
                        }
                        else if(intval($_POST["mes"]) < date("m")){
                            return false;
                        }
                    }
                }
                else {
                    return false;
                }
            }
        }
    }
    if(isset($_SESSION["1"])) {
        if(verificaTarjeta() && verificaFecha() && $_SESSION["1"] == "logged") {
            echo "Tarjeta correcta";
        }
        else {
            echo "<script language='javascript'> alert('La tarjeta introducida es incorrecta'); </script>";
        }
    }
    else {
        echo "<script language='javascript'> alert('Primero debe iniciar sesión'); </script>";
    }
?>