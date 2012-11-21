<?php


include_once  dirname(__FILE__).'\..\configuracion\Configuracion.php';
include_once dirname(__FILE__).'\..\modelo\Estudiante.php';

class EstudianteDAO {

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
            throw new Exception("La base de datos no pudo ser creada.".$exc->getMessage());
        }
        return $this->db;
    }

    public function leerTodos() {
        $sql = "SELECT * FROM estudiante";
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
    public function leerPorDocumento($cod_est = '') {
        $sql = "SELECT * FROM estudiante WHERE cod_est =". $cod_est;
        $sentencia = $this->getDb()->prepare($sql);
        $sentencia->execute();
        $filas = $sentencia->fetch();
        $estudiante = new Estudiante();        
        Mapeador::mapearEstudiante($estudiante, $filas);
        return $estudiante;
    }

    public function insertarEstudiante(Estudiante $estudiante) {
        $sql = "INSERT INTO `estudiante` (`cod_est`,`persona_id_pers`, `proyecto_cod_proy`) VALUES ";
        $sql.=" (:cod_est,:persona_id_pers, :proyecto_cod_proy) ";
        $resul = false;
        try {
            $resul = $this->ejecutarInserUpdate($sql, $estudiante);
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
        return $resul;
        
        }

    public function actualizarEstudiante(Estudiante $estudiante) {
        $sql = "UPDATE estudiante SET `cod_est`=:cod_est, `persona_id_pers`=:persona_id_pers, `proyecto_cod_proy`=:proyecto_cod_proy";
        $sql.=" WHERE cod_est = :cod_est ";
        return $this->ejecutarInserUpdate($sql, $estudiante);
    }
    
    private function ejecutarInserUpdate($sql, Estudiante $estudiante) {
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = $this->getParametros($estudiante);
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
    }

     public function eliminarEstudiante(Estudiante $estudiante) {
        $sql = "DELETE FROM estudiante WHERE cod_est = :cod_est";
        return $this->ejecutarDelete($sql, $estudiante);
    }
    
    private function ejecutarDelete($sql, Estudiante $estudiante){
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = array(':cod_est' => $estudiante->getCodEst());
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
        
    }
          

    private function getParametros(Estudiante $estudiante) {
        $parametros = array(
            ':cod_est' => $estudiante->getCodEst(),
            ':persona_id_pers' => $estudiante->getPersonaIdPers(),
            ':proyecto_cod_proy' => $estudiante->getProyectoCodProy()
            
                
        );
        return $parametros;
        }
       public static function lanzarErrorBD($arrayError){
        throw new Exception("Error de operacion en BD: ".$arrayError[1]);
       }
}
?>
