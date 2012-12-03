<?php
require_once 'dao/AdministradorDAO.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="imagenes/upc.ico" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>ADMINISTRADORES</title>
        <script type="text/javascript">
            function agregar(obj){
                var frm = obj.form;
                frm.action = 'paginas/addAdministrador.html';
                frm.submit();
            }
        </script>
        <style type="text/css">
            .administradorcolor {
                color: #360;
            }
            .administradornegrita {
                font-weight: bold;
            }
            .administradorcursiva {
                font-style: italic;
            }
            .administradorcolor {
                color: #360;
            }
            .administradornegrita {
                font-style: italic;
                font-weight: bold;
                color: #360;
            }
            .administradorcursiva {
                font-style: italic;
                font-weight: bold;
                color: #360;
            }
            .administadorcursiva {
                font-weight: bold;
                font-style: italic;
                color: #360;
            }
            .administradornegrita {
                font-weight: bold;
                font-style: italic;
            }
        </style>
    </head>
    <body>
        <?php
        $pdao = new AdministradorDAO();
        $administradores = $pdao->leerTodos();
        ?>
        <form name="form1" method="post" action="">
            <table width="300" border="1" cellspacing="1" cellpadding="1">
                <caption class="administradorcursiva">
                    <span class="administradornegrita">ADMINISTRADORES </span>
                </caption>
                <tr>
                    <th width="34" align="center" scope="col">&nbsp;</th>
                    <th class="administradorcursiva" >Codigo</th>
                    <th class="administadorcursiva" >Identificacion</th>


                </tr>
                <?php
                if (!empty($administradores)) {
                    foreach ($administradores as $administrador) {
                        ?>
                        <tr>

                            <td width="34" align="center"><input type="radio" name="radio" id="radio" value="<?php echo $administrador['cod_adm']; ?>"></td>
                            <td width="40" scope="col"><?php echo $administrador['cod_adm']; ?></td>
                            <td width="40" scope="col"><?php echo $administrador['persona_id_pers']; ?></td>

                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="3" align="center" class="administradornegrita">No existen proyectos en este momento.</td>
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
