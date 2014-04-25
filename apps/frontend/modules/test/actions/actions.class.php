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
}
