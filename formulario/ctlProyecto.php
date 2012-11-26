<?php

require_once  dirname(__FILE__). '\..\modelo\Proyecto.php';
require_once dirname(__FILE__). '\..\modelo\Mapeador.php';
require_once dirname(__FILE__). '\..\dao\ProyectoDAO.php';

$persona = new Proyecto();

$mensaje = "";

$datos = array(
    'cod_proy' => $_POST['proyecto']['cod_proy'], 
    'tema' => $_POST['proyecto']['tema'],
    'lin_inves' => $_POST['proyecto']['lin_inves']
    
);

Mapeador::mapearProyecto($persona, $datos);

$personaDAO = new ProyectoDAO();

try {
    if (array_key_exists("agregar", $_POST)) {
        $retorno = $personaDAO->insertarProyecto($persona);
    } elseif (array_key_exists("modificar", $_POST)) {
        $retorno = $personaDAO->actualizarProyecto($persona);
    } elseif (array_key_exists("eliminar", $_POST)) {
        $retorno = $personaDAO->eliminarProyecto($persona);
    }
} catch (Exception $ex) {
    $mensaje = "HA OCURRIDO UN ERROR!!!: " . $ex->getMessage();
}

echo $mensaje . "<p/><a href='../indexProyecto.php'>Regresar al inicio</a>";

?>