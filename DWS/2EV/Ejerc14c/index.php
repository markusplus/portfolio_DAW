<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <form name="inicio_sesion_form" method="post" action="menu.php">
        <label>Introduzca un usuario y contraseña válidos para acceder al sistema:</label><br><br>
        <label>Usuario: </label>
        <input type="text" name="usuario_txt" placeholder="Mar"><br><br>
        <label>Contraseña: </label>
        <input type="password" name="contrasena_psw" placeholder="mar">
        <input type="submit" name="submit_btn" value="Login">
    </form>
</body>
</html>