<?php

/**
 * test actions.
 *
 * @package    Quirofano
 * @subpackage test
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class testActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->widget = new sfWidgetFormInputTextDateTime(array(
    //~ $this->widget = new sfWidgetFormDate(array(
      'date_format' => 'm-d-Y',
      'default' => time(),
      'date' => array(
        'label' => 'Fecha asignada:'
      ),
      'format' => "<div>%date%</div> <div>%time%</div>",
      'time' => array(
        'label' => 'Hora propuesta:'
      )
    ),
    array(
      'date' => array(
        'data-date' => '2014-01-28'
      ),
      'time' => array (
        'data-time' => '04:15'
      )
    ));
    $this->setLayout(false);
  }

  # @flag probar el objeto agenda
  public function executeAgenda(sfWebRequest $request)
  {
    $id = $request->getParameter('id', 1);
    $this->cirugias = AgendaQuery::create()
      ->findPk($id);

    $this->setLayout(false);
  }

  /* functionname
  * @autor: Antonio Sanchez Uresti
  * @date:  2014-05-07
  */
  public function executeReporte()
  {
    //~ $this->cirugias = AgendaQuery::create()
      //~ ->setComment('Contamos las especialidades')
      //~ ->join('Especialidad', Criteria::LEFT_JOIN)
      //~ ->withColumn('Especialidad.Nombre', 'EspecialidadName')
      //~ ->filterByProgramacion(array('min' => '2014-04-01', 'max' => '2014-05-30'))
      //~ ->withColumn('count(Servicio)', 'PorEspecialidad')
      //~ ->groupBy('Servicio')
      //~ ->groupBy('SalaId')
      //~ ->find();

    $this->cirugias = AgendaQuery::create()
      //~ ->select(array('Id', 'LastTime'))
      //~ ->setComment('Contamos las especialidades')
      //~ ->join('Especialidad', Criteria::LEFT_JOIN)
      //~ ->withColumn('Especialidad.Nombre', 'EspecialidadName')
      //~ ->groupBy('Servicio')
      ->filterByProgramacion(array('min' => '2014-04-01', 'max' => '2014-05-30'))
      ->join('Salaquirurgica')
      ->withColumn('Salaquirurgica.Nombre', 'SalaName')
      ->groupBy('SalaId')
      ->withColumn('count(sala_id)', 'CountSala')
      ->useQuery('Salaquirurgica')
        ->orderById('Asc')
      ->endUse()
      ->find();
  }

}
