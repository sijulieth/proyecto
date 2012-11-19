<?php
/**
 * En esta clase se encapsulan los datos de los estudiantes.
 * @author Sindry Rueda <sijulieth@gmail.com> 
 * @author Yerlis Santana <lakarola90@hotmail.com>
 */

class Estudiante {
    
    /**
     *codigo del estudiante
     * @var Integer 
     */
   private $codEst;
   
   /**
    *Identidad de la persona
    * @var Integer
    */
   private $personaIdPers;
   
   /**
    *codigo del proyecto
    * @var Integer 
    */
   private $proyectoCodProy;
   
   /**
    *retorna al codigo del estudiante
    * @return Integer 
    */
   public function getCodEst() {
       return $this->codEst;
   }

   /**
    * toma el parametro codigo estudiante y se lo asigna a la clase estudiante
    * @param Integer $codEst 
    */
   public function setCodEst($codEst) {
       $this->codEst = $codEst;
   }

   /**
    *retorna a la identidad de la persona
    * @return Integer 
    */
   public function getPersonaIdPers() {
       return $this->personaIdPers;
   }

   /**
    *toma el parametro identidad persona y se lo asigna a la clase estudiante
    * @param Integer $personaIdPers 
    */
   public function setPersonaIdPers($personaIdPers) {
       $this->personaIdPers = $personaIdPers;
   }

   /**
    *retorna al codigo del proyecto
    * @return Integer 
    */
   public function getProyectoCodProy() {
       return $this->proyectoCodProy;
   }

   /**
    *toma el parametro codigo proyecto y se lo asigna a la clase estudiante
    * @param Integer $proyectoCodProy 
    */
   public function setProyectoCodProy($proyectoCodProy) {
       $this->proyectoCodProy = $proyectoCodProy;
   }



}

?>
