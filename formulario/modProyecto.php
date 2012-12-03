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
            color {
                color: #903;
            }
            negrita {
                font-weight: bold;
            }
            cursiva {
                font-style: italic;
            }
            #form3 p {
                color: #903;
                font-weight: bold;
                font-style: italic;
            }
            #form3 table tr td label {
                color: #903;
                font-weight: bold;
                font-style: italic;
            }
        </style>
    </head>

    <body>
        <form id="form3" name="form3" method="post" action="ctlProyecto.php">
            <input name="modificar" type="hidden" value="1"/>

            <p>MODIFICAR PROYECTO</p>
            <table width="471" border="0">
                <tr>
                    <td ><label>Codigo Proyecto</label></td>
                    <td><input type="text" name="proyecto[cod_proy]" id="codProyecto"  size="38" maxlength="25" readonly="yes" value="<?php echo $persona->getCodProy(); ?>" /></td>
                </tr>
                <tr>
                    <td height="65"><label>Tema</label></td>
                    <td><textarea name="proyecto[tema]" cols="35" rows="4" id="tema"><?php echo $persona->getTema(); ?></textarea></td>

                </tr>
                <tr>
                    <td><label>Linea de Investigacion</label></td>
                    <td><p>
                            <label for="linInvestigacion2"></label>
                            <select name="proyecto[lin_inves]" id="linInvestigacion2"  value="<?php echo $persona->getLinInves(); ?>">
                                <option>Ingenieria de software</option>
                                <option>Informatica educativa</option>
                                <option>Auditoria de sistemas y seguridad</option>
                                <option>Redes y telematica</option>
                                <option>Inteligencia artificial</option>
                            </select>
                        </p></td></tr>
                <tr>
                    <td height="51">&nbsp;</td>
                    <td><input type="submit" name="guardar" id="guardar" value="Guardar" />
                    </td>
                </tr>
            </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
        </form>
    </body>
</html>
