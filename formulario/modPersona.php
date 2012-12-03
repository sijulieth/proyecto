<?php
    include dirname(__FILE__). '\..\modelo\Persona.php';
    include dirname(__FILE__). '\..\modelo\Mapeador.php';
    include dirname(__FILE__). '\..\dao\PersonaDAO.php';
    
    $id_pers = "";
    if(array_key_exists('id_pers', $_POST)){
        $id_pers = $_POST['id_pers'];
    }
    
    $personaDAO = new PersonaDAO();
    $persona = new Persona();
    $persona = $personaDAO->leerPorDocumento($id_pers);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nueva Persona</title>
<style type="text/css">
#form1 table {
	font-weight: bold;
	font-style: italic;
}
#form1 p {
	font-weight: bold;
	font-size: 24px;
	font-style: italic;
}
#form2 p {
	color: #903;
	font-weight: bold;
	font-style: italic;
}
#form2 table tr td label {
	color: #903;
	font-weight: bold;
	font-style: italic;
}
</style>
</head>

<body>
<form id="form2" name="form2" method="post" action="ctlPersona.php">
        <input name="modificar" type="hidden" value="1"/>
    
 <p>NUEVA PERSONA</p>
 <table width="417" border="0">
    <tr>
      <td><label>Cedula</label></td>
      <td><input name="persona[id_pers]" type="text" id="idPersona" size="25" maxlength="25" readonly="yes" value="<?php echo $persona->getId_pers();?>"  /></td>
    </tr>
    <tr>
      <td><label>Nombre</label></td>
      <td><input name="persona[nombre]" type="text" id="nombre" size="25" maxlength="25"  value="<?php echo $persona->getNombre();?>"  /></td>
    </tr>
    <tr>
      <td><label>Apellido</label></td>
      <td><input name="persona[apellido]" type="text" id="apellido" size="25" maxlength="25" value="<?php echo $persona->getApellido();?>" /></td>
    </tr>
    <tr>
      <td><label>Telefono</label></td>
      <td><input name="persona[telefono]" type="text" id="telefono" size="25" maxlength="25" value="<?php echo $persona->getTelefono();?>" /></td>
    </tr>
    <tr>
      <td><label>Direccion</label></td>
      <td><input name="persona[direccion]" type="text" id="direccion" size="40" maxlength="40" value="<?php echo $persona->getDireccion();?>" /></td>
    </tr>
    <tr>
      <td><label></label>
        <label for="email">E-mail</label></td>
        <td><input name="persona[email]" type="text" id="email" size="40" maxlength="40" value="<?php echo $persona->getEmail();?>"/></td>
    </tr>
    <tr>
      <td><label>Fecha</label></td>
      <td><input type="text" name="persona[fecha]" id="fecha" value="<?php echo $persona->getFecha();?>"/></td>
    </tr>
    <tr>
      <td><label>Persona</label></td>
      <td><input type="text" name="persona[persona]" id="persona" value="<?php echo $persona->getPersona();?>"/></td>
    </tr>
    <tr>
      <td>Usuario</td>
      <td><input type="text" name="persona[usuario]" id="usuario" value="<?php echo $persona->getUsuario();?>"/></td>
    </tr>
    <tr>
      <td><label for="contraseña">Contraseña</label></td>
      <td><input type="text" name="persona[contrasena]" id="contrasena" value="<?php echo $persona->getContrasena();?>"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="31">&nbsp;</td>
      <td><input type="submit" name="guardar" id="guardar" value="Guardar" /></td>
    </tr>
    <tr>
      <td height="31">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
</form>
</body>
</html>
