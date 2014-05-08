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
    if ($request->getParameter('agenda_filters', null)) {
      $this->filter->bind($request->getParameter($this->filter->getName()), $request->getFiles($this->filter->getName()));

    }
  }
}
