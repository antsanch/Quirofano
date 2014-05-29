<?php


class ConfirmacionFrom extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'aceptacion'  =>  new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'aceptacion'  =>  new sfValidatorBoolean(array('required' => true)),
    ));

    $this->widgetSchema->setLabels(array(
      'aceptacion'  =>  '¿Estas de acuerdo?',
    ));
  }

  /* functionname
  * @autor: Antonio Sanchez Uresti
  * @date:  2014-05-29
  */
  public function setAceptacionLabel($v)
  {
    $this->widgetSchema['aceptacion']->setLabel($v);
    return $this;
  }

}
