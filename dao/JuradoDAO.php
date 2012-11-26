<?php

include_once  dirname(__FILE__).'\..\configuracion\Configuracion.php';
include_once dirname(__FILE__).'\..\modelo\Jurado.php';
class JuradoDAO {

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
        $sql = "SELECT * FROM jurado";
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
    public function leerPorDocumento($documento = '') {
        $sql = "SELECT * FROM jurado WHERE cod_jura = $documento";
        $sentencia = $this->getDb()->prepare($sql);
        $sentencia->execute();
        $filas = $sentencia->fetch();
        $persona = new Jurado();        
        Mapeador::mapearJurado($persona, $filas);
        return $persona;
    }

    public function insertarJurado(Jurado $persona) {
        $sql = "INSERT INTO `jurado` (`cod_jura`, `persona_id_pers`, `cod_proy`) VALUES ";
        $sql.=" (:cod_jura, :persona_id_pers, :cod_proy) ";
         $resul = false;
        try {
            $resul = $this->ejecutarInserUpdate($sql, $persona);
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
        return $resul;
        
        }

    public function actualizarJurado(Jurado $persona) {
        $sql = "UPDATE `jurado` SET `cod_jura`=:cod_jura,`persona_id_pers`=:persona_id_pers,`cod_proy`=:cod_proy";
        $sql.=" WHERE cod_jura = :cod_jura ";
        return $this->ejecutarInserUpdate($sql, $persona);
    }

    private function ejecutarInserUpdate($sql, Jurado $persona) {
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = $this->getParametros($persona);
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
    }
    
     public function eliminarJurado(Jurado $persona) {
        $sql = "DELETE FROM jurado WHERE cod_jura = :cod_jura";
        return $this->ejecutarDelete($sql, $persona);
    }
    
    private function ejecutarDelete($sql, Jurado $persona){
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = array(':cod_jura' => $persona->getCodJura());
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
        
    }

    private function getParametros(Jurado $persona) {
        $parametros = array(
            ':cod_jura' => $persona->getCodJura(),
            ':persona_id_pers' => $persona->getIdPers(),
            ':cod_proy' => $persona->getCodProy()
        );
        return $parametros;
    }
    public static function lanzarErrorBD($arrayError){
        throw new Exception("Error de operacion en BD: ".$arrayError[1]);
       }
}

?>
