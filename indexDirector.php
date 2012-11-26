<?php
require_once 'dao/DirectorDAO.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>DIRECTORES</title>
        <script type="text/javascript">
            function agregar(obj){
                var frm = obj.form;
                frm.action = 'formulario/Director.html';
                frm.submit();
            }
            
            
            function modificar(obj) {
                var frm = obj.form;
                if (!hayOpcionChequeada(frm)) {
                    alert('Debe seleccionar una opcion');
                }else{
                    frm.action = 'formulario/modDirector.php';
                    frm.submit();
                }
            }
            
            function eliminar(obj) {
                var frm = obj.form;
                if (!hayOpcionChequeada(frm)) {
                    alert('Debe seleccionar una opcion');
                }else{
                    frm.action = 'formulario/eliDirector.php';
                    frm.submit();
                }
            }
    

            function hayOpcionChequeada(frm) {
                arrObjs = frm.elements;
                for(i=0; i < arrObjs.length; i++){
                    if(arrObjs[i].type === 'radio' && arrObjs[i].checked === true){
                        return true;
                    }
                }
                return false;
            }
        </script>
    </head>
    <body>
<?php
$pdao = new DirectorDAO();
$directores = $pdao->leerTodos();
?>
        <form name="form1" method="post" action="">
            <table width="300" border="1" cellspacing="1" cellpadding="1">
                <caption>
                    DIRECTORES
                </caption>
                <tr>
                    <th width="34" align="center" scope="col">&nbsp;</th>
                    <th >Codigo</th>
                    <th >Identificacion</th>
                    <th >Codigo Proyecto</th>
                   
                    
               </tr>
<?php
if (!empty($directores)) {
    foreach ($directores as $director) {
        ?>
                        <tr>
                            
                            <td width="34" align="center"><input type="radio" name="cod_dir" id="radio" value="<?php echo $director['cod_dir']; ?>"></td>
                            <td width="40" scope="col"><?php echo $director['cod_dir']; ?></td>
                            <td width="40" scope="col"><?php echo $director['persona_id_pers']; ?></td>
                            <td width="40" scope="col"><?php echo $director['cod_proy']; ?></td>
                            
                        </tr>
                    <?php } } else { ?>
                    <tr>
                        <td colspan="4" align="center">No existen proyectos en este momento.</td>
                    </tr>
                <?php } ?>
            </table>
            <p>
                <input type="button" name="button" id="button" value="Agregar" onclick="agregar(this)">
                <input type="button" name="button2" id="button2" value="Modificar" onclick="modificar (this)">
                <input type="button" name="button3" id="button3" value="Eliminar" onclick="eliminar(this)">
            </p>
        </form>
    </body>
</html>
