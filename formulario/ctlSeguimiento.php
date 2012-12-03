<?php

require_once  dirname(__FILE__). '\..\modelo\Seguimiento.php';
require_once dirname(__FILE__). '\..\modelo\Mapeador.php';
require_once dirname(__FILE__). '\..\dao\SeguimientoDAO.php';

$persona = new Seguimiento();

$mensaje = "";

$datos = array(
    'cod_seg' => $_POST['seguimiento']['cod_seg'], 
    'proyecto_cod_proy' => $_POST['seguimiento']['proyecto_cod_proy'],
    'fecha_inicial' => $_POST['seguimiento']['fecha_inicial'],
    'fecha_final' => $_POST['seguimiento']['fecha_final'], 
    'fecha_limite' => $_POST['seguimiento']['fecha_limite'],
    'observaciones' => $_POST['seguimiento']['observaciones'],
    'etapa' => $_POST['seguimiento']['etapa'],
    'estado' => $_POST['seguimiento']['estado']    
    
);

Mapeador::mapearSeguimiento($persona, $datos);

$personaDAO = new SeguimientoDAO();

try {
    if (array_key_exists("agregar", $_POST)) {
        $retorno = $personaDAO->insertarSeguimiento($persona);
    } elseif (array_key_exists("modificar", $_POST)) {
        $retorno = $personaDAO->actualizarSeguimiento($persona);
    } elseif (array_key_exists("eliminar", $_POST)) {
        $retorno = $personaDAO->eliminarSeguimiento($persona);
    }
} catch (Exception $ex) {
    $mensaje = "HA OCURRIDO UN ERROR!!!: " . $ex->getMessage();
}

echo $mensaje . "<p/><a href='../indexSeguimiento.php'>Regresar al inicio</a>";

?>