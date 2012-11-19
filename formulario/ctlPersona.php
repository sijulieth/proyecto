<?php

require_once  dirname(__FILE__). '\..\modelo\Persona.php';
require_once dirname(__FILE__). '\..\modelo\Mapeador.php';
require_once dirname(__FILE__). '\..\dao\PersonaDAO.php';

$persona = new Persona();

$mensaje = "";

$datos = array(
    'id_pers' => $_POST['persona']['id_pers'], //ESTO NO VA
    'nombre' => $_POST['persona']['nombre'],
    'apellido' => $_POST['persona']['apellido'],
    'telefono' => $_POST['persona']['telefono'],
    'direccion' => $_POST['persona']['direccion'],
    'email' => $_POST['persona']['email'],
    'fecha' => $_POST['persona']['fecha'],
    'persona' => $_POST['persona']['persona'],
    'usuario' => $_POST['persona']['usuario'],
    'contrasena' => $_POST['persona']['contrasena']    
    
);

Mapeador::mapearPersona($persona, $datos);

$personaDAO = new PersonaDAO();

try {
    if (array_key_exists("agregar", $_POST)) {
        $retorno = $personaDAO->insertarPersona($persona);
    } elseif (array_key_exists("modificar", $_POST)) {
        $retorno = $personaDAO->actualizarPersona($persona);
    } elseif (array_key_exists("eliminar", $_POST)) {
        $retorno = $personaDAO->eliminarPersona($persona);
    }
} catch (Exception $ex) {
    $mensaje = "HA OCURRIDO UN ERROR!!!: " . $ex->getMessage();
}

echo $mensaje . "<p/><a href='../indexPersona.php'>Regresar al inicio</a>";

?>