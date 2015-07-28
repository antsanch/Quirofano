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

    if ($request->getParameter('save_reporte')) {
      $this->forward('reportes','save');
    }

    $this->reportes = ReporteqxQuery::create()->find();

    $this->fechas = array('desde' => $request->getParameter('agenda_filters')['programacion']['from']['date'],
                          'hasta' => $request->getParameter('agenda_filters')['programacion']['to']['date']
    );

    if ($request->getParameter('agenda_filters', null)) {
      $this->filter->bind($request->getParameter($this->filter->getName()), $request->getFiles($this->filter->getName()));
      $this->cirugias = AgendaQuery::create()
        ->filterByRequestParameters($request->getParameter('agenda_filters'))
        ->find();
    }
  }

 /**
  * @autor: Antonio Sánchez Uresti
  * @date:  2014-05-11
  */
  public function executeTest()
  {
    //~ die();
  }

 /**
  * @autor: Antonio Sánchez Uresti
  * @date:  2014-05-13
  */
  public function executeSave($request)
  {
    $this->form = new ReporteqxForm;
    $this->filter = new reporteForm;
    if ($request->getParameter('agenda_filters', null)) {
      $this->filter->bind($request->getParameter($this->filter->getName()), $request->getFiles($this->filter->getName()));

      if ($request->getParameter('reporteqx',  null)) {
        //~ $reporteform = $request->getParameter('reporteqx');
        //~ $reporteform['querystring'] = http_build_query(array('agenda_filters' => $request->getParameter('agenda_filters')));
        $request->setParameter('reporteqx', array_merge($request->getParameter('reporteqx'), array('querystring' => serialize($request->getParameter('agenda_filters')))));
        $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
        if ($this->form->isValid()) {
          $this->form->save();
        }
      }
    }
  }

 /**
  * @autor: Antonio Sánchez Uresti
  * @date:  2014-05-13
  */
  public function executeEdit($request)
  {
    $reporte = ReporteqxQuery::create()->findPk($request->getParameter('id'));
    $this->form = new ReporteqxForm($reporte);
    $this->filter = new reporteForm;
    $this->filter->setDefaults($reporte->getQuerystringArray());
    if ($request->getParameter('reporteqx',  null)) {
      $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
      if ($this->form->isValid()) {
        $this->form->save();
      }
    }
    $this->setTemplate('save');
  }


  /* functionname
  * @autor: Antonio Sánchez Uresti
  * @date:  2014-05-13
  */
  public function executeStored($request)
  {
    $query = ReporteqxQuery::create();
    if ($request->getParameter('id', null)) $query->filterById($request->getParameter('id'));
    if ($request->getParameter('slug', null)) $query->filterBySlug($request->getParameter('slug'));
    $reporte = $query->findOne();
    $this->redirect('reportes/index?'.http_build_query(array('agenda_filters' => $reporte->getQuerystringArray())));
  }

  /*
  * Executes generarReporte action
  * @autor: 
  * @date: 2015-05-25
  * @param sfRequest $request A request object
  */
  public function executeGenerarReporte($request)
  {
    require_once 'lib/vendor/sigahu_reporte/SigaReporte_include.php';
    $this->forward404Unless($request->isXmlHttpRequest());

    if ($request->getPostParameter('html')) {
      $html = $request->getPostParameter('html');
      $reporte = new SigaReporte("Reporte", "Cirugias del mes de Junio");
      $reporte->agregarSeccionHTML("Tabla de resultados", $html);
      $reporte->agregarSeccionHTML("Tabla de resultados 2", $html);
      $reporte->generarPDF();
    }

    die();
  }

  /*
  * Executes descargarReporte action
  * @autor: 
  * @date: 2015-05-25
  * @param sfRequest $request A request object
  */
  public function executeDescargarReporte($request)
  {

  }
}
