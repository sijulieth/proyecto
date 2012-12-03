<?php
    include dirname(__FILE__). '\..\modelo\Jurado.php';
    include dirname(__FILE__). '\..\modelo\Mapeador.php';
    include dirname(__FILE__). '\..\dao\JuradoDAO.php';
    
    $documento = "";
    if(array_key_exists('cod_jura', $_POST)){
        $documento = $_POST['cod_jura'];
    }
    
    $personaDAO = new JuradoDAO();
    $persona = new Jurado();
    $persona = $personaDAO->leerPorDocumento($documento);
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
	color: #606;
}
#form1 p {
	font-weight: bold;
	font-size: 24px;
	font-style: italic;
	color: #606;
}
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="ctlJurado.php">
        <input name="eliminar" type="hidden" value="eliminar"/>
    
 <p>ELIMINAR JURADO</p>
  <table width="454" border="0">
    <tr>
      <td width="121"><label for="codJurado">Codigo Jurado</label></td>
      <td width="323"><input type="text" name="jurado[cod_jura]" id="codJurado" size="25" maxlength="25" readonly="yes" value="<?php echo $persona->getCodJura();?>" /></td>
    </tr>
    <tr>
      <td><label for="idJurado">Identificacion</label></td>
      <td><input type="text" name="jurado[persona_id_pers]" id="idJurado" size="25" maxlength="25" readonly="yes" value="<?php echo $persona->getIdPers();?>"  /></td>
    </tr>
    <tr>
      <td><label for="codProyecto">Codigo Proyecto</label></td>
      <td><input type="text" name="jurado[cod_proy]" id="codProyecto" size="25" maxlength="25" readonly="yes" value="<?php echo $persona->getCodProy();?>"  /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="eliminar" id="eliminar" value="Eliminar" />
        </td>
    </tr>
  </table>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
</form>

</body>
</html>
