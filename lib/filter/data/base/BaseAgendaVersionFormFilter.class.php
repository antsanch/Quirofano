<?php

/**
 * AgendaVersion filter form base class.
 *
 * @package    Quirofano
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseAgendaVersionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'programacion'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fechaestado'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'hora'                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'retraso_inicial'       => new sfWidgetFormFilterInput(),
      'tiempo_total'          => new sfWidgetFormFilterInput(),
      'horaestado'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'inicio'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'last_time'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'ingreso'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'sala_id'               => new sfWidgetFormFilterInput(),
      'quirofano_id'          => new sfWidgetFormFilterInput(),
      'egreso'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'cie9mc'                => new sfWidgetFormFilterInput(),
      'cie9mc_id'             => new sfWidgetFormFilterInput(),
      'cx_realizada'          => new sfWidgetFormFilterInput(),
      'cx_realizada_id'       => new sfWidgetFormFilterInput(),
      'tipo_cx'               => new sfWidgetFormFilterInput(),
      'diagnostico'           => new sfWidgetFormFilterInput(),
      'diagnostico_id'        => new sfWidgetFormFilterInput(),
      'medico_name'           => new sfWidgetFormFilterInput(),
      'paciente_name'         => new sfWidgetFormFilterInput(),
      'paciente_id'           => new sfWidgetFormFilterInput(),
      'edad'                  => new sfWidgetFormFilterInput(),
      'genero'                => new sfWidgetFormFilterInput(),
      'genero_id'             => new sfWidgetFormFilterInput(),
      'registro'              => new sfWidgetFormFilterInput(),
      'servicio'              => new sfWidgetFormFilterInput(),
      'anestesia_id'          => new sfWidgetFormFilterInput(),
      'anestesia_empleada'    => new sfWidgetFormFilterInput(),
      'ev_adversos_anestesia' => new sfWidgetFormFilterInput(),
      'observaciones'         => new sfWidgetFormFilterInput(),
      'requerimiento'         => new sfWidgetFormFilterInput(),
      'req_insumos'           => new sfWidgetFormFilterInput(),
      'req_hemoderiv'         => new sfWidgetFormFilterInput(),
      'req_laboratorio'       => new sfWidgetFormFilterInput(),
      'req_anestesico'        => new sfWidgetFormFilterInput(),
      'status'                => new sfWidgetFormFilterInput(),
      'causa_diferido_id'     => new sfWidgetFormFilterInput(),
      'solicitado'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'riesgoqx_id'           => new sfWidgetFormFilterInput(),
      'contaminacionqx_id'    => new sfWidgetFormFilterInput(),
      'eventoqx_id'           => new sfWidgetFormFilterInput(),
      'complicaciones'        => new sfWidgetFormFilterInput(),
      'val_pre_anestesica'    => new sfWidgetFormFilterInput(),
      'reintervencion'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'permisos'              => new sfWidgetFormFilterInput(),
      'tipo_proc_id'          => new sfWidgetFormFilterInput(),
      'atencion_id'           => new sfWidgetFormFilterInput(),
      'tiempo_fuera'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'procedencia'           => new sfWidgetFormFilterInput(),
      'clasificacionqx'       => new sfWidgetFormFilterInput(),
      'region_px'             => new sfWidgetFormFilterInput(),
      'extension_px'          => new sfWidgetFormFilterInput(),
      'anexo_detalle'         => new sfWidgetFormFilterInput(),
      'destino_px'            => new sfWidgetFormFilterInput(),
      'liberacion_sala'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'tiempo_est'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'riesgo_qx_pre'         => new sfWidgetFormFilterInput(),
      'show_in_index'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'protocolo'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'cancelada'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'sumary'                => new sfWidgetFormFilterInput(),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'programacion'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'fechaestado'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'hora'                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'retraso_inicial'       => new sfValidatorPass(array('required' => false)),
      'tiempo_total'          => new sfValidatorPass(array('required' => false)),
      'horaestado'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'inicio'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'last_time'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'ingreso'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'sala_id'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'quirofano_id'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'egreso'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'cie9mc'                => new sfValidatorPass(array('required' => false)),
      'cie9mc_id'             => new sfValidatorPass(array('required' => false)),
      'cx_realizada'          => new sfValidatorPass(array('required' => false)),
      'cx_realizada_id'       => new sfValidatorPass(array('required' => false)),
      'tipo_cx'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'diagnostico'           => new sfValidatorPass(array('required' => false)),
      'diagnostico_id'        => new sfValidatorPass(array('required' => false)),
      'medico_name'           => new sfValidatorPass(array('required' => false)),
      'paciente_name'         => new sfValidatorPass(array('required' => false)),
      'paciente_id'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'edad'                  => new sfValidatorPass(array('required' => false)),
      'genero'                => new sfValidatorPass(array('required' => false)),
      'genero_id'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'registro'              => new sfValidatorPass(array('required' => false)),
      'servicio'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'anestesia_id'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'anestesia_empleada'    => new sfValidatorPass(array('required' => false)),
      'ev_adversos_anestesia' => new sfValidatorPass(array('required' => false)),
      'observaciones'         => new sfValidatorPass(array('required' => false)),
      'requerimiento'         => new sfValidatorPass(array('required' => false)),
      'req_insumos'           => new sfValidatorPass(array('required' => false)),
      'req_hemoderiv'         => new sfValidatorPass(array('required' => false)),
      'req_laboratorio'       => new sfValidatorPass(array('required' => false)),
      'req_anestesico'        => new sfValidatorPass(array('required' => false)),
      'status'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'causa_diferido_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'solicitado'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'riesgoqx_id'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'contaminacionqx_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'eventoqx_id'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'complicaciones'        => new sfValidatorPass(array('required' => false)),
      'val_pre_anestesica'    => new sfValidatorPass(array('required' => false)),
      'reintervencion'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'permisos'              => new sfValidatorPass(array('required' => false)),
      'tipo_proc_id'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'atencion_id'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tiempo_fuera'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'procedencia'           => new sfValidatorPass(array('required' => false)),
      'clasificacionqx'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'region_px'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'extension_px'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'anexo_detalle'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'destino_px'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'liberacion_sala'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'tiempo_est'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'riesgo_qx_pre'         => new sfValidatorPass(array('required' => false)),
      'show_in_index'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'protocolo'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'cancelada'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'sumary'                => new sfValidatorPass(array('required' => false)),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('agenda_version_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AgendaVersion';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'ForeignKey',
      'programacion'          => 'Date',
      'fechaestado'           => 'Date',
      'hora'                  => 'Date',
      'retraso_inicial'       => 'Text',
      'tiempo_total'          => 'Text',
      'horaestado'            => 'Date',
      'inicio'                => 'Date',
      'last_time'             => 'Date',
      'ingreso'               => 'Date',
      'sala_id'               => 'Number',
      'quirofano_id'          => 'Number',
      'egreso'                => 'Date',
      'cie9mc'                => 'Text',
      'cie9mc_id'             => 'Text',
      'cx_realizada'          => 'Text',
      'cx_realizada_id'       => 'Text',
      'tipo_cx'               => 'Number',
      'diagnostico'           => 'Text',
      'diagnostico_id'        => 'Text',
      'medico_name'           => 'Text',
      'paciente_name'         => 'Text',
      'paciente_id'           => 'Number',
      'edad'                  => 'Text',
      'genero'                => 'Text',
      'genero_id'             => 'Number',
      'registro'              => 'Text',
      'servicio'              => 'Number',
      'anestesia_id'          => 'Number',
      'anestesia_empleada'    => 'Text',
      'ev_adversos_anestesia' => 'Text',
      'observaciones'         => 'Text',
      'requerimiento'         => 'Text',
      'req_insumos'           => 'Text',
      'req_hemoderiv'         => 'Text',
      'req_laboratorio'       => 'Text',
      'req_anestesico'        => 'Text',
      'status'                => 'Number',
      'causa_diferido_id'     => 'Number',
      'solicitado'            => 'Boolean',
      'riesgoqx_id'           => 'Number',
      'contaminacionqx_id'    => 'Number',
      'eventoqx_id'           => 'Number',
      'complicaciones'        => 'Text',
      'val_pre_anestesica'    => 'Text',
      'reintervencion'        => 'Boolean',
      'permisos'              => 'Text',
      'tipo_proc_id'          => 'Number',
      'atencion_id'           => 'Number',
      'tiempo_fuera'          => 'Boolean',
      'procedencia'           => 'Text',
      'clasificacionqx'       => 'Number',
      'region_px'             => 'Number',
      'extension_px'          => 'Number',
      'anexo_detalle'         => 'Number',
      'destino_px'            => 'Number',
      'liberacion_sala'       => 'Date',
      'tiempo_est'            => 'Date',
      'riesgo_qx_pre'         => 'Text',
      'show_in_index'         => 'Boolean',
      'protocolo'             => 'Boolean',
      'cancelada'             => 'Boolean',
      'sumary'                => 'Text',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
      'version'               => 'Number',
    );
  }
}