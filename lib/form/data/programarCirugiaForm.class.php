<?php

/**
 * Agenda form.
 *
 * @package    Quirofano
 * @subpackage form
 * @author     Your name here
 */


class programarCirugiaForm extends BaseAgendaForm
{
  // Cirugia previa relacionada con la nueva
  protected $cx;

  public function configure()
  {
    $object = $this->getObject();

    $this->useFields(array(
      //'medico_name',
      'id',
      'programacion',
      //~ 'fechaestado',
      'hora',
      //~ 'horaestado',
      //'evento_id',
      'sala_id',
      //'cie9mc',
      //'cie9mc_id',
      'paciente_name',
      'paciente_id',
      'diagnostico',
      'diagnostico_id',
      'edad',
      'genero',
      'registro',
      'servicio',
      //'programa',
      //'programa_id',
      'requerimiento',
      'req_insumos',
      'req_hemoderiv',
      'req_laboratorio',
      'req_anestesico',
      'reintervencion',
      'quirofano_id',
      'tipo_proc_id',
      'status',
      'atencion_id',
      'procedencia',
      //'region_px',
      //'extension_px',
      'tiempo_est',
      //'anexo_detalle',
      'riesgo_qx_pre',
      //'cxprograma',
      'show_in_index',
      'protocolo'
    ));

/**
 * Ajustes a los widgets creados por default
 * ===================================================================== */

  # @flag Configura el campo ['id'] como oculto
    $this->widgetSchema['id'] = new sfWidgetFormInputHidden();

  # @flag Configuracion del campo del id de quirofano
    $this->widgetSchema['quirofano_id'] = new sfWidgetFormInputHidden();

  # @flag Configura el campo status y lo establece oculto
    $this->setWidget('status', new sfWidgetFormInputHidden(array(), array('value' => '1')));

  # @flag Configura los campos de fecha y hora para la programacion
    $this->widgetSchema['programacion'] = new sfWidgetFormInputTextDateTime(array(
      'date_order'  => 'd-m-Y',
      'format'      => '<div class="area cols02"><div class="label">Fecha: </div><div class="field">%date%</div></div> <div class="area cols02"><div class="label">Hora:</div> <div class="field">%time%</div></div>',
      'with_time'   => true,
    ),
    array(  # array de atributos
      'class'       => 'hasDatapicker',
      'date'        => array(
        'class'       => 'datepicker',
        'placeholder' => 'Dia/Mes/Año',
      ),
      'id'          => 'datepicker',
      'time'        => array(
        'placeholder' => 'Hora:Minutos'
      ),
      //'data-source' => 'http://example.com/api/data'
    ));

  # @flag Configura el campo de duracion (tiempo estimado)
    $this->widgetSchema['tiempo_est'] = new sfWidgetFormInputText();

  # @flag Configura el tipo de programacion
    $this->setWidget('tipo_proc_id', new sfWidgetFormPropelChoice(array(
      'model' => 'Procedimiento',
    )));

  # @flag Configurar el campo especialidad solo con áreas quirúrgicas
    $this->setWidget('servicio', new sfWidgetFormPropelChoiceNestedSet(array(
      'model' => 'Especialidad',
      'criteria' => EspecialidadQuery::create()->filterByQuirurgica(true),
      //~ 'label' => 'Especialidad:'
    )));

  # @flag Configurar el campo de 'diagnostico_id'
    $this->widgetSchema['diagnostico_id'] = new sfWidgetFormInputHidden();
    # @flag Ponemos un ID de diagnostico temporalmente, para poder salvar las cirugias //          [DEL]
    $this->widgetSchema['diagnostico_id']->setAttribute('value', 'R14');

  # @flag Configura las opciones del campo protocolo
    $this->widgetSchema['protocolo'] = new sfWidgetFormChoice(array(
      'choices' => array('0' => 'No', '1' => 'Si'),
      'expanded' => true
    ));

  # @flag Configura las opciones al campo reintervencion
    $this->widgetSchema['reintervencion'] = new sfWidgetFormChoice(array(
      'choices' => array('0' => 'No', '1' => 'Si'),
      'expanded' => true
    ));

  # @flag Configura el campo 'diagnostico'
    $this->widgetSchema['diagnostico']->setAttributes(array(
      'class'       => 'searchable',
      'data-field'  => 'diagnostico_id',
      'data-select' => '1',
      'data-source' => 'http://sigahu.com/index.php/api/clavecie',
      'placeholder' => 'Diagnóstico del paciente o código CIE10',
    ));

  # @flag Configura el campo 'riesgo quirurgico' como textarea
    $this->setWidget('riesgo_qx_pre', new sfWidgetFormTextarea());

  # @flag Configura las etiquetas
    $this->widgetSchema->setLabels(AgendaPeer::getLabels());


/**
 * Integrar el formulario para asignar el medico que programa la Cirgia
 * ===================================================================== */
    $programa = $object->getMedicoPrograma();

    if ($programa->isNew()) {
      $programa->setAgenda($this->getObject());
      $programa->fromArray(array( 'Tipo' => 'cirujano', 'Agenda'  =>  $this->getObject(), 'Status'  =>  0, 'Programa' => true ));
    }

    $progForm = new PersonalcirujanoForm($programa);
    unset( $progForm['inicia'], $progForm['transoperatorio'] );
    $this->embedForm('programa', $progForm);

    $this->widgetSchema['programa']['programa'] = new sfWidgetFormInputHidden();

    $this->widgetSchema['programa']['personal_nombre']
      ->setLabel('Nombre del Médico que programa:')
      ->setAttributes(array(
        'class' => 'searchable',
        'data-url' => 'profile/json',
        #'data-select' => '#agenda_programa_personal_id'
      ));

/**
 * Integrar la relacion de los procedimientos a realizar
 * ===================================================================== */

   if($object->countProcedimientocirugias() == 0) {
      $object->addProcedimientocirugia(new Procedimientocirugia());
      //      $object->addProcedimientocirugia(new Procedimientocirugia());
      //      $object->addProcedimientocirugia(new Procedimientocirugia());
      //      $object->addProcedimientocirugia(new Procedimientocirugia());
    }

    $this->embedRelation('Procedimientocirugia', array(
        //'remove_fields'       =>  'region',
        'title'               =>  'Procedimientos a realizar',
        'embedded_form_class' =>  'ProcedimientocirugiaForm',
        //'formatter_name'      =>  'personalizado',
      # Opciones para el Eliminado
        'delete_name'         =>  'Eliminar',
        'alert_text'          =>  '¿Esta seguro que desea eliminar este procedimiento?\n Ya no se podrá recuperar',
        'parent_level'        =>  4,
      # Opciones para agregar nuevos
        'add_link'            =>  'Agregar otro Procedimiento',
        'max_additions'       =>  4
    ));






    //$this->widgetSchema['hora'] = new sfWidgetFormInputText();  # @flag Eliminamos el campo de la hora          [DEL]
    //$this->setWidget('tiempo_est', new sfWidgetFormChoice(array(  //          [DEL]
    //'choices' => AgendaPeer::getDuracion()    //          [DEL]
      //'id' => 'tiest'   //          [DEL]
    //)));    //          [DEL]





//       $this->setWidget('tiempo_est', new sfWidgetFormChoice(array(
//      'choices' => AgendaPeer::getDuracion()
//    )));

        //~ $this->widgetSchema['programacion']->setAttributes(array(
          //~ 'id' => 'datepicker',
          //~ 'placeholder' => 'año/mes/dia',
          //~ 'class' => 'hasDatapicker'
          //~ //'data-source' => 'http://example.com/api/data'
        //~ ));

        //~ $this->widgetSchema['tiempo_est']->setAttributes(array(
           //~ 'id' => 'tiest'
        //~ ));
        //~ $this->widgetSchema['hora']->setAttributes(array(
          //~ 'id' => 'datahora',
        //~ ));

        //~ $this->widgetSchema['medico_name']->setAttributes(array(
          //~ 'planceholder' => 'Nombre del médico que programa la cirugia',
        //~ ));


        //~ $this->widgetSchema->setLabels(array(
          //~ 'paciente_name' => 'Nombre del Paciente:',
          //~ 'diagnostico'   => 'Diágnostico',
          //~ 'medico_name'   => 'Nombre del médico que programa la cirugía:',
          //~ 'hora'          => 'Hora inicial',
          //~ 'tipo_proc_id'  => 'Tipo de programación:',
          //~ 'programacion'  => 'Programación',
          //~ 'tiempo_est'    => 'Duración',
          //~ 'riesgo_qx_pre' => 'Riesgo quirurgico:',
          //~ 'req_insumos'   => 'Insumos indispensables:',
          //~ 'req_anestesico'  => 'Requerimientos de Anestesiología:',
          //~ 'req_hemoderiv'   => 'Hemoderivados Necesarios:',
          //~ 'req_laboratorio' => 'Requisitos de laboratorio:',
          //~ 'requerimiento'   => 'Otras necesidades:'
        //~ ));

        //$this->widgetSchema['reintervencion'] = new sfWidgetFormChoice(array(
         //  'choices' => array('0' => 'No', '1' => 'Si'),
           //'expanded' => true
        //));

        //$this->widgetSchema['protocolo'] = new sfWidgetFormChoice(array(
         //    'choices' => array('0' => 'No', '1' => 'Si'),
             //'expanded' => true
        //));


        $this->validatorSchema['diagnostico']->setOption('required',true);
        $this->validatorSchema['diagnostico']->setMessage('required','Falta diagnóstico');

        # @flag Usamos el nuevo validador 'sfValidatorTextDateTime'
        $this->validatorSchema['programacion'] = new sfValidatorTextDateTime(
          array(
          'date_order'  => 'd-m-Y',
          'required'    => true,
          ),
          array(  # @flag Array con los mensajes
          'required'    =>  'Falta la fecha',
          'invalid'     =>  'Mal formato de Fecha',
          'no_time'     =>  'Falta la hora',
          'min'         =>  'Fecha pasada',
          'max'         =>  'No se puede progrmar con mas de un mes de anticipación'
          )
        );
        # @flag Eliminamos la referencia al campo 'hora'
        //~ $this->validatorSchema['hora']->setOption('required', true); //          [DEL]
        //~ $this->validatorSchema['hora']->setMessage('required','Falta hora'); //          [DEL]

        # @flag se eliminan por que ya se configuro al inicio //          [DEL]
        //~ $this->validatorSchema['programacion']->setOption('required', true);//          [DEL]
        //~ $this->validatorSchema['programacion']->setMessage('required','Falta fecha');//          [DEL]

        $this->validatorSchema['tiempo_est']->setOption('required', true);
        $this->validatorSchema['tiempo_est']->setMessage('required','Falta duración');

        $this->validatorSchema['registro']->setOption('required', true);
        $this->validatorSchema['registro']->setMessage('required','Falta registro');

        $this->validatorSchema['tipo_proc_id']->setOption('required', true);
        $this->validatorSchema['tipo_proc_id']->setMessage('required','Falta tipo');

        $this->validatorSchema['paciente_name']->setOption('required', true);
        $this->validatorSchema['paciente_name']->setMessage('required','Falta nombre');

        $this->validatorSchema['edad']->setOption('required', true);
        $this->validatorSchema['edad']->setMessage('required','Falta edad');

        //$this->validatorSchema['medico_name']->setOption('required', true);
        //$this->validatorSchema['medico_name']->setMessage('required','Falta nombre');

        # @flag Comentamos los requerimientos que estaban marcados como indispensables          //          [DEL]
        //~ $this->validatorSchema['riesgo_qx_pre']->setOption('required', true);               //          [DEL]
        //~ $this->validatorSchema['riesgo_qx_pre']->setMessage('required','Falta riesgo');     //          [DEL]

        //~ $this->validatorSchema['req_insumos']->setOption('required', true);                 //          [DEL]
        //~ $this->validatorSchema['req_insumos']->setMessage('required','Falta insumos');      //          [DEL]

        //~ $this->validatorSchema['req_anestesico']->setOption('required', true);              //          [DEL]
        //~ $this->validatorSchema['req_anestesico']->setMessage('required','Falta anestesia'); //          [DEL]

        $this->getObject()->isNew() ? # @todo Revisar esta condicion porque no me gusta
          $this->validatorSchema['programacion']->setOption('min', strtotime('today - 1 day')):
          $this->validatorSchema['programacion']->setOption('max', strtotime('today + 30 days'));
        //~ $this->validatorSchema['programacion']->setMessage('min','Fecha pasada');
        //~ $this->validatorSchema['programacion']->setMessage('max','No se puede progrmar con mas de un mes de anticipación');

  }

