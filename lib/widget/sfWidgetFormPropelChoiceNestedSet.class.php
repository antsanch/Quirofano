<?php

class sfWidgetFormPropelChoiceNestedSet extends sfWidgetFormPropelChoice
{
/** getChoices
  * @autor: Antonio Sanchez Uresti
  * @date:  2012-03-12
  */
  public function getChoices() {
    $choices = array();
    if (false !== $this->getOption('add_empty')) {
      $choices[''] = true === $this->getOption('add_empty') ? '' : $this->getOption('add_empty');
    }

    $criteria = PropelQuery::from($this->getOption('model'));
    if ($this->getOption('criteria')) {
      $criteria->mergeWith($this->getOption('criteria'));
    }

    $this->addOption('query_methods', array_merge($this->getOption('query_methods'), array('orderByTreeScope', 'orderByBranch')));
    foreach ($this->getOption('query_methods') as $methodName => $methodParams) {
      if(is_array($methodParams)) {
        call_user_func_array(array($criteria, $methodName), $methodParams);
      }
      else {
        $criteria->$methodParams();
      }
    }

    if ($order = $this->getOption('order_by')) {
      $criteria->orderBy($order[0], $order[1]);
    }

    $objects = $criteria->find($this->getOption('connection'));

    $methodKey = $this->getOption('key_method');
    if (!method_exists($this->getOption('model'), $methodKey)) {
      throw new RuntimeException(sprintf('Class "%s" must implement a "%s" method to be rendered in a "%s" widget', $this->getOption('model'), $methodKey, __CLASS__));
    }

    $methodValue = $this->getOption('method');
    if (!method_exists($this->getOption('model'), $methodValue)) {
      throw new RuntimeException(sprintf('Class "%s" must implement a "%s" method to be rendered in a "%s" widget', $this->getOption('model'), $methodValue, __CLASS__));
    }

    foreach ($objects as $object) {
      $choices[$object->$methodKey()] = str_repeat('&nbsp;', ($object->getTreeLevel() * 2)) . $object->$methodValue();
    }

    return $choices;
  }

/* Antiguo metodo para obtener las opciones
  public function getChoices2() {
    $choices = array();

    if (false !== $this->getOption('add_empty')) {
      $choices[''] = true === $this->getOption('add_empty') ? '' : $this->getOption('add_empty');
    }

    if (null === $this->getOption('table_method')) {
      $query = null === $this->getOption('query') ? PropelQuery::from($this->getOption('model')) : $this->getOption('query');
      $query
        ->orderByTreeScope('asc')
        ->orderByTreeLeft('asc');
      $objects = $query->find();
    }
    else {
      $tableMethod = $this->getOption('table_method');
      //$results = PropelQuery::from();
    }

    $method = $this->getOption('method');
    $keyMethod = $this->getOption('key_method');

    foreach ($objects as $object) {
      $choices[$object->$keyMethod()] = str_repeat('&nbsp;', ($object->getTreeLevel() * 2)) . $object->$method();
    }

    //exit('hasta aqui llego');

    return $choices;
  } /**/

}
