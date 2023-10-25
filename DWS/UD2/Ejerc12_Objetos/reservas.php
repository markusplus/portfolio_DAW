<?php 
    class pasajero {
        public int $id;
        public ?string $name;
    
        public function __construct(?string $nombre, ?string $apellidos, int $edad, ?string $dni)
        {
            $result = 0;
            if((ctype_upper($nombre[0]) && ctype_lower(substr($nombre, 1))) && (ctype_upper($apellidos[0]) && ctype_lower(substr($apellidos, 1)))) {
                $this->nombre = $nombre;
                $this->apellidos = $apellidos;
            }
            else {
                $result = 1;
            }
            if($edad > 0 && $edad < 150) {
                $this->edad = $edad;
            }
            else {
                $result = -1;
            }
            $this->dni = $dni;
            return $result;
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
    <?php 
        if(isset($_POST["reservar_btn"])) {
            echo "Hola";
            if(isset($_POST["nombre_txt"])) {
                echo count($_POST["nombre_txt"]);
            }
        }
    ?>
</body>
</html>