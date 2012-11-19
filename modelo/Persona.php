<?php
/**
 * En esta clase se encapsulan los datos de las personas.
 * @author Sindry Rueda <sijulieth@gmail.com> 
 * @author Yerlis Santana <lakarola90@hotmail.com>
 */

class Persona {
    
    /**
     *identidad persona
     * @var Integer 
     */
    private $id_pers;
    
    /**
     *nombre
     * @var String 
     */
    private $nombre;
    
    /**
     *apellido
     * @var String 
     */
    private $apellido;
    
    /**
     *telefono
     * @var String 
     */
    private $telefono;
    
    /**
     *direccion
     * @var String
     */
    private $direccion;
    
    /**
     *email
     * @var String
     */
    private $email;
    
    /**
     *fecha 
     * @var DateTime 
     */
    private $fecha;
    
    /**
     *persona
     * @var String 
     */
    private $persona;
    
    /**
     *usuario
     * @var String 
     */
    private $usuario;
    
    /**
     *contraseña 
     * @var String 
     */
    private $contrasena;
    
    public function getId_pers() {
        return $this->id_pers;
    }

    public function setId_pers($id_pers) {
        $this->id_pers = $id_pers;
    }

        
    /**
     *retorna a la identidad de la persona
     * @return Integer 
     */
    /*
    public function getIdPers() {
        return $this->idPers;
    }

    /**
     *toma el parametro identidad persona y se lo asigna a la clase Personas
     * @param Integer $idPers 
     */
    
    /**
    public function setIdPers($idPers) {
        $this->idPers = $idPers;
    }*/

    /**
     *retorna al nombre
     * @return String 
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     *toma el parametro nombre y se lo asigna a la clase Personas
     * @param String $nombre 
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    /**
     *retorna al apellido
     * @return String
     */
    public function getApellido() {
        return $this->apellido;
    }

    /**
     *toma el parametro apellido y se lo asigna a la clase Personas
     * @param String $apellido 
     */
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    /**
     *retorna al telefono
     * @return String
     */
    public function getTelefono() {
        return $this->telefono;
    }

    /**
     *toma el parametro telefono y se lo asigna a la clase Personas
     * @param String $telefono 
     */
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    /**
     *retorna a la direccion 
     * @return String
     */
    public function getDireccion() {
        return $this->direccion;
    }

    /**
     *toma el parametro direccion y se lo asigna a la clase Personas
     * @param String $direccion 
     */
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    /**
     *retorna al email
     * @return String 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     *toma el parametro email y se lo asigna a la clase Personas
     * @param String $email 
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     *retorna a la fecha
     * @return DateTime 
     */
    public function getFecha() {
        return $this->fecha;
    }

    /**
     *toma el parametro fecha y se lo asigna a la clase Personas
     * @param DateTime $fecha 
     */
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    /**
     *retorna a persona
     * @return String 
     */
    public function getPersona() {
        return $this->persona;
    }

    /**
     *toma el parametro persona y se lo asigna a la clase Personas
     * @param String $persona 
     */
    public function setPersona($persona) {
        $this->persona = $persona;
    }

    /**
     *retorna a usuario
     * @return String 
     */
    public function getUsuario() {
        return $this->usuario;
    }

    /**
     *toma el parametro Usuario y se lo asigna a la clase Personas
     * @param String $usuario 
     */
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    /**
     *retorna a la contraseña 
     * @return String 
     */
    public function getContrasena() {
        return $this->contrasena;
    }

    /**
     *toma el parametro contraseña y se lo asigna a la clase Personas
     * @param String $contraseña 
     */
    public function setContrasena($contraseña) {
        $this->contraseña = $contraseña;
    }


}

?>
