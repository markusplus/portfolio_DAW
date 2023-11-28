<?php
    function generar($tam) {
        $indice = "1234567890aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ";
        $result = "";
        $aux = "";
        if ($tam >= 8 && $tam <= 12) {
            while (strlen($result) < $tam) { 
                $random = rand(0, strlen($indice) - 1);
                if(strlen($result) > 0) {
                    if($result[strlen($result)-1] != $indice[$random]) {
                        $aux .= $indice[$random];
                        if (substr_count($aux, $indice[$random]) <= 2) {
                            $result .= $indice[$random];
                        }
                    }
                }
                else {
                    $aux .= $indice[$random];
                    if (substr_count($aux, $indice[$random]) <= 2) {
                        $result .= $indice[$random];
                    }
                }
            }
            return $result;
        }
        else {
            return "";
        }
    }
?>