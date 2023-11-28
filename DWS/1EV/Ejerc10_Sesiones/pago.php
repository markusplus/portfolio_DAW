<?php
	$vectorUsuarios = array("Usuario1"=>"U1","Usuario2"=>"U2","Usuario3"=>"U3");
  //$vectorContrasenas = array("Usuario1"=>"contra1","Usuario2"=>"contra2","Usuario3"=>"contra3");
  $usuario = null;
  $contrasena = null;
  if(isset($_POST["Submit"])) {
      if(isset($_POST["nombre"]) && $_POST["nombre"] !== "") {
        if(isset($vectorUsuarios[$_POST["nombre"]]) && $vectorUsuarios[$_POST["nombre"]] !== null) {
          $usuario = $_POST["nombre"];
        }
        else {
          echo "<script language='javascript'> alert('El usuario no es correcto'); </script>";
        }
      }
      else {
        echo "<script language='javascript'> alert('Debes introducir el nombre'); </script>";
      }
      if(isset($_POST["pwd"]) && $_POST["pwd"] !== "") {
        if(array_search($_POST["pwd"], $vectorUsuarios) == $_POST["nombre"]) {
          $contrasena = $_POST["pwd"];
          session_start();
          $_SESSION["usuario"]=1;
        }
        else {
          $_SESSION["usuario"]=0;
          echo "<script language='javascript'> alert('Contraseña incorrecta'); </script>";
        }
      }
      else {
        echo "<script language='javascript'> alert('Debes introducir la contraseña'); </script>";
      }
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<h1>Datos de la tarjeta de cr&eacute;dito</h1>
<form id="form1" name="form1" method="post" action="comprobar.php">
  <table width="37%" border="0" cellspacing="1">
    <tr>
      <th width="32%" scope="row">N&uacute;mero de tarjeta </th>
      <td width="68%"><label>
        <input name="numero" type="text" size="45" />
      </label></td>
    </tr>
    <tr>
      <th scope="row">Fecha de caducidad </th>
      <td>
        <input name="mes" type="text" size="3" />
      <strong>      / </strong>
      <input name="año" type="text" size="4" />
     </td>
    </tr>
  </table>
  <p>
 
    <input type="submit" name="Submit" value="Enviar" />
  
    <input type="reset" name="Submit2" value="Borrar" />
  
  </p>
</form>
<p>&nbsp;</p>
<p>&nbsp; </p>
</body>
</html>