<?php
/**
 * En esta clase se encapsulan los datos del proyecto.
 * @author Sindry Rueda <sijulieth@gmail.com> 
 * @author Yerlis Santana <lakarola90@hotmail.com>
 */

class ProyectoHasJurado {
    
    /**
     *codigo del proyecto
     * @var Integer 
     */
     private $proyectoCod;
     
     /**
      *codigo del jurado
      * @var Integer 
      */
     private $juradoCodJura;
     
     /**
      *identidad de la persona
      * @var Integer
      */
     private $juradoPersonaIdPers;
     
     /**
      *retorna al codigo proyecto
      * @return Integer 
      */
     public function getProyectoCod() {
         return $this->proyectoCod;
     }

     /**
      *toma el parametro codigo proyecto y se lo asigna a la clase ProyectoHasJurado
      * @param Integer $proyectoCod 
      */
     public function setProyectoCod($proyectoCod) {
         $this->proyectoCod = $proyectoCod;
     }

     /**
      *retorna al codigo jurado
      * @return Integer 
      */
     public function getJuradoCodJura() {
         return $this->juradoCodJura;
     }

     /**
      *toma el parametro codigo jurado y se lo asigna a la clase ProyectoHasJurado
      * @param Integer $juradoCodJura 
      */
     public function setJuradoCodJura($juradoCodJura) {
         $this->juradoCodJura = $juradoCodJura;
     }

     /**
      *retorna a la identidad persona
      * @return Integer 
      */
     public function getJuradoPersonaIdPers() {
         return $this->juradoPersonaIdPers;
     }

     /**
      *toma el parametro identidad persona y se lo asigna a la clase ProyectoHasJurado
      * @param Integer $juradoPersonaIdPers 
      */
     public function setJuradoPersonaIdPers($juradoPersonaIdPers) {
         $this->juradoPersonaIdPers = $juradoPersonaIdPers;
     }


}

?>
