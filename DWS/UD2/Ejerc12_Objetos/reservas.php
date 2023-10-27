<?php 
    class pasajero {
        private ?string $nombre;
        private ?string $apellidos;
        private int $edad;
        private ?string $dni;
    
        public function __construct(?string $nombre, ?string $apellidos, int $edad)
        {
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->edad = $edad;
        }
        public function setDNI(?string $dni)
        {
            $this->dni = $dni;
        }
        public function toString() {
            $result = "Nombre: $this->nombre;Apellidos: $this->apellidos;Edad: $this->edad";
            if(isset($this->dni)) {
                $result .= ";DNI: $this->dni";
            }
            $result .= "\n";
            return $result;
        }
    }
    function compruebaNombre($nombre) {
        if(ctype_upper($nombre[0]) && ctype_lower(substr($nombre, 1))) {
            return true;
        }
        else {
            return false;
        }
    }
    function compruebaApellidos($apellidos) {
        if($apellidos[strpos($apellidos, " ")+2] != null) {
            if((ctype_upper($apellidos[0]) && ctype_lower(substr($apellidos, 1, strpos($apellidos, " ")-1))) && (ctype_upper($apellidos[strpos($apellidos, " ")+1]) && ctype_lower(substr($apellidos, strpos($apellidos, " ")+2)))) {
                return true;
            }
            else {
                return false;
            }
        }
    }
    function compruebaEdad($edad) {
        if($edad > 0 && $edad < 150) {
            return true;
        }
        else {
            return false;
        }
    }
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
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <form name="form3" id="form3" method="get" action="informacion.php" style="visibility:hidden">
        <label id="texto_success"></label><br><br>
        <input type="submit" value="Mostrar datos reserva" name="mostrar_btn">
    </form>
    <?php 
        if(isset($_POST["reservar_btn"])) {
            $pasajeros = array();
            $numPasajeros = $_COOKIE["numPasajeros"];
            for ($i=0; $i < $numPasajeros; $i++) { 
                $nombre = "";
                $apellidos ="";
                $edad = 0;
                $dni = "";
                $auxDni = 0;
                if(isset($_POST["nombre_txt$i"])) {
                    if(compruebaNombre($_POST["nombre_txt$i"])) {
                        $nombre = $_POST["nombre_txt$i"];
                        if(isset($_POST["apellidos_txt$i"])) {
                            if(compruebaApellidos($_POST["apellidos_txt$i"])) {
                                $apellidos = $_POST["apellidos_txt$i"];
                                if(isset($_POST["edad_num$i"])) {
                                    if(compruebaEdad($_POST["edad_num$i"])) {
                                        $edad = $_POST["edad_num$i"];
                                        if($edad >= 14) {
                                            if(isset($_POST["dni_txt$i"])) {
                                                $auxDni = compruebaDNI($_POST["dni_txt$i"]);
                                                $dni = $_POST["dni_txt$i"];
                                                if($auxDni == 1) {
                                                    $aux = new pasajero($nombre, $apellidos, $edad);
                                                    $aux->setDNI($dni);
                                                    array_push($pasajeros, $aux);
                                                    if($i == $numPasajeros - 1) {
                                                        echo "<script>document.getElementById('texto_success').innerHTML = 'Las reservas han sido realizadas para los pasajeros indicados'</script>";
                                                        echo "<script>document.getElementById('form3').style.visibility = 'visible'</script>";
                                                        session_start();
                                                        $_SESSION["pasajeros"]=$pasajeros;
                                                    }
                                                }
                                                elseif($auxDni == 0) {
                                                    echo "El DNI introducido no es correcto en el pasajero $i";
                                                    break;
                                                }
                                                else {
                                                    echo "El DNI introducido tiene un tamaño incorrecto en el pasajero $i";
                                                    break;
                                                }
                                            }
                                        }
                                        else {
                                            $aux = new pasajero($nombre, $apellidos, $edad);
                                            array_push($pasajeros, $aux);
                                            if($i == $numPasajeros - 1) {
                                                echo "<script>document.getElementById('texto_success').innerHTML = 'Las reservas han sido realizadas para los pasajeros indicados'</script>";
                                                echo "<script>document.getElementById('form3').style.visibility = 'visible'</script>";
                                                session_start();
                                                $_SESSION["pasajeros"]=$pasajeros;
                                            }
                                        }
                                    }
                                    else {
                                        echo "La edad introducida no es correcta en el pasajero $i";
                                        break;
                                    }
                                }
                            }
                            else {
                                echo "Los apellidos introducidos no están en el formato correcto en el pasajero $i";
                                break;
                            }
                        }
                    }
                    else {
                        echo "El nombre introducido no está en el formato correcto en el pasajero $i";
                        echo "<script>document.getElementById(\$nombre$i).style.color='red'</script";
                        break;
                    }
                }
            }
            
        }
    ?>
</body>
</html>