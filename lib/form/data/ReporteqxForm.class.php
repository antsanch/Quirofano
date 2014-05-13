<?php

/**
 * Reporteqx form.
 *
 * @package    Quirofano
 * @subpackage form
 * @author     Your name here
 */
class ReporteqxForm extends BaseReporteqxForm
{
  public function configure()
  {
    $this->useFields(array(
      'id',
      'nombre',
      'quirofano_id',
      'querystring'
    ));
    $this->widgetSchema['querystring'] = new sfWidgetFormInputHidden();
  }
}
