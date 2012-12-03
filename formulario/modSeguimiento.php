<?php
include dirname(__FILE__) . '\..\modelo\Seguimiento.php';
include dirname(__FILE__) . '\..\modelo\Mapeador.php';
include dirname(__FILE__) . '\..\dao\SeguimientoDAO.php';

$id_pers = "";
if (array_key_exists('cod_seg', $_POST)) {
    $id_pers = $_POST['cod_seg'];
}

$personaDAO = new SeguimientoDAO();
$persona = new Seguimiento();
$persona = $personaDAO->leerPorDocumento($id_pers);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="shortcut icon" href="imagenes/upc.ico" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Nuevo Seguimiento</title>
        <style type="text/css">
            #form1 table tr td {
                font-size: medium;
                color: #903;
            }
            #form1 table {
                font-style: italic;
                font-weight: bold;
            }
            #form1 p {
                font-size: 24px;
                font-weight: bold;
                font-style: italic;
                color: #903;
            }
        </style>
    </head>

    <body>
        <form id="form1" name="form1" method="post" action="ctlSeguimiento.php">
            <input name="modificar" type="hidden" value="1"/>
            <p>MODIFICAR SEGUIMIENTO</p>
            <table width="515" border="0">
                <tr>
                    <td width="171" bgcolor="#FFFFFF"><label for="codSeg">Codigo Seguimiento</label></td>
                    <td width="334"><input type="text" name="seguimiento[cod_seg]" id="codSeg"  readonly="yes" value="<?php echo $persona->getCodSeg(); ?>"/></td>
                </tr>
                <tr>
                    <td bgcolor="#FFFFFF"><label for="proyectoCodProy">Codigo de Proyecto</label></td>
                    <td><input type="text" name="seguimiento[proyecto_cod_proy]" id="proyectoCodProy"  readonly="yes" value="<?php echo $persona->getProyectoCodProy(); ?>"/></td>
                </tr>
                <tr>
                    <td bgcolor="#FFFFFF"><label for="fechaInicial">Fecha Inicial</label></td>
                    <td><input placeholder="aaa-mm-dd" type="text" name="seguimiento[fecha_inicial]" id="fechaInicial" value="<?php echo $persona->getFechaInicial(); ?>"/></td>
                </tr>
                <tr>
                    <td bgcolor="#FFFFFF"><label for="fechaFinal">Fecha Final</label></td>
                    <td><input placeholder="aaa-mm-dd" type="text" name="seguimiento[fecha_final]" id="fechaFinal" value="<?php echo $persona->getFechaFinal(); ?>" /></td>
                </tr>
                <tr>
                    <td bgcolor="#FFFFFF"><label for="fechaLimite">Fecha Limite</label></td>
                    <td><input placeholder="aaa-mm-dd" type="text" name="seguimiento[fecha_limite]" id="fechaLimite" value="<?php echo $persona->getFechaLimite(); ?>"/></td>
                </tr>
                <tr>
                    <td height="91" bgcolor="#FFFFFF"><label for="observaciones">Observaciones</label></td>
                    <td><textarea name="seguimiento[observaciones]" cols="35" rows="4" id="observaciones2"><?php echo $persona->getObservaciones(); ?></textarea></td>
                </tr>
                <tr>
                    <td bgcolor="#FFFFFF"><label for="etapa">Etapa</label></td>
                    <td><label for="etapa"></label>
                        <select  id="etapa" name="seguimiento[etapa]" value="<?php echo $persona->getEtapa(); ?>">
                            <option selected="selected">Propuesta</option>
                            <option>Anteproyecto</option>
                            <option>Proyecto</option>
                        </select></td>
                </tr>
                <tr>
                    <td bgcolor="#FFFFFF"><label for="estado">Estado</label></td>
                    <td><label for="estado"></label>
                        <select name="seguimiento[estado]" id="estado" ><?php echo $persona->getEstado(); ?>
                            <option>Pendiente</option>
                            <option>En revision</option>
                            <option>Aprobado</option>
                            <option>No aprobado</option>
                        </select></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="guardar" id="guardar" value="Guardar" /></td>
                </tr>
            </table> 
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
        </form>

    </body>
</html>