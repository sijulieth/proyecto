<?php
require_once 'dao/JuradoDAO.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="imagenes/upc.ico" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JURADOS</title>
        <script type="text/javascript">
            function agregar(obj){
                var frm = obj.form;
                frm.action = 'formulario/Jurado.html';
                frm.submit();
            }
            
            function modificar(obj) {
                var frm = obj.form;
                if (!hayOpcionChequeada(frm)) {
                    alert('Debe seleccionar una opcion');
                }else{
                    frm.action = 'formulario/modJurado.php';
                    frm.submit();
                }
            }
            function eliminar(obj) {
                var frm = obj.form;
                if (!hayOpcionChequeada(frm)) {
                    alert('Debe seleccionar una opcion');
                }else{
                    frm.action = 'formulario/eliJurado.php';
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
            cursiva {
                font-style: italic;
            }
            cursiva {
                font-style: italic;
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
        $pdao = new JuradoDAO();
        $jurados = $pdao->leerTodos();
        ?>
        <form name="form1" method="post" action="">
            <table width="300" border="1" cellspacing="1" cellpadding="1">
                <caption class="color">
                    <span class="negrita">JURADOS </span>
                </caption>
                <tr>
                    <th width="34" align="center" scope="col">&nbsp;</th>
                    <th class="color" >Codigo</th>
                    <th class="color" >Identificacion</th>
                    <th class="color" >Codigo Proyecto</th>


                </tr>
                <?php
                if (!empty($jurados)) {
                    foreach ($jurados as $jurado) {
                        ?>
                        <tr>

                            <td width="34" align="center"><input type="radio" name="cod_jura" id="radio" value="<?php echo $jurado['cod_jura']; ?>"></td>
                            <td width="40" scope="col"><?php echo $jurado['cod_jura']; ?></td>
                            <td width="40" scope="col"><?php echo $jurado['persona_id_pers']; ?></td>
                            <td width="40" scope="col"><?php echo $jurado['cod_proy']; ?></td>

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
