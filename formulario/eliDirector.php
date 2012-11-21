<?php
    include dirname(__FILE__). '\..\modelo\Director.php';
    include dirname(__FILE__). '\..\modelo\Mapeador.php';
    include dirname(__FILE__). '\..\dao\DirectorDAO.php';
    
    $cod_dir = "";
    if(array_key_exists('cod_dir', $_POST)){
        $cod_dir = $_POST['cod_dir'];
    }
    
    $directorDAO = new DirectorDAO();
    $director = new Director();
    $director = $directorDAO->leerPorDocumento($cod_dir);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DIRECTOR</title>
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
<form id="form2" name="form1" method="post" action="ctlDirector.php">
        <input name="eliminar" type="hidden" value="1"/>
    
 <p>DIRECTOR</p>
 <table width="417" border="0">
    <tr>
      <td><label>Codigo Director</label></td>
      <td><input  name="director[cod_dir]" type="text" id="codDirector" size="25" maxlength="25" readonly="yes" value="<?php echo $director->getCodDir();?>" /></td>
    </tr>
    <tr>
      <td><label>Identificacion</label></td>
      <td><input  name="director[id_dir]" type="text" id="idDirector" size="25" maxlength="25" readonly="yes" value="<?php echo $director->getPersonaIdPers();?>"  /></td>
    </tr>
    <tr>
      <td><label>Codigo de Proyecto</label></td>
      <td><input  name="director[cod_proy]" type="text" id="codProyecto" size="25" maxlength="25" readonly="yes" value="<?php echo $director->getCodProy();?>"  /></td>
    </tr>    
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="31">&nbsp;</td>
      <td><input type="submit" name="eliminar" id="eliminar" value="Eliminar" /></td>
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

