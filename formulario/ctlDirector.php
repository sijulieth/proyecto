    <?php

include_once dirname(__FILE__). '\..\modelo\Director.php';
include_once dirname(__FILE__). '\..\modelo\Mapeador.php';
include_once dirname(__FILE__). '\..\dao\DirectorDAO.php';

$director = new Director();

$mensaje = "";

$datos = array(
    'codDir' => $_POST['director']['cod_dir'], 
    'personaIdPers' => $_POST['director']['id_dir'],
    'codProy' => $_POST['director']['cod_proy']
 );

Mapeador::mapearDirector($director, $datos);

$directorDAO = new DirectorDAO();

try {
    if (array_key_exists("agregar", $_POST)) {
        $retorno = $directorDAO->insertarDirector($director);
    } elseif (array_key_exists("modificar", $_POST)) {
        $retorno = $directorDAO->actualizarDirector($director);
    } elseif (array_key_exists("eliminar", $_POST)) {
        $retorno = $directorDAO->eliminarDirector($director);
    }
} catch (Exception $ex) {
    $mensaje = "HA OCURRIDO UN ERROR!!!: " . $ex->getMessage();
}

echo $mensaje . "<p/><a href='../indexDirector.php'>Regresar al inicio</a>";

?>