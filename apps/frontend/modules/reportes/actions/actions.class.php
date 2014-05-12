<?php

/**
 * reportes actions.
 *
 * @package    Quirofano
 * @subpackage reportes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reportesActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->filter = new reporteForm;
    $this->filter->disableLocalCSRFProtection();

    if ($request->getParameter('saved', null)) {
      $array = array(
        'agenda_filters' => array (
          'quirofano_id'        => '1',
          'sala_id'             => '',
          'programacion'        => array (
            'from'              => array ('date'  =>  '01-04-2014'),
            'to'                => array ('date'  =>  '30-04-2014'),
            ),
          'medico_name'         =>  '',
          'servicio'            =>  '2',
          'contaminacionqx_id'  =>  '',
          'tipo_proc_id'        =>  '',
          'groupBy'             =>  array(
            'sala_id'           =>  true,
            'servicio'          =>  true,
          )
        )
      );
      $this->redirect('reportes/index?'.http_build_query($array));

      //~ agenda_filters%5Bquirofano_id%5D=1&agenda_filters%5Bsala_id%5D=&agenda_filters%5Bprogramacion%5D%5Bfrom%5D%5Bdate%5D=01-04-2014&agenda_filters%5Bprogramacion%5D%5Bto%5D%5Bdate%5D=30-04-2014&agenda_filters%5Bmedico_name%5D=&agenda_filters%5Bservicio%5D=&agenda_filters%5Bcontaminacionqx_id%5D=&agenda_filters%5Btipo_proc_id%5D=&agenda_filters%5Batencion_id%5D=
    }

    if ($request->getParameter('agenda_filters', null)) {
      $this->filter->bind($request->getParameter($this->filter->getName()), $request->getFiles($this->filter->getName()));
      //~ $this->array = $request->getParameter('agenda_filters');
      $this->cirugias = AgendaQuery::create()
        ->filterByRequestParameters($request->getParameter('agenda_filters'))
        ->find();
    }


  }

  /* functionname
  * @autor: Antonio Sánchez Uresti
  * @date:  2014-05-11
  */
  public function executeTest()
  {


  }


}
