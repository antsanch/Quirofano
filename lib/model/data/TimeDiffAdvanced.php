<?php
/**
 * A sweet interval formatting, will use the two biggest interval parts.
 * On small intervals, you get minutes and seconds.
 * On big intervals, you get months and days.
 * Only the two biggest parts are used.
 *
 * @param DateTime $start
 * @param DateTime|null $end
 * @return string
 */
class TimeDiffAdvanced {
  protected $start;

  protected $end;

  protected $interval;

  protected $format;

  public function __construct($start, $end = null) {
    if (is_string($start)) $this->start = new DateTime($start);
    if (null === $end || is_string($end)) {
      $this->end = new DateTime('now');
    }
    $this->interval = $this->end->diff($this->start);
    $this->format = $this->getValues();
  }

  public function pluralize($num, $string) {
    $s = $string == 'mes' ? 'es' : 's';
    return $num > 1 ? $string.$s : $string;
  }

  public function isDelayed() {
    return $this->interval->format('%R') == '+' ? true: false;
  }

  public function getValues() {
    $format = array();
    if ($this->interval->y !== 0) $format[] = "%y ".$this->pluralize($this->interval->y, "año");
    if ($this->interval->m !== 0) $format[] = "%m ".$this->pluralize($this->interval->m, "mes");
    if ($this->interval->d !== 0) $format[] = "%d ".$this->pluralize($this->interval->d, "dia");
    if ($this->interval->h !== 0) $format[] = "%h ".$this->pluralize($this->interval->h, "hora");
    if ($this->interval->i !== 0) $format[] = "%i ".$this->pluralize($this->interval->i, "minuto");
    if ($this->interval->s !== 0) {
      if (!count($format)) {
        return "menos de 1 minuto";
      }
      else {
        $format[] = "%s ".$this->pluralize($this->interval->s, "segundo");
      }
    }

    return $format;
  }

  public function format()
  {
    if (is_array($this->format)) {
      if (count($this->format) > 1) {
        $format = array_shift($this->format)." y ".array_shift($this->format);
      }
      else {
        $format = array_pop($this->format);
      }
      return $this->interval->format($format);
    }
    elseif (is_string($this->format)) {
      return $this->format;
    }
  }
}

