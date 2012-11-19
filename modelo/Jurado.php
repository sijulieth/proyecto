<?php
/**
 * En esta clase se encapsulan los datos del jurado.
 * @author Sindry Rueda <sijulieth@gmail.com> 
 * @author Yerlis Santana <lakarola90@hotmail.com>
 */

class Jurado {
    
    /**
     *codigo juarado
     * @var Integer
     */
   private $codJura;
   
   /**
    *identidad de la persona
    * @var Integer 
    */
   private $idPers;
   
   /**
    *codigo del proyecto
    * @var Integer 
    */
   private $codProy;
   
   /**
    *retorna al codigo jurado
    * @return Integer 
    */
   public function getCodJura() {
       return $this->codJura;
   }

   /**
    *toma el parametro codigo jurado y se lo asigna a la clase Jurado
    * @param Integer $codJura 
    */
   public function setCodJura($codJura) {
       $this->codJura = $codJura;
   }

   /**
    *retorna a la identidad de la persona
    * @return Integer 
    */
   public function getIdPers() {
       return $this->idPers;
   }

   /**
    *toma el parametro identidad de la persona y se lo asigna a la clase Jurado
    * @param Integer $idPers 
    */
   public function setIdPers($idPers) {
       $this->idPers = $idPers;
   }

   /**
    *retorna al codigo del proyecto
    * @return Integer 
    */
   public function getCodProy() {
       return $this->codProy;
   }

   /**
    *toma el parametro codigo proyecto y se lo asigna a la clase Jurado
    * @param Integer $codProy 
    */
   public function setCodProy($codProy) {
       $this->codProy = $codProy;
   }


   
   
   
}

?>
