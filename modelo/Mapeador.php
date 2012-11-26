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
    
public static function mapearSeguimiento(Seguimiento $seguimiento, array $datos){
        
        if(array_key_exists('cod_seg', $datos)){
            $seguimiento->setCodSeg($datos['cod_seg']);
        }
        if(array_key_exists('proyecto_cod_proy', $datos)){
            $seguimiento->setProyectoCodProy($datos['proyecto_cod_proy']);
        }
        if(array_key_exists('fecha_inicial', $datos)){
            $seguimiento->setFechaInicial($datos['fecha_inicial']);
        }
        if(array_key_exists('fecha_final', $datos)){
            $seguimiento->setFechaFinal($datos['fecha_final']);
        }
        if(array_key_exists('fecha_limite', $datos)){
            $seguimiento->setFechaLimite($datos['fecha_limite']);
        }
        if(array_key_exists('observaciones', $datos)){
            $seguimiento->setObservaciones($datos['observaciones']);
        }
        if(array_key_exists('etapa', $datos)){
            $seguimiento->setEtapa($datos['etapa']);
        }
        if(array_key_exists('estado', $datos)){
            $seguimiento->setEstado($datos['estado']);
        }
               
    }
        
    public static function mapearEstudiante(Estudiante $estudiante, array $datos){
        
        if(array_key_exists('cod_est', $datos)){
            $estudiante->setCodEst($datos['cod_est']);
        }
        if(array_key_exists('persona_id_pers', $datos)){
            $estudiante->setPersonaIdPers($datos['persona_id_pers']);
        }
        if(array_key_exists('proyecto_cod_proy', $datos)){
            $estudiante->setProyectoCodProy($datos['proyecto_cod_proy']);
        }
               
    }
    
    public static function mapearProyecto(Proyecto $proyecto, array $datos){
        
        if(array_key_exists('cod_proy', $datos)){
            $proyecto->setCodProy($datos['cod_proy']);
        }
        if(array_key_exists('tema', $datos)){
            $proyecto->setTema($datos['tema']);
        }
        if(array_key_exists('lin_inves', $datos)){
            $proyecto->setLinInves($datos['lin_inves']);
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
        
        if(array_key_exists('cod_dir', $datos)){
            $director->setCodDir($datos['cod_dir']);
        }
        if(array_key_exists('persona_id_pers', $datos)){
            $director->setPersonaIdPers($datos['persona_id_pers']);
        }
        if(array_key_exists('cod_proy', $datos)){
            $director->setCodProy($datos['cod_proy']);
        }
        
    }

public static function mapearJurado(Jurado $jurado, array $datos){
        
        if(array_key_exists('cod_jura', $datos)){
            $jurado->setCodJura($datos['cod_jura']);
        }
        if(array_key_exists('persona_id_pers', $datos)){
            $jurado->setIdPers($datos['persona_id_pers']);
        }
        if(array_key_exists('cod_proy', $datos)){
            $jurado->setCodProy($datos['cod_proy']);
        }
        
    }    
    
}
?>
