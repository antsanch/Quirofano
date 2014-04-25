<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfValidatorDateTime validates a date and a time. It also converts the input value to a valid date.
 *
 * @package    symfony
 * @subpackage validator
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfValidatorDateTime.class.php 5581 2007-10-18 13:56:14Z fabien $
 */
class sfValidatorTextDateTime extends sfValidatorDateTime
{
  /**
   * @see sfValidatorDate
   */
  protected function configure($options = array(), $messages = array())
  {
    $this->addMessage('no_time', 'Missing time');
    $this->addOption('date_order', 'Y-m-d');

    parent::configure($options, $messages);

    $this->setOption('with_time', true);
  }

  public function doClean($value)
  {
    if (is_array($value) && isset($value['date'])) {
      if ($this->getOption('with_time')) {                      # @flag Validar Fecha y Hora
        if (isset($value['time']) && $value['time']) {
          $temp = DateTime::createFromFormat($this->getOption('date_order').' H:i', strtr('date time', $value));
          if ($temp) { $value = strtotime($temp->format('Y-m-d H:i:s')); }
          else { throw new sfValidatorError($this, 'invalid', $value); }
        }
        else {
          throw new sfValidatorError($this, 'no_time', $value); # @flag Falta la hora
        }
      }
      else {                                                    # @flag validar solo la fecha
        $temp = DateTime::createFromFormat($this->getOption('date_order'), $value['date']);
        if ($temp) { $value = strtotime($temp->format('Y-m-d')); }
        else { throw new sfValidatorError($this, 'invalid', $value); }
      }
    }

    return parent::doClean($value);
  }
}
