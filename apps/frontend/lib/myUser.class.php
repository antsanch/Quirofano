<?php

//class myUser extends sfBasicSecurityUser
class myUser extends sfGuardSecurityUser
{
  
  /* functionname
  * @autor: Antonio Sanchez Uresti
  * @date:  2014-04-16
  */
  public function setQuirofano($value)
  {
    $this->setAttribute('quirofano', $value, 'options');
    return $this;
  }
  
  public function getQuirofano($default = null)
  {
    return $this->getAttribute('quirofano', $default, 'options');
  }
  
  
 /* hasBasicProfile
  * verifica que el usuario tenga completo un perfil basico
  * @autor: Antonio Sanchez Uresti
  * @date:  2013-08-05
  */
  public function hasBasicProfile()
  {

    return true;
  }

 /* getFullName
  * Retorna el nombre completo del usuario
  * @autor: Antonio Sanchez Uresti
  * @date:  2013-08-05
  */
  public function getFullName()
  {
    return 'Usuario Ejemplo';
  }

  public function getServicioName()
  {
    return 'Ing. Biomedica';
  }

  public function getDepartamentoName()
  {
    return 'Ing. Biomedica';
  }

  public function getArea()
  {
    return 'Ing. Biomedica';
  }


}
