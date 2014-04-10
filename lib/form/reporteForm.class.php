<?php
class reporteForm extends AgendaFormFilter
{
  /* functionname
  * @autor: Antonio Sanchez Uresti
  * @date:  2014-04-09
  */
  public function configure()
  {
    $this->useFields(array(
      'programacion',
      //'status',
      'last_time'
    ));

    $this->widgetSchema['status'] = new sfWidgetFormChoice(array('choices' => AgendaPeer::getStatus()));
    //~ die();
  }

}
