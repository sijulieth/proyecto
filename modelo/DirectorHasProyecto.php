<?php
/**
 * En esta clase se encapsulan los datos del director.
 * @author Sindry Rueda <sijulieth@gmail.com> 
 * @author Yerlis Santana <lakarola90@hotmail.com>
 */

class DirectorHasProyecto {
    
    /**
     *codigo del director
     * @var Integer 
     */
     private $directorCodDir;
     
     /**
      *identidad de la persona
      * @var Integer 
      */
     private $directorPersonaIdPers;
     
     /**
      *codigo del proyecto
      * @var Integer 
      */
     private $proyectoCodProy;
     
     
     /**
      *retorna al codigo del director
      * @return Integer 
      */
     public function getDirectorCodDir() {
         return $this->directorCodDir;
     }

     /**
      *toma el parametro codigo director y se lo asigna a la clase DirectorHasProyecto
      * @param Integer $directorCodDir 
      */
     public function setDirectorCodDir($directorCodDir) {
         $this->directorCodDir = $directorCodDir;
     }

     /**
      *retorna a la identidad de la persona
      * @return Integer 
      */
     public function getDirectorPersonaIdPers() {
         return $this->directorPersonaIdPers;
     }

     /**
      *toma el parametro identidad persona y se lo asigna a la clase DirectorHasProyecto
      * @param Integer $directorPersonaIdPers 
      */
     public function setDirectorPersonaIdPers($directorPersonaIdPers) {
         $this->directorPersonaIdPers = $directorPersonaIdPers;
     }

     /**
      *retorna al codigo del proyecto
      * @return Integer 
      */
     public function getProyectoCodProy() {
         return $this->proyectoCodProy;
     }

     /**
      *toma el parametro codigo proyecto y se lo asigna a la clase DirectorHasProyecto
      * @param Integer $proyectoCodProy 
      */
     public function setProyectoCodProy($proyectoCodProy) {
         $this->proyectoCodProy = $proyectoCodProy;
     }


    
    }

?>
