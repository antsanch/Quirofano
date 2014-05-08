<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfWidgetFormDateTime represents a datetime widget.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfWidgetFormDateTime.class.php 30762 2010-08-25 12:33:33Z fabien $
 */
class sfWidgetFormInputTextDateTime extends sfWidgetForm
{
  /**
   * Configures the current widget.
   *
   * The attributes are passed to both the date and the time widget.
   *
   * If you want to pass HTML attributes to one of the two widget, pass an
   * attributes option to the date or time option (see below).
   *
   * Available options:
   *
   *  * date:      Options for the date widget (see sfWidgetFormDate)
   *  * time:      Options for the time widget (see sfWidgetFormTime)
   *  * with_time: Whether to include time (true by default)
   *  * format:    The format string for the date and the time widget (default to %date% %time%)
   *
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   *
   * @see sfWidgetForm
   */
  protected function configure($options = array(), $attributes = array())
  {
    $this->addOption('date_order', 'Y-m-d');
    $this->addOption('date', array());
    $this->addOption('time', array());
    $this->addOption('with_time', true);
    $this->addOption('format', '%date% %time%');
  }

  /**
   * Renders the widget.
   *
   * @param  string $name        The element name
   * @param  string $value       The date and time displayed in this widget
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
  function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $default = array('year' => null,'month' => null,'day' => null, 'hour' => null,'minute' => null,'second' => '00');

    // Convertimos el valor recibido en un timestring
    if (null != $value) {                       # @flag Si el valor es null
      if (is_array($value)) {                   # @flag Si el valor es un array
        if (isset($value['date'])) {
          if ($value['date'] != null) {
            $value = $this->getOption('with_time') ? strtotime($value['date'].' '.$value['time']) : strtotime($value['date']);
          }
          else {
            $value = null;
          }
        }
        else {
          $value += $default;
          $value = strtotime(strtr('year-month-day hour:minute:second', $value));
        }
      }
      else if (is_string($value)) {
        if (ctype_digit((string) $value)) {     # @flag Validar si el string es una marca de tiempo y tiene solo digitos
          $value = strtotime(date('Y-m-d H:i:s', (int) $value));
        }
        else {                                  # @flag Si no tiene solo digitos hay posibilidad de que sea en formato fecha 'hh:mm:ss'
          $temp = DateTime::createFromFormat('Y-m-d H:i:s', $value);
          if ($temp) {
            $value = strtotime($temp->format('Y-m-d H:i:s'));
          }
          else {
            $value = null;
          };
        }
      }
      elseif (is_numeric($value)) {
        $value = strtotime(date('Y-m-d H:i:s', $value));
      }
    }
    $date = $value ? date($this->getOption('date_order'), $value) : null;
    $time = $value ? date('H:i', $value) : null;

    // render al widget
    $dateWidget = $this->getDateWidget($attributes)->render($name."[date]", $date);
    if (!$this->getOption('with_time')) return $dateWidget;
    return strtr($this->getOption('format'), array(
      '%date%' => $dateWidget,
      '%time%' => $this->getTimeWidget($attributes)->render($name.'[time]', $time )
    ));
  }

  /**
   * Returns the date widget.
   *
   * @param  array $attributes  An array of attributes
   *
   * @return sfWidgetForm A Widget representing the date
   */
  protected function getDateWidget($attributes = array())
  {
    return new sfWidgetFormInputText($this->getOptionsFor('date'), $this->getAttributesFor('date', $attributes));
  }

  /**
   * Returns the time widget.
   *
   * @param  array $attributes  An array of attributes
   *
   * @return sfWidgetForm A Widget representing the time
   */
  protected function getTimeWidget($attributes = array())
  {
    return new sfWidgetFormInputText($this->getOptionsFor('time'), $this->getAttributesFor('time', $attributes));
  }

  /**
   * Returns an array of options for the given type.
   *
   * @param  string $type  The type (date or time)
   *
   * @return array  An array of options
   *
   * @throws InvalidArgumentException when option date|time type is not array
   */
  protected function getOptionsFor($type)
  {
    $options = $this->getOption($type);
    if (!is_array($options))
    {
      throw new InvalidArgumentException(sprintf('You must pass an array for the %s option.', $type));
    }

    // add id_format if it's not there already
    $options += array('id_format' => $this->getOption('id_format'));

    return $options;
  }

  /**
   * Returns an array of HTML attributes for the given type.
   *
   * @param  string $type        The type (date or time)
   * @param  array  $attributes  An array of attributes
   *
   * @return array  An array of HTML attributes
   */
  protected function getAttributesFor($type, $attributes)
  {
    $defaults = isset($this->attributes[$type]) ? $this->attributes[$type] : array();

    return isset($attributes[$type]) ? array_merge($defaults, $attributes[$type]) : $defaults;
  }
}
/*Expresion para eliminar los comentarios " .* \[DELETE]
"*/
