<?php
require_once 'dao/PersonaDAO.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>PERSONAS</title>
        <script type="text/javascript">
            function agregar(obj){
                var frm = obj.form;
                frm.action = 'formulario/Personas.html';
                frm.submit();
            }
            function modificar(obj) {
                var frm = obj.form;
                if (!hayOpcionChequeada(frm)) {
                    alert('Debe seleccionar una opcion');
                }else{
                    frm.action = 'formulario/modPersona.php';
                    frm.submit();
                }
            }
            
            function eliminar(obj) {
                var frm = obj.form;
                if (!hayOpcionChequeada(frm)) {
                    alert('Debe seleccionar una opcion');
                }else{
                    frm.action = 'formulario/eliPersonas.php';
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
$pdao = new PersonaDAO();
$personas = $pdao->leerTodos();
?>
        <form name="form1" method="post" action="">
            <table width="757" border="1" cellspacing="1" cellpadding="1">
                <caption>
                    PERSONAS
                </caption>
                <tr>
                    <th width="34" align="center" scope="col">&nbsp;</th>
                    <th >Identificacion</th>
                    <th >Nombre</th>
                    <th >Apellido</th>
                    <th >Telefono</th>
                    <th >Dirección</th>
                    <th >Email</th>
                    <th >Fecha</th>
                    <th >Persona</th>
                    <th >Usuario</th>
                    <th >Contraseña</th>
               </tr>
<?php
if (!empty($personas)) {
    foreach ($personas as $persona) {
        ?>
                        <tr>
                            
                            <td width="34" align="center"><input type="radio" name="id_pers" id="radio" value="<?php echo $persona['id_pers']; ?>"></td>
                            
                            <td width="139" scope="col"><?php echo $persona['id_pers']; ?></td>
                            <td width="135" scope="col"><?php echo $persona['nombre']; ?></td>
                            <td width="137" scope="col"><?php echo $persona['apellido']; ?></td>
                            <td width="131" scope="col"><?php echo $persona['telefono']; ?></td>
                            <td width="148" scope="col"><?php echo $persona['direccion']; ?></td>
                            <td width="148" scope="col"><?php echo $persona['email']; ?></td>
                            <td width="148" scope="col"><?php echo $persona['fecha']; ?></td>
                            <td width="148" scope="col"><?php echo $persona['persona']; ?></td>
                            <td width="148" scope="col"><?php echo $persona['usuario']; ?></td>
                            <td width="148" scope="col"><?php echo $persona['contrasena']; ?></td>
                        </tr>
                    <?php } } else { ?>
                    <tr>
                        <td colspan="11" align="center">No existen personas en este momento.</td>
                    </tr>
                <?php } ?>
            </table>
            <p>
                <input type="button" name="button" id="button" value="Agregar" onclick="agregar(this)">
                <input type="button" name="button2" id="button2" value="Modificar" onclick="modificar(this)">
                <input type="button" name="button3" id="button3" value="Eliminar"onclick="eliminar(this)">
            </p>
        </form>
    </body>
</html>
