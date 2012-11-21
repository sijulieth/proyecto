<?php

require_once  dirname(__FILE__). '\..\modelo\Estudiante.php';
require_once dirname(__FILE__). '\..\modelo\Mapeador.php';
require_once dirname(__FILE__). '\..\dao\EstudianteDAO.php';

$estudiante = new Estudiante();

$mensaje = "";

$datos = array(
    'codEst' => $_POST['estudiante']['cod_est'], 
    'personaIdPers' => $_POST['estudiante']['persona_id_pers'],
    'proyectoCodProy' => $_POST['estudiante']['proyecto_cod_proy']
    
);

Mapeador::mapearEstudiante($estudiante, $datos);

$estudianteDAO = new EstudianteDAO();

try {
    if (array_key_exists("agregar", $_POST)) {
        $retorno = $estudianteDAO->insertarEstudiante($estudiante);
    } elseif (array_key_exists("modificar", $_POST)) {
        $retorno = $estudianteDAO->actualizarEstudiante($estudiante);
    } elseif (array_key_exists("eliminar", $_POST)) {
        $retorno = $estudianteDAO->eliminarEstudiante($estudiante);
    }
} catch (Exception $ex) {
    $mensaje = "HA OCURRIDO UN ERROR!!!: " . $ex->getMessage();
}

echo $mensaje . "<p/><a href='../indexEstudiante.php'>Regresar al inicio</a>";

?>