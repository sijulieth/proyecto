<?php
include dirname(__FILE__) . '\..\modelo\Proyecto.php';
include dirname(__FILE__) . '\..\modelo\Mapeador.php';
include dirname(__FILE__) . '\..\dao\ProyectoDAO.php';

$documento = "";
if (array_key_exists('cod_proy', $_POST)) {
    $documento = $_POST['cod_proy'];
}

$personaDAO = new ProyectoDAO();
$persona = new Proyecto();
$persona = $personaDAO->leerPorDocumento($documento);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="shortcut icon" href="imagenes/upc.ico" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Proyecto</title>
        <style type="text/css">
            #form1 table {
                font-weight: bold;
                font-style: italic;
            }
            #form1 p {
                font-weight: bold;
                font-size: 24px;
                font-style: italic;
                color: #606;
            }
            #form1 table tr td label {
                color: #606;
            }
        </style>
    </head>

    <body>
        <form id="form1" name="form1" method="post" action="ctlProyecto.php">
            <input name="eliminar" type="hidden" value="eliminar"/>

            <p>ELIMINAR PROYECTO</p>
            <table width="471" border="0">
                <tr>
                    <td width="167" height="39"><label for="codProyecto">Codigo Proyecto</label></td>
                    <td width="294"><input type="text" name="proyecto[cod_proy]" id="codProyecto"  size="25" maxlength="25" readonly="yes" value="<?php echo $persona->getCodProy(); ?>" /></td>
                </tr>
                <tr>
                    <td height="65"><label>Tema</label></td>
                    <td><textarea name="proyecto[tema]" cols="35" rows="4" id="tema"><?php echo $persona->getTema(); ?></textarea></td>
                </tr>
                <tr>
                    <td height="61"><label for="linInvestigacion">Linea de Investigacion</label></td>
                    <td width="294"><input type="text" name="proyecto[lin_inves]" id="linInvestigacion"  size="25" maxlength="25" readonly="yes" value="<?php echo $persona->getLinInves(); ?>" /></td>
                </tr>
                <tr>
                    <td height="51">&nbsp;</td>
                    <td><input type="submit" name="guardar" id="eliminar" value="Eliminar" />
                    </td>
                </tr>
            </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
        </form>

    </body>
</html>
