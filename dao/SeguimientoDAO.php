<?php

//require_once "../configuracion/Configuracion.php";

include_once  dirname(__FILE__).'\..\configuracion\Configuracion.php';
include_once dirname(__FILE__).'\..\modelo\Seguimiento.php';
class SeguimientoDAO {

    private $db;

    const SQL_INSERTAR = 1;

    private function getDb() {
        if ($this->db !== null) {
            return $this->db;
        }
        try {
            $cfg = Configuracion::obtConfig("basedatos");
            $this->db = new PDO($cfg['dsn'], $cfg['user'], $cfg['password']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $this->db;
    }

     public function leerTodos() {
        $sql = "SELECT * FROM seguimiento";
        $sentencia = $this->getDb()->prepare($sql);
        $cursor = $sentencia->execute();
        if(!$cursor){
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        $filas = $sentencia->fetchAll();
        if(!$filas){
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $filas;
    
    }
    public function leerPorDocumento($cod_seg = '') {
        $sql = "SELECT * FROM seguimiento WHERE cod_seg =". $cod_seg;
        $sentencia = $this->getDb()->prepare($sql);
        $sentencia->execute();
        $filas = $sentencia->fetch();
        $persona = new Seguimiento();        
        Mapeador::mapearSeguimiento($persona, $filas);
        return $persona;
    }
    
     
    
    public function insertarSeguimiento(Seguimiento $persona) {
        $sql = "INSERT INTO `seguimiento` (`cod_seg`, `proyecto_cod_proy`, `fecha_inicial`, `fecha_final`, `fecha_limite`, `observaciones`, `etapa`, `estado`) VALUES ";
        $sql.=" (:cod_seg, :proyecto_cod_proy, :fecha_inicial, :fecha_final, :fecha_limite, :observaciones, :etapa, :estado, :contrasena) ";
        $resul = false;
        try {
            $resul = $this->ejecutarInserUpdate($sql, $persona);
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
        return $resul;
        
        }

    public function actualizarSeguimiento(Seguimiento $persona) {
        $sql = "UPDATE persona SET `cod_seg`=:cod_seg, `proyecto_cod_proy`=:proyecto_cod_proy, `fecha_inicial`=:fecha_inicial, `fecha_final`=:fecha_final, `fecha_limite`=:fecha_limite, `observaciones`=:observaciones, `etapa`=:etapa, `estado`=:estado";
        $sql.=" WHERE cod_seg = :cod_seg ";
        return $this->ejecutarInserUpdate($sql, $persona);
    }
    
    private function ejecutarInserUpdate($sql, Seguimiento $persona) {
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = $this->getParametros($persona);
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
    }

     public function eliminarSeguimiento(Seguimiento $persona) {
        $sql = "DELETE FROM seguimiento WHERE cod_seg = :cod_seg";
        return $this->ejecutarDelete($sql, $persona);
    }
    
    private function ejecutarDelete($sql, Seguimiento $persona){
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = array(':cod_seg' => $persona->getCodSeg());
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
        
    }
          

    private function getParametros(Seguimiento $persona) {
        $parametros = array(
            ':cod_seg' => $persona->getId_pers(),
            ':proyecto_cod_proy' => $persona->getNombre(),
            ':fecha_inicial' => $persona->getApellido(),
            ':fecha_final' => $persona->getTelefono(),
            ':fecha_limite' => $persona->getDireccion(),
            ':observaciones' => $persona->getEmail(),
            ':etapa' => date('Y-m-d G:i:s'),
            ':estado' => $persona->getPersona()
          
                
        );
        return $parametros;
        
        }
       public static function lanzarErrorBD($arrayError){
        throw new Exception("Error de operacion en BD: ".$arrayError[1]);
       }
}

?>
