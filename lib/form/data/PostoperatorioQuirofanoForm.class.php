﻿<?php
/**
 * Agenda form.
 *
 * @package    siga12
 * @subpackage form
 * @author     Antonio Sanchez Uresti
 */
class postoperatorioQuirofanoForm extends AgendaForm
{
  public function configure()
  {
  $object = $this->getObject();
    $this->useFields(array(
    //'paciente_name',
    //'paciente_id',
    'egreso',
    'complicaciones',
    'riesgoqx_id',
    'contaminacionqx_id',
    'eventoqx_id',
    'clasificacionqx',
    'destino_px',
    'status',
    'ev_adversos_anestesia'
    ));
  //$this->widgetSchema['paciente_id'] = new sfWidgetFormInputHidden();
  $this->widgetSchema['egreso'] = new sfWidgetFormInputText();
  $this->widgetSchema['complicaciones'] = new sfWidgetFormTextarea();
  $this->widgetSchema['status'] = new sfWidgetFormInputHidden();
  $this->widgetSchema['status']->setAttribute('value', '100');
  $this->setWidget('destino_px', new sfWidgetFormChoice(array(
    'choices' => AgendaPeer::getDestinoPx(),
    'expanded' => false
  )));
  $this->setWidget('clasificacionqx', new sfWidgetFormChoice(array(
    'choices' => array(null, 'Mayor', 'Menor'),
    'expanded' => false,
  )));
  $this->widgetSchema->setLabels(AgendaPeer::getLabels());
    /* Ajustes a los validadores */
  $this->validatorSchema['egreso']->setOption('required', true);
  $this->validatorSchema['ev_adversos_anestesia']->setOption('required', true);
  $this->validatorSchema['complicaciones']->setOption('required', true);
  $this->validatorSchema['contaminacionqx_id']->setOption('required', true);
  $this->validatorSchema['destino_px']->setOption('required', true);
  $this->validatorSchema['egreso']->setMessage('required','Falta hora');
  $this->widgetSchema['egreso']->setAttributes(array(
    'id' => 'datahora',
    'value' => date('H:i A')

  ));

  // Agregando las personas del transoperatorio
  $transPersonal = $object->getPersonalTransoperatorio();
  $tmp = new sfForm();

  if($transPersonal != null) {
    foreach ($transPersonal as $personal) {
      if ($personal->getPersonalNombre()) {
        $x = new PersonalcirugiaForm($personal);
        $x->useFields(array('finaliza', 'personal_nombre'));
        $tmp->embedForm('personal'.$personal->getId(), $x);
      }
    }
    $this->embedForm('temporal', $tmp);
  }

  $this->validatorSchema['clasificacionqx']->setOption('required', true);
  $this->validatorSchema['clasificacionqx']->setMessage('required','Falta clasificación de la cirugía');
  }
}
