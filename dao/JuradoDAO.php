<?php

//require_once "../configuracion/Configuracion.php";

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
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $this->db;
    }

    public function leerTodos() {
        $sql = "SELECT * FROM jurado";
        $sentencia = $this->getDb()->prepare($sql);
        $cursor = $sentencia->execute();
        $filas = $sentencia->fetchAll();
        return $filas;
    
    }/*
    public function leerPorDocumento($documento = '') {
        $sql = "SELECT * FROM persona WHERE identificacion = $documento";
        $sentencia = $this->getDb()->prepare($sql);
        $cursor = $sentencia->execute();
        $filas = $sentencia->fetch();
        return $filas;
    }

    public function insertarPersona(Persona $persona) {
        $sql = "INSERT INTO `personas` (`documento`, `nombres`, `apellidos`, `telefono1`, `telefono2`, `email`, `direccion`) VALUES ";
        $sql.=" (:documento, :nombres, :apellidos, :telefono1, :telefono2, :email, :direccion) ";
        return $this->ejecutarInserUpdate($sql, $persona);
    }

    public function actualizarPersona(Persona $persona) {
        $sql = "UPDATE `personas` SET `nombres`=:nombres,`apellidos`=:apellidos,`telefono1`=:telefono1, ";
        $sql.=" `telefono2`=:telefono2,`email`=:email,`direccion`=:direccion,`fechaRegistro`=:fechaRegistro ";
        $sql.=" WHERE documento = :documento ";
        return $this->ejecutarInserUpdate($sql, $persona);
    }

    private function ejecutarInserUpdate($sql, Persona $persona) {
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = $this->getParametros($persona);
        return $sentencia->execute($parametros);
    }

    private function getParametros(Persona $persona) {
        $parametros = array(
            ':documento' => $persona->getDocumento(),
            ':nombres' => $persona->getNombre(),
            ':apellidos' => $persona->getApellidos(),
            ':telefono1' => $persona->getTelefono1(),
            ':telefono2' => $persona->getTelefono2(),
            ':email' => $persona->getEmail(),
            ':direccion' => $persona->getDireccion()
        );
        return $parametros;
    }*/
}

?>
