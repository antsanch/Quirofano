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
      'quirofano_id',
      'sala_id',
      'programacion',
      //~ 'status',
      //'last_time',
      'medico_name',
      'servicio',
      'contaminacionqx_id',
      'tipo_proc_id',
      'atencion_id',
      'reintervencion',
    ));
    $this->widgetSchema['quirofano_id']->setOption('add_empty', 'Todos');
    $this->widgetSchema['sala_id']->setOption('add_empty', 'Todas');

    $options = array('with_time' => false, 'date_order' => 'd-m-Y', 'date' => array('type' => 'search'));
    $attributes = array('date' => array('class' => 'datepicker'));
    $this->widgetSchema['programacion'] = new sfWidgetFormFilterDate(array(
      'from_date'   =>  new sfWidgetFormInputTextDateTime($options, $attributes),
      'to_date'     =>  new sfWidgetFormInputTextDateTime($options, $attributes),
      'template'    =>  'Desde: %from_date% Hasta: %to_date%',
      'with_empty'  =>  false,
    ));
    $this->widgetSchema['medico_name'] = new sfWidgetFormInputText();
    $this->widgetSchema['servicio'] = new sfWidgetFormPropelChoiceNestedSet(array(
      'add_empty'   =>  'Todos',
      'criteria'    =>  EspecialidadQuery::create()->filterByQuirurgica(true),
      'model'       =>  'Especialidad',
    ));
    $this->widgetSchema['reintervencion'] = new sfWidgetFormChoice(array(
      'choices'     =>  array('No', 'Si'),
      'expanded'    =>  true,
    ),
    array(
      'class'       =>  'horizontal',
      'style'       =>  'float: left; list-style: none outside none; padding-left: 0;'
    ));

    $this->widgetSchema['contaminacionqx_id']->setOption('add_empty', 'Todos');
    $this->widgetSchema['tipo_proc_id']->setOption('add_empty', 'Todas');
    $this->widgetSchema['atencion_id']->setOption('add_empty', 'Todos');

    $groupBy = new sfForm();
    $groupBy->setWidgets(array(
      'quirofano_id'        =>  new sfWidgetFormInputCheckbox(),
      'sala_id'             =>  new sfWidgetFormInputCheckbox(),
      'servicio'            =>  new sfWidgetFormInputCheckbox(),
      'contaminacionqx_id'  =>  new sfWidgetFormInputCheckbox(),
      'tipo_proc_id'        =>  new sfWidgetFormInputCheckbox(),
      'atencion_id'         =>  new sfWidgetFormInputCheckbox(),
    ));

    $groupBy->setValidators(array(
      'quirofano_id'        =>  new sfValidatorPass(),
      'sala_id'             =>  new sfValidatorPass(),
      'servicio'            =>  new sfValidatorPass(),
      'contaminacionqx_id'  =>  new sfValidatorPass(),
      'tipo_proc_id'        =>  new sfValidatorPass(),
      'atencion_id'         =>  new sfValidatorPass(),
    ));
    $this->embedForm('groupBy', $groupBy);
    //~ $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
      //~ 'add_empty'   => true,
      //~ 'choices'     => AgendaPeer::getStatus()
    //~ ));
    $this->disableLocalCSRFProtection();
  }

  /* setQuirofanoDefault
  * @autor: Antonio Sanchez Uresti
  * @date:  2014-05-07
  */
  public function setQuirofanoDefault()
  {
    $this->widgetSchema['quirofano_id']->setDefault(1);
    return $this;
  }


}
