<?php

final class Mapeador {
    public static function mapearPersona(Persona $persona, array $datos){
        
        if(array_key_exists('id_pers', $datos)){
            $persona->setId_pers($datos['id_pers']);
        }
        if(array_key_exists('nombre', $datos)){
            $persona->setNombre($datos['nombre']);
        }
        if(array_key_exists('apellido', $datos)){
            $persona->setApellido($datos['apellido']);
        }
        if(array_key_exists('telefono', $datos)){
            $persona->setTelefono($datos['telefono']);
        }
        if(array_key_exists('direccion', $datos)){
            $persona->setDireccion($datos['direccion']);
        }
        if(array_key_exists('email', $datos)){
            $persona->setEmail($datos['email']);
        }
        if(array_key_exists('fecha', $datos)){
            $persona->setFecha($datos['fecha']);
        }
        if(array_key_exists('persona', $datos)){
            $persona->setPersona($datos['persona']);
        }
        if(array_key_exists('usuario', $datos)){
            $persona->setUsuario($datos['usuario']);
        }
        if(array_key_exists('contrasena', $datos)){
            $persona->setContrasena($datos['contrasena']);
        }
        
    }
    
    public static function mapearEstudiante(Estudiante $estudiante, array $dato){
        
        if(array_key_exists('codEst', $dato)){
            $estudiante->setCodEst($dato['codEst']);
        }
        if(array_key_exists('personaIdPers', $dato)){
            $estudiante->setPersonaIdPers($dato['personaIdPers']);
        }
        if(array_key_exists('proyectoCodProy', $dato)){
            $estudiante->setProyectoCodProy($dato['proyectoCodProy']);
        }
               
    }
    
    public static function mapearProyecto(Proyecto $proyecto, array $datos){
        
        if(array_key_exists('codProy', $datos)){
            $proyecto->setDocumento($datos['documento']);
        }
        if(array_key_exists('tema', $datos)){
            $proyecto->setNombre($datos['tema']);
        }
        if(array_key_exists('linInves', $datos)){
            $proyecto->setApellidos($datos['linInves']);
        }
        
    }
    
    public static function mapearAdministrador(Administrador $administrador, array $datos){
        
        if(array_key_exists('codEst', $datos)){
            $administrador->setDocumento($datos['codEst']);
        }
        if(array_key_exists('personaIdPers', $datos)){
            $administrador->setNombre($datos['personaIdPers']);
        }
        
    }
    
    public static function mapearDirector(Director $director, array $datos){
        
        if(array_key_exists('codDir', $datos)){
            $director->setCodDir($datos['codDir']);
        }
        if(array_key_exists('personaIdPers', $datos)){
            $director->setPersonaIdPers($datos['personaIdPers']);
        }
        if(array_key_exists('codProy', $datos)){
            $director->setCodProy($datos['codProy']);
        }
        
    }

    
    
}
?>
