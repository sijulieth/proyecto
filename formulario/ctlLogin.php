<?php
include dirname(__FILE__) . '\..\modelo\Persona.php';
include dirname(__FILE__) . '\..\modelo\Mapeador.php';
include dirname(__FILE__) . '\..\dao\PersonaDAO.php';
$mensaje = "";
session_start();
if (array_key_exists("usuario", $_POST)) {
    $usuarioP = $_POST['usuario'];
    $usuario = new Persona();
    $usuario->setUsuario($usuarioP);
    $userDAO = new PersonaDAO();
    $usuario = $userDAO->leerPorUsuario($usuarioP);
    if($usuario == null){
        $mensaje="Usuario/Clave no encontrados";
    }else{
        $_SESSION['usuario'] = $usuario->getUsuario();
        $_SESSION['nombre'] = $usuario->getNombre();
        header('Location: home.php');
        die();
    }
}
?>
