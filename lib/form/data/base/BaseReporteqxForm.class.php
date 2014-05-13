<?php

/**
 * Reporteqx form base class.
 *
 * @method Reporteqx getObject() Returns the current form's model object
 *
 * @package    Quirofano
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseReporteqxForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'nombre'       => new sfWidgetFormInputText(),
      'querystring'  => new sfWidgetFormTextarea(),
      'quirofano_id' => new sfWidgetFormPropelChoice(array('model' => 'Quirofano', 'add_empty' => true)),
      'created_at'   => new sfWidgetFormDateTime(),
      'slug'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nombre'       => new sfValidatorString(array('max_length' => 128)),
      'querystring'  => new sfValidatorString(array('required' => false)),
      'quirofano_id' => new sfValidatorPropelChoice(array('model' => 'Quirofano', 'column' => 'id', 'required' => false)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
      'slug'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Reporteqx', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('reporteqx[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Reporteqx';
  }


}
