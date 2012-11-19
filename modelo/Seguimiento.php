<?php
/**
 * En esta clase se encapsulan los datos del seguimiento.
 * @author Sindry Rueda <sijulieth@gmail.com> 
 * @author Yerlis Santana <lakarola90@hotmail.com>
 */
class Seguimiento {
    
    /**
     *codigo seguimiento
     * @var Integer 
     */
     private $codSeg;
     
     /**
      *codigo del proyecto
      * @var Integer 
      */
     private $proyectoCodProy;
     
     /**
      *fecha inicial 
      * @var DateTime 
      */
     private $fechaInicial;
     
     /**
      *fecha inicial
      * @var DateTime
      */
     private $fechaFinal;
     
     /**
      *fecha limite
      * @var DateTime
      */
     private $fechaLimite;
     
     /**
      *observaciones
      * @var String
      */
     private $observaciones;
     
     /**
      *etapa
      * @var String
      */
     private $etapa;
     
     /**
      *estado
      * @var String 
      */
     private $estado;
     
     /**
      *retorna al codigo de seguimiento
      * @return Integer 
      */
     public function getCodSeg() {
         return $this->codSeg;
     }

     /**
      *toma el parametro codigo segumiento y se lo asigna a la clase Seguimiento
      * @param Integer $codSeg 
      */
     public function setCodSeg($codSeg) {
         $this->codSeg = $codSeg;
     }

     /**
      *retorna al codigo del proyecto
      * @return Integer
      */
     public function getProyectoCodProy() {
         return $this->proyectoCodProy;
     }

     /**
      *toma el parametro codigo proyecto y se lo asigna a la clase Seguimiento
      * @param Integer $proyectoCodProy 
      */
     public function setProyectoCodProy($proyectoCodProy) {
         $this->proyectoCodProy = $proyectoCodProy;
     }

     /**
      *retorna a la fecha inicial
      * @return DateTime 
      */
     public function getFechaInicial() {
         return $this->fechaInicial;
     }

     /**
      *toma el parametro fecha inicial y se lo asigna a la clase Seguimiento
      * @param DateTime $fechaInicial 
      */
     public function setFechaInicial($fechaInicial) {
         $this->fechaInicial = $fechaInicial;
     }

     /**
      *retorna a la fecha final
      * @return DateTime 
      */
     public function getFechaFinal() {
         return $this->fechaFinal;
     }

     /**
      *toma el parametro fecha final y se lo asigna a la clase Seguimiento
      * @param DateTime $fechaFinal 
      */
     public function setFechaFinal($fechaFinal) {
         $this->fechaFinal = $fechaFinal;
     }

     /**
      *retorna fecha limite
      * @return DateTime
      */
     public function getFechaLimite() {
         return $this->fechaLimite;
     }

     /**
      *toma el parametro fecha limite y se lo asigna a la clase Seguimiento
      * @param DateTime $fechaLimite 
      */
     public function setFechaLimite($fechaLimite) {
         $this->fechaLimite = $fechaLimite;
     }

     /**
      *retorna a observaciones
      * @return String
      */
     public function getObservaciones() {
         return $this->observaciones;
     }

     /**
      *toma el parametro observaciones y se lo asigna a la clase Seguimiento
      * @param String $observaciones 
      */
     public function setObservaciones($observaciones) {
         $this->observaciones = $observaciones;
     }

     /**
      *retorna a etapa
      * @return String
      */
     public function getEtapa() {
         return $this->etapa;
     }

     /**
      *toma el parametro etapa y se lo asigna a la clase Seguimiento
      * @param String $etapa 
      */
     public function setEtapa($etapa) {
         $this->etapa = $etapa;
     }

     /**
      *retorna a estado
      * @return String 
      */
     public function getEstado() {
         return $this->estado;
     }

     /**
      *toma el parametro estado y se lo asigna a la clase Seguimiento
      * @param String $estado 
      */
     public function setEstado($estado) {
         $this->estado = $estado;
     }


}

?>
