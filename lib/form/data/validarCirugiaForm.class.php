<?php

class validarCirugiaForm extends sfForm
{
  public function setup() {
    $this->setWidgets(array(
      'search' => new sfWidgetFormInput(array('label' => 'Buscar:'), array('autofocus'=>'true','placeholder' => 'Nombre o registro del paciente', 'autocomplete' => 'off'))
    ));
  }
}
 ?>

