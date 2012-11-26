<?php

//require_once "../configuracion/Configuracion.php";

include_once  dirname(__FILE__).'\..\configuracion\Configuracion.php';
include_once dirname(__FILE__).'\..\modelo\Proyecto.php';
class ProyectoDAO {

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
        $sql = "SELECT * FROM proyecto";
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
        $sql = "SELECT * FROM proyecto WHERE cod_proy = $documento";
        $sentencia = $this->getDb()->prepare($sql);
        $sentencia->execute();
        $filas = $sentencia->fetch();
        $persona = new Proyecto();        
        Mapeador::mapearProyecto($persona, $filas);
        return $persona;
    }

    public function insertarProyecto(Proyecto $persona) {
        $sql = "INSERT INTO `proyecto` (`cod_proy`, `tema`, `lin_inves`) VALUES ";
        $sql.=" (:cod_proy, :tema, :lin_inves) ";
         $resul = false;
        try {
            $resul = $this->ejecutarInserUpdate($sql, $persona);
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
        return $resul;
        
        }

    public function actualizarProyecto(Proyecto $persona) {
        $sql = "UPDATE `proyecto` SET `cod_proy`=:cod_proy,`tema`=:tema,`lin_inves`=:lin_inves";
        $sql.=" WHERE cod_proy = :cod_proy ";
        return $this->ejecutarInserUpdate($sql, $persona);
    }

    private function ejecutarInserUpdate($sql, Proyecto $persona) {
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = $this->getParametros($persona);
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
    }
    
     public function eliminarProyecto(Proyecto $persona) {
        $sql = "DELETE FROM proyecto WHERE cod_proy = :cod_proy";
        return $this->ejecutarDelete($sql, $persona);
    }
    
    private function ejecutarDelete($sql, Proyecto $persona){
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = array(':cod_proy' => $persona->getCodProy());
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
        
    }

    private function getParametros(Proyecto $persona) {
        $parametros = array(
            ':cod_proy' => $persona->getCodProy(),
            ':tema' => $persona->getTema(),
            ':lin_inves' => $persona->getLinInves()
        );
        return $parametros;
    }
    public static function lanzarErrorBD($arrayError){
        throw new Exception("Error de operacion en BD: ".$arrayError[1]);
       }
}
?>
