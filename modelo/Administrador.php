
<?php

/**
 * En esta clase se encapsulan los datos del administrador.
 * @author Sindry Rueda <sijulieth@gmail.com> 
 * @author Yerlis Santana <lakarola90@hotmail.com>
 */

class Administrador {
    /**
     *codigo del estudiante
     * @var Integer
     */
     
     private $codEst;
     
     /**
      * identidad de la persona
      * @var Integer
      */
     private $personaIdPers;
     
     
      /**
       * retorna al codigo del estudiante
       * @return Integer
       */
      public function getCodEst() {
          return $this->codEst;
      }

      /**
       * toma el parametro codigo estudiante y se lo asigna a la clase administrador
       * @param Integer $codEst
       */
      public function setCodEst($codEst) {
          $this->codEst = $codEst;
      }

      /**
       * 
       * @return Integer
       */
      public function getPersonaIdPers() {
          return $this->personaIdPers;
      }

      /**
       * 
       * @param Integer $personaIdPers
       */
      public function setPersonaIdPers($personaIdPers) {
          $this->personaIdPers = $personaIdPers;
      }


      
}

?>
