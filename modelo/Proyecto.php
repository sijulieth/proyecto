<?php
/**
 * En esta clase se encapsulan los datos del proyecto.
 * @author Sindry Rueda <sijulieth@gmail.com> 
 * @author Yerlis Santana <lakarola90@hotmail.com>
 */

class Proyecto {
    
    /**
     *codigo proyecto
     * @var Integer
     */
     private $codProy;
     
     /**
      *tema
      * @var String 
      */
     private $tema;
     
     /**
      *linea de investigacion
      * @var String 
      */
     private $linInves;
       
     /**
      *retorna al codigo del proyecto
      * @return Integer 
      */
     
    
     public function getCodProy() {
         return $this->codProy;
     }

     

     /*
      *toma el parametro codigo proyecto y se lo asigna a la clase Proyecto
      * @param Integer $codProy 
      */
     
     
     public function setCodProy($codProy) {
         $this->codProy = $codProy;
     }

     /**
      *retorna al tema
      * @return String 
      */
     public function getTema() {
         return $this->tema;
     }
/**
 *toma el parametro tema y se lo asigna a la clase Proyecto
 * @param String $tema 
 */
     public function setTema($tema) {
         $this->tema = $tema;
     }

     /**
      *retorna a linea de investigacion
      * @return String 
      */
     public function getLinInves() {
         return $this->linInves;
     }

     /**
      *toma el parametro linea de investigacion y se lo asigna a la clase Proyecto
      * @param String $linInves 
      */
     public function setLinInves($linInves) {
         $this->linInves = $linInves;
     }
                   
}

?>
