<?php

/**
 * En esta clase se encapsulan los datos del director.
 * @author Sindry Rueda <sijulieth@gmail.com> 
 * @author Yerlis Santana <lakarola90@hotmail.com>
 */

class Director {
    
    /**
     *codigo del director
     * @var Integer 
     */
  private $codDir;
  /**
   *identidad de la persona
   * @var Integer 
   */
  private $personaIdPers;
  /**
   *codigo proyecto
   * @var Integer 
   */
  private $codProy;
  
  
  /**
   *retorna al codigo del director
   * @return Integer 
   */
  public function getCodDir() {
      return $this->codDir;
  }

  /**
   *toma el parametro codigo director y se lo asigna a la clase Director
   * @param Integer $codDir 
   */
  public function setCodDir($codDir) {
      $this->codDir = $codDir;
  }

  /**
   *retorna a la identidad de la persona
   * @return Integer 
   */
  public function getPersonaIdPers() {
      return $this->personaIdPers;
  }

  /**
   *toma el parametro identidad persona y se lo asigna a la clase Director
   * @param Integer $personaIdPers 
   */
  public function setPersonaIdPers($personaIdPers) {
      $this->personaIdPers = $personaIdPers;
  }

  /**
   *retorna al codigo del proyecto
   * @return Integer 
   */
  public function getCodProy() {
      return $this->codProy;
  }

  /**
   *toma el parametro codigo proyecto y se lo asigna a la clase Director
   * @param Integer $codProy 
   */
  public function setCodProy($codProy) {
      $this->codProy = $codProy;
  }


}

?>
