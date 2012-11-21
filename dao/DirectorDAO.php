<?php


include_once  dirname(__FILE__).'\..\configuracion\Configuracion.php';
include_once dirname(__FILE__).'\..\modelo\Director.php';

class DirectorDAO {

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
        $sql = "SELECT * FROM director";
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
    public function leerPorDocumento($cod_dir = '') {
        $sql = "SELECT * FROM director WHERE cod_dir =". $cod_dir;
        $sentencia = $this->getDb()->prepare($sql);
        $sentencia->execute();
        $filas = $sentencia->fetch();
        $director = new Director();
        Mapeador::mapearDirector($director, $filas);
        return $director;
    }
    
    public function insertarDirector(Director $director) {
        $sql = "INSERT INTO `director` (`cod_dir`,`persona_id_pers`, `cod_proy`) VALUES ";
        $sql.=" (:cod_dir,:persona_id_pers, :cod_proy) ";
        $resul = false;
        try {
            $resul = $this->ejecutarInserUpdate($sql, $director);
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
        return $resul;
        
        }

    public function actualizarDirector(Director $director) {
        $sql = "UPDATE director SET `cod_dir`=:cod_dir, `persona_id_pers`=:persona_id_pers, `cod_proy`=:cod_proy";
        $sql.=" WHERE cod_dir = :cod_dir ";
        return $this->ejecutarInserUpdate($sql, $director);
    }
    
    private function ejecutarInserUpdate($sql, Director $director) {
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = $this->getParametros($director);
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
    }

     public function eliminarDirector(Director $director) {
        $sql = "DELETE FROM director WHERE cod_dir = :cod_dir";
        return $this->ejecutarDelete($sql, $director);
    }
    
    private function ejecutarDelete($sql, Director $director){
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = array(':cod_dir' => $director->getCodDir());
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
        
    }
          

    private function getParametros(Director $director) {
        $parametros = array(
            ':cod_dir' => $director->getCodDir(),
            ':persona_id_pers' => $director->getPersonaIdPers(),
            ':cod_proy' => $director->getCodProy(),
                            
        );
        return $parametros;
        
        }
       public static function lanzarErrorBD($arrayError){
        throw new Exception("Error de operacion en BD: ".$arrayError[1]);
       }
}

?>
