<?php

/**
 * Procedimientocirugia form.
 *
 * @package    siga12
 * @subpackage form
 * @author     Antonio Sanchez Uresti
 */
class ProcedimientocirugiaForm extends BaseProcedimientocirugiaForm
{
  public function configure()
  {
    unset(
      $this['created_at']
    );

/*if ($this->object->exists()) {
      $this->widgetSchema['delete'] = new sfWidgetFormInputCheckbox();
      $this->validatorSchema['delete'] = new sfValidatorPass();
    }
*/

    $this->setWidget('cie9mc_id', new sfWidgetFormInputHidden());
    $this->setWidget('region', new sfWidgetFormChoice(array(
      'choices' => array('' => 'Escoje una','1' => 'Derecha', '2' => 'Izquierda', '3' => 'Bilateral', '4' =>'Única'),
      'expanded' => false
    )));


    $this->widgetSchema['cie9mc_id']->setAttribute('class', 'target');
    $this->widgetSchema['cie9mc']->setAttribute('class', 'form-control autocompleteCie9');
    $this->widgetSchema['region']->setAttribute('class', 'form-control');
    $this->widgetSchema['detalles']->setAttribute('class', 'form-control');
    $this->widgetSchema['servicio_id']->setAttribute('class', 'form-control');

    $this->widgetSchema->setLabels(array(
      'cie9mc'    => 'Procedimiento o cirugía planeado',
      'region'    => 'Región',
      'detalles'  => 'Detalles adicionales'
    ));
   // $this->getWidgetSchema()->setDefaultFormFormatterName('personalizado');

    //$this->validatorSchema['region']->
  }
}
