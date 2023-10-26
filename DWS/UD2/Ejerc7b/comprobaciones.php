<?php
    $dni = "47477809J";
    function compruebaDNI($dni) {
        $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        $numeros = intval(substr($dni, 0, 8));
        $letra = substr($dni, 8);
        $result = $numeros % 23;
        if (strlen($dni) == 9) {
            if ($letra == $letras[$result]) {
                return 1;
            }
            else {
                return 0;
            }
        }
        else {
            return -1;
        }
    }
?>