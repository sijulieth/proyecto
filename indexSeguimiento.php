<?php
require_once 'dao/SeguimientoDAO.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SEGUIMIENTO</title>
        <script type="text/javascript">
            function agregar(obj){
                var frm = obj.form;
                frm.action = 'paginas/addSeguimiento.html';
                frm.submit();
            }
        </script>
    </head>
    <body>
<?php
$pdao = new SeguimientoDAO();
$seguimientos = $pdao->leerTodos();
?>
        <form name="form1" method="post" action="">
            <table width="400" border="1" cellspacing="1" cellpadding="1">
                <caption>
                    SEGUIMIENTO
                </caption>
                <tr>
                    <th width="757" align="center" scope="col">&nbsp;</th>
                    <th >Codigo</th>
                    <th >Codigo Proyecto</th>
                    <th >Fecha Inicial</th>
                    <th >Fecha Final</th>
                    <th >Fecha Limite</th>
                    <th >Observaciones</th>   
                    <th >Etapa</th>
                    <th >Estado</th>
                    
                    
               </tr>
<?php
if (!empty($seguimientos)) {
    foreach ($seguimientos as $seguimiento) {
        ?>
                        <tr>
                            
                            <td width="34" align="center"><input type="radio" name="radio" id="radio" value="<?php echo $seguimiento['cod_seg']; ?>"></td>
                            <td width="40" scope="col"><?php echo $seguimiento['cod_seg']; ?></td>
                            <td width="40" scope="col"><?php echo $seguimiento['proyecto_cod_proy']; ?></td>
                            <td width="150" scope="col"><?php echo $seguimiento['fecha_inicial']; ?></td>
                            <td width="150" scope="col"><?php echo $seguimiento['fecha_final']; ?></td>
                            <td width="150" scope="col"><?php echo $seguimiento['fecha_limite']; ?></td>
                            <td width="150" scope="col"><?php echo $seguimiento['observaciones']; ?></td>
                            <td width="150" scope="col"><?php echo $seguimiento['etapa']; ?></td>
                            <td width="150" scope="col"><?php echo $seguimiento['estado']; ?></td>
                            
                        </tr>
                    <?php } } else { ?>
                    <tr>
                        <td colspan="9" align="center">No existen proyectos en este momento.</td>
                    </tr>
                <?php } ?>
            </table>
            <p>
                <input type="button" name="button" id="button" value="Agregar" onclick="agregar(this)">
                <input type="button" name="button2" id="button2" value="Modificar">
                <input type="button" name="button3" id="button3" value="Eliminar">
            </p>
        </form>
    </body>
</html>
