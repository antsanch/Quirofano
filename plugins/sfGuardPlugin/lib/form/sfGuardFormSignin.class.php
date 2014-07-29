<?php

class sfGuardFormSignin extends BasesfGuardFormSignin
{
  public function configure()
  {
    $this->setWidgets(array(
      'username' => new sfWidgetFormInput(array(), array(
        'class'         =>  'form-control placeholder-no-fix',
        'placeholder'   =>  'Usuario',
        'autocomplete'  =>  'off'
      )),
      'password' => new sfWidgetFormInput(array('type' => 'password'), array(
        'class'         =>  'form-control placeholder-no-fix',
        'placeholder'   =>  'Contraseña',
        'autocomplete'  =>  'off'
      )),
      'remember' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'username' => new sfValidatorString(),
      'password' => new sfValidatorString(),
      'remember' => new sfValidatorBoolean(),
    ));

    $this->validatorSchema->setPostValidator(new sfGuardValidatorUser());

    $this->widgetSchema->setNameFormat('signin[%s]');
  }
}
