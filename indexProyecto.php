<?php
require_once 'dao/ProyectoDAO.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>PROYECTOS</title>
        <script type="text/javascript">
            function agregar(obj){
                var frm = obj.form;
                frm.action = 'formulario/Proyecto.html';
                frm.submit();
            }
            
            function modificar(obj) {
                var frm = obj.form;
                if (!hayOpcionChequeada(frm)) {
                    alert('Debe seleccionar una opcion');
                }else{
                    frm.action = 'formulario/modProyecto.php';
                    frm.submit();
                }
            }
            
            function eliminar(obj) {
                var frm = obj.form;
                if (!hayOpcionChequeada(frm)) {
                    alert('Debe seleccionar una opcion');
                }else{
                    frm.action = 'formulario/eliProyecto.php';
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
    <style type="text/css">
    .color {
	color: #360;
}
    .negrita {
	font-weight: bold;
}
    .color .negrita {
	font-style: italic;
}
    .color {
	color: #360;
	font-weight: bold;
	font-style: italic;
}
    .color {
	color: #360;
}
    .color {
	color: #360;
}
    .color {
	color: #360;
}
    </style>
    </head>
    <body>
        <?php
        $pdao = new ProyectoDAO();
        $proyectos = $pdao->leerTodos();
        ?>
        <form name="form1" method="post" action="">
            <table width="757" border="1" cellspacing="1" cellpadding="1">
                <caption class="color">
                    <span class="negrita">PROYECTOS </span>
                </caption>
                <tr>
                  <th width="34" align="center" scope="col">&nbsp;</th>
                    <th class="color" >Codigo</th>
                    <th class="color" >Tema</th>
                    <th class="color" >Linea de Investigacion</th>

                </tr>
                <?php
                if (!empty($proyectos)) {
                    foreach ($proyectos as $proyecto) {
                        ?>
                        <tr>

                            <td width="34" align="center"><input type="radio" name="cod_proy" id="radio" value="<?php echo $proyecto['cod_proy']; ?>"></td>
                            <td width="139" scope="col"><?php echo $proyecto['cod_proy']; ?></td>
                            <td width="135" scope="col"><?php echo $proyecto['tema']; ?></td>
                            <td width="137" scope="col"><?php echo $proyecto['lin_inves']; ?></td>

                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="4" align="center" class="color">No existen proyectos en este momento.</td>
                    </tr>
<?php } ?>
            </table>
            <p>
                <input type="button" name="button" id="button" value="Agregar" onclick="agregar(this)">
                <input type="button" name="button2" id="button2" value="Modificar" onclick="modificar(this)">
                <input type="button" name="button3" id="button3" value="Eliminar" onclick="eliminar(this)">
            </p>
        </form>
    </body>
</html>
