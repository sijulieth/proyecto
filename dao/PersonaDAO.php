<?php

include  dirname(__FILE__).'\..\configuracion\Configuracion.php';
include  dirname(__FILE__).'\..\modelo\Persona.php';

class PersonaDAO {

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
        $sql = "SELECT * FROM persona";
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
    public function leerPorDocumento($id_pers = '') {
        $sql = "SELECT * FROM persona WHERE id_pers =". $id_pers;
        $sentencia = $this->getDb()->prepare($sql);
        $sentencia->execute();
        $filas = $sentencia->fetch();
        $persona = new Persona();
        
        Mapeador::mapearPersona($persona, $filas);
        return $persona;
    }
    
     public function leerPorUsuario($usuario) {
        $sql = "SELECT * FROM persona WHERE usuario = '$usuario'";
        $sentencia = $this->getDb()->prepare($sql);
        $sentencia->execute();
        $filas = $sentencia->fetch();
        $usuario = new Persona();
        if ($filas) {
            Mapeador::mapearPersona($usuario, $filas);
            return $usuario;
        }else{
            return null;
        }
        
    }
    
    public function insertarPersona(Persona $persona) {
        $sql = "INSERT INTO `persona` (`id_pers`,`nombre`, `apellido`, `telefono`, `direccion`, `email`, `fecha`, `persona`, `usuario`, `contrasena`) VALUES ";
        $sql.=" (:id_pers,:nombre, :apellido, :telefono, :direccion, :email, :fecha, :persona, :usuario, :contrasena) ";
        $resul = false;
        try {
            $resul = $this->ejecutarInserUpdate($sql, $persona);
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
        return $resul;
        
        }

    public function actualizarPersona(Persona $persona) {
        $sql = "UPDATE Persona SET `id_pers`=:id_pers, `nombre`=:nombre, `apellido`=:apellido, `telefono`=:telefono, `direccion`=:direccion, `email`=:email, `fecha`=:fecha, `persona`=:persona, `usuario`=:usuario, `contrasena`=:contrasena";
        $sql.=" WHERE id_pers = :id_pers ";
        return $this->ejecutarInserUpdate($sql, $persona);
    }
    
    private function ejecutarInserUpdate($sql, Persona $persona) {
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = $this->getParametros($persona);
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
    }

     public function eliminarPersona(Persona $persona) {
        $sql = "DELETE FROM persona WHERE id_pers = :id_pers";
        return $this->ejecutarDelete($sql, $persona);
    }
    
    private function ejecutarDelete($sql, Persona $persona){
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = array(':id_pers' => $persona->getId_pers());
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
        
    }
          

    private function getParametros(Persona $persona) {
        $parametros = array(
            ':id_pers' => $persona->getId_pers(),
            ':nombre' => $persona->getNombre(),
            ':apellido' => $persona->getApellido(),
            ':telefono' => $persona->getTelefono(),
            ':direccion' => $persona->getDireccion(),
            ':email' => $persona->getEmail(),
            ':fecha' => date('Y-m-d G:i:s'),
            ':persona' => $persona->getPersona(),
            ':usuario' => $persona->getUsuario(),
            ':contrasena' => $persona->getContrasena()
                
        );
        return $parametros;
        
        }
       public static function lanzarErrorBD($arrayError){
        throw new Exception("Error de operacion en BD: ".$arrayError[1]);
       }
}

?>
