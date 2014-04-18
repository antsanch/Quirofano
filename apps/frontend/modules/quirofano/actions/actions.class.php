<?php

/**
 * quirofano actions.
 *
 * @package    Quirofano
 * @subpackage quirofano
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class quirofanoActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
 /**
  * Executes select action
  *
  * @param sfRequest $request A request object
  */
  public function executeSelect(sfWebRequest $request)
  {
    if ($request->getParameter('id', null)) {
      $quirofano = QuirofanoQuery::create()->findPk($request->getParameter('id'));
      if ($quirofano) {
        $this->getUser()->setQuirofano($quirofano->toArray());
        $referer = $this->getUser()->getAttributeHolder()->remove('referer', '@homepage', 'options');
        $this->redirect($referer);
      }
    }
    //~ $this->getUser()->setAttribute('referer', $request->getUri(), 'options');
    //~ die($this->getUser()->getAttribute('referer', 'nada', 'options'));
    $this->quirofano = QuirofanoQuery::create()
      ->filterByActivo(true)
      ->find();
  }
}
