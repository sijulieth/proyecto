<?php
    include dirname(__FILE__). '\..\modelo\Estudiante.php';
    include dirname(__FILE__). '\..\modelo\Mapeador.php';
    include dirname(__FILE__). '\..\dao\EstudianteDAO.php';
    
    $documento = "";
    if(array_key_exists('cod_est', $_POST)){
        $documento = $_POST['cod_est'];
    }
    
    $personaDAO = new EstudianteDAO();
    $persona = new Estudiante();
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
}
#form1 p {
	font-weight: bold;
	font-size: 24px;
	font-style: italic;
}
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="ctlEstudiante.php">
        <input name="eliminar" type="hidden" value="eliminar"/>
    
 <p>ESTUDIANTE</p>
 <table width="417" border="0">
    <tr>
      <td width="127"><label for="codEstudiante">Codigo</label></td>
      <td width="276"><input type="text" name="estudiante[cod_est]" id="codEstudiante" value="<?php echo $persona->getCodEst();?>"  /></td>
    </tr>
    <tr>
      <td><label for="idEstudiante">Identificacion</label></td>
      <td><input type="text" name="estudiante[persona_id_pers]" id="idEstudiante" value="<?php echo $persona->getPersonaIdPers();?>"  /></td>
    </tr>
    <tr>
      <td><label for="codProyecto">Codigo Proyecto</label></td>
      <td><input type="text" name="estudiante[proyecto_cod_proy]" id="codProyecto" value="<?php echo $persona->getProyectoCodProy();?>"  /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="guardar" id="eliminar" value="Eliminar" />
      </td></tr>
  </table>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
</form>

</body>
</html>