 /**
  * setSalaWidget
  * Filtra las salas quirurgicas a un determinado quirofano
  * ==================================================================== */
  public function setSalaWidget($quirofano) {
    //$choices = SalaquirurgicaPeer::getSalasActivasPorQuirofano($quirofano);

    $this->setWidget('sala_id', new sfWidgetFormPropelChoice(array(
      'model'     => 'Salaquirurgica',
      'criteria'  => SalaquirurgicaQuery::create()->getSalasActivasPorQuirofano($quirofano)
      ))
    );
  }

 /**
  * Render de la form
  */
  public function renderForm($num) {
    return $this->widgetSchema['Procedimientocirugia']['newProcedimientocirugia'.$num];
    //return $this->widgetSchema['Procedimientocirugia'];
  }

 /**
  * setDatosPrevios
  * Llena los datos de la cirugia con datos conocidos de cirugias pasadas
  * @param:     $cx   Id de la cirugia anterior relacionada.
  * @return:    El objeto para encadenamiento
  * @autor:     Antonio Sanchez Uresti
  * @date:      2014-04-10
  */
  public function setDatosPrevios($cx)
  {
    if (!$this->cx) $this->cx = AgendaQuery::create()->findPk($cx);
    if ($this->cx) {
      if (is_object($this->cx->getPaciente())) { // llenamos los valores desde el objeto ya existente
        $this->widgetSchema['paciente_id']->setDefault($this->cx->getPaciente());
        $this->widgetSchema['paciente_name']->setDefault($this->cx->getPaciente()->getNombre());
      }
      else { // llenamos los valores de los existentes en la cirugia previa
        $this->widgetSchema['paciente_name']->setDefault($this->cx->getPacienteName());
        $this->widgetSchema['edad']->setDefault($this->cx->getEdad());
        $this->widgetSchema['genero']->setDefault($this->cx->getGenero());
        $this->widgetSchema['registro']->setDefault($this->cx->getRegistro());
      }
      $this->widgetSchema['reintervencion']->setDefault(true); // Se marca como reintervención
    }

    return $this;
  }

}
