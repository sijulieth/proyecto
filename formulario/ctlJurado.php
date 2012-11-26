<?php

require_once  dirname(__FILE__). '\..\modelo\Jurado.php';
require_once dirname(__FILE__). '\..\modelo\Mapeador.php';
require_once dirname(__FILE__). '\..\dao\JuradoDAO.php';

$persona = new Jurado();

$mensaje = "";

$datos = array(
    'cod_jura' => $_POST['jurado']['cod_jura'], 
    'persona_id_pers' => $_POST['jurado']['persona_id_pers'],
    'cod_proy' => $_POST['jurado']['cod_proy']
    
);

Mapeador::mapearJurado($persona, $datos);

$personaDAO = new JuradoDAO();

try {
    if (array_key_exists("agregar", $_POST)) {
        $retorno = $personaDAO->insertarJurado($persona);
    } elseif (array_key_exists("modificar", $_POST)) {
        $retorno = $personaDAO->actualizarJurado($persona);
    } elseif (array_key_exists("eliminar", $_POST)) {
        $retorno = $personaDAO->eliminarJurado($persona);
    }
} catch (Exception $ex) {
    $mensaje = "HA OCURRIDO UN ERROR!!!: " . $ex->getMessage();
}

echo $mensaje . "<p/><a href='../indexJurado.php'>Regresar al inicio</a>";

?>