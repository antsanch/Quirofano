<?php

class sfValidatorPropelChoiceNestedSet extends sfValidatorBase
{
    protected function configure($options = array(), $messages = array()) {
        $this->addRequiredOption('model');
        $this->addRequiredOption('node');

        $this->addMessage('node', 'A node cannot be set as a child of itself.');
    }

    public function doClean($value)
    {
      if (isset($value) && !$value) {
        unset($value);
      }
      else {
        $parent = PropelQuery::from($this->getOption('model'))->findPk($value);

        if ($this->getOption('node')->isInTree() && $this->getOption('node')->getScopeValue() == $parent->getScopeValue()) {
          if ($parent->isDescendantOf($this->getOption('node'))) {
            throw new sfValidatorError($this, 'node', array('value' => $value));
          }
        }

      return $value;
      }/**/
    }
}
