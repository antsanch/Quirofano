<?php



/**
 * Skeleton subclass for representing a row from the 'hc_agenda' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.4-dev on:
 *
 * Wed Nov 23 10:10:52 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model.data
 */
class Agenda extends BaseAgenda {

  protected $classes = array();

  public function __toString()
  {
    return $this->getId().' '.$this->getProgramacion('d-M-Y').' a las '.$this->getHora('h:i A');
  }

 /**
  * doSave
  * Extiende las acciones de guardado nativas de la clase
  */
  public function doSave(PropelPDO $con)
  {
    switch ($this->getStatus()) { # @flag Actualiza el campo 'last_date'
    case 1:  # Programadas
      $this->setLastTime($this->getInicioTimestamp());
      break;

    case 10:  # En proceso
      $this->setLastTime($this->getIngreso());
      $this->setRetrasoInicial($this->calculaRetrasoInicio());
      break;

    case 100: # Realizadas
      $this->setLastTime($this->getEgreso());
      $this->setTiempoTotal($this->calculaDuracion());
      break;
    }

    # @flag Se asegura de calcular el retraso inicial para todas las cirugias les falte,
    if ($this->getStatus() > 1 && $this->getRetrasoInicial() == '') {                  // Cirugias avanzadas con el campo vacio
      $this->setRetrasoInicial($this->calculaRetrasoInicio());
    }

    # @flag Unifica la fecha y hora en el campo 'Programacion'
    if (parent::getHora() && $this->getProgramacion('H:i') == '00:00') {
      $this->setProgramacion($this->getProgramacion('Y-m-d').' '.parent::getHora());
      parent::setHora(null);
    }

    # @flag Actualiza el campo 'Sumary'
    $this->setSumary(sprintf('%s | %s', $this->getRegistro(), $this->getPacienteName()));

    if (!$this->isNew()) {
      //~ die('hay que guardar el historico'); //          [DEL]
    }
    parent::doSave($con);
  } // doSave()

 /**
  * Verifica si es necesario el versionado
  * @todo Hay que definir mejor la condicion del versionado
  */
  public function isVersioningNecessary($con = null)
  {
    return $this->necesitaVersionado() && parent::isVersioningNecessary();
  }

  /* functionname
  * @autor: Antonio Sánchez Uresti
  * @date:  2014-04-28
  */
  public function necesitaVersionado()
  {
    //~ if ($this->isNew()) return false;
    if ($this->getIngreso() == null) return true;

  }


 /**
  * Retorna el atraso con el que inicio una cirugia, aun no inicia se calcula en cada llamada.
  * si ya inicio se almacena en un campo.
  *
  * @autor: Antonio Sánchez Uresti
  * @date:  2014-04-06
  */
  public function calculaRetrasoInicio() {
    switch ($this->getStatus()) {
    // Programada o diferida muestra el intervalo con el tiempo actual
      case -50:
      case 1:
        return time() > $this->getInicioTimestamp() ? time() - $this->getInicioTimestamp() : 0;

    // Transoperatorio o finalizada muestra el intervalo hasta el inicio de la cirugia
      case 10:
      case 100:
        return ($this->getIngreso('U') > $this->getInicioTimestamp()) ? $this->getIngreso('U') - $this->getInicioTimestamp() : 0;
    }
  }

 /** calculaDuracion
  * Retorna el atraso con el que inicio una cirugia, si aun no inicia se calcula en cada llamada.
  * si ya inicio se almacena en un campo.
  *
  * @autor: Antonio Sánchez Uresti
  * @date:  2014-04-06
  */
  public function calculaDuracion() {
    switch ($this->getStatus()) {
    // Programada o diferida retornan null
      case -50:
      case 1:
        return null;

    // Transoperatorio muestra el tiempo que lleva la cirugia
      case 10:
        return time() > $this->getInicioTimestamp() ? time() - $this->getInicioTimestamp() : 0;

    // Transoperatorio o finalizada muestra el intervalo hasta el inicio de la cirugia
      case 100:
        return ($this->getEgreso('U') > $this->getIngreso('U')) ? $this->getEgreso('U') - $this->getIngreso('U') : 0;
    }
  }

  public function getRetrasoInicial($format = false)
  {
    $retraso = $this->getStatus() > 1 ? parent::getRetrasoInicial() : $this->calculaRetrasoInicio();
    if (!$retraso) return 'A tiempo';
    if (true == $format) {
      $i = new TimeDiffAdvanced(date('Y-m-d H:i:s', 0), date('Y-m-d H:i:s', $retraso));
      return $i->format();
    }
    return $retraso;
  }

  public function getTiempoTotal($format = false)
  {
    $retraso = $this->getStatus() > 10 ? parent::getTiempoTotal() : $this->calculaDuracion();
    if (!$retraso) return 'A tiempo';
    if (true == $format) {
      $i = new TimeDiffAdvanced(date('Y-m-d H:i:s', 0), date('Y-m-d H:i:s', $retraso));
      return $i->format();
    }
    return $retraso;
  }

 /**
  * Retorna la hora en la que esta programada la cirugia, se necesita por el cambio de estructura
  * en la base de datos cuando se elimino el campo separado de 'Hora' y se integro al campo 'Programacion'
  * @autor: Antonio Sanchez Uresti
  * @date:  2014-04-25
  */
  public function getHora($format = 'H:i:s')
  {
    if (method_exists(get_parent_class($this), 'getHora')) {   # Si el metodo existe en el padre
      return parent::getHora() ? parent::getHora($format) : $this->getProgramacion($format);
    }
    return $this->getProgramacion($format);
  }

 /**
  * @flag getClasses: Genera classes para los renglones de la agenda principal
  */
  public function getClasses()
  {
    $status = AgendaPeer::getStatus();
    $classes = array(
      'cxrow',
      strtolower($status[$this->getStatus()]),
      $this->getTipoProcId() ? 'cxtipo_'.$this->getTipoProcId() : '',
      'convenio'.$this->getAtencionId(),
    );

    if ($this->getStatus() == AgendaPeer::PROGRAMADA_STATUS) {
      $retraso = $this->calculaRetrasoInicio();
      $classes[] = $this->estaSolicitado() ? 'solicitado' : '';

      if ($retraso > 0) {
        $classes[] = $retraso >= 86400 ? 'atrasada' : 'diferido'.$this->getTiempoDiferido(false);
      }
    }

    if ($this->getStatus() == AgendaPeer::DIFERIDA_STATUS) $classes[] = 'diferido';

    return trim(implode(' ', $classes));
  } /* getClasses */

 /* getStatusClass
  * @autor: Antonio Sanchez Uresti
  * @date:  2014-08-24
  */
  public function getStatusClass()
  {
    switch ($this->getStatus()) {
      case AgendaPeer::DIFERIDA_STATUS : return "danger";
      case AgendaPeer::PROGRAMADA_STATUS : return "warning";
      case AgendaPeer::TRANSOPERATORIO_STATUS : return "success";
      case AgendaPeer::REALIZADA_STATUS : return "active";
    }
  }

 /**
  * Regresa un string con el elemento <div> que representa la caratula del reloj con el atraso correspondiente
  * @autor: Antonio Sanchez Uresti
  * @date:  2014-04-25
  */
  public function getCaratulaReloj()
  {
    return (!$this->getCancelada()) ? sprintf ('<div class="atraso" title="%s"></div>', $this->getTiempoDiferido()) : '';
  }


  public function getQuirofanoSlug()
  {
    return $this->getQuirofano()->getSlug();
  }

  public function estaAtrasado()
  {
    //~ $time = $this->getIntervaloAtraso();
    $time = $this->calculaRetrasoInicio();  # ahora usaremos en metodo nuevo calculaRetrasoInicio

    if ($time < 0) {
      $return = false;
    }
    elseif ($time > 86400) {
      $return = true;
    }
    else {
      $return = false;
    }

    return $return;
  }

  public function tieneRetraso() {
    if ($this->getStatus() == 1) {
      $int = new TimeDiffAdvanced($this->getInicioTimestamp('Y-m-d H:i:s'));
      return $int->isDelayed() ? false : true;
    }
    return false;
  }

  public function getHoraMostrar() {
    if ($this->getStatus() >= '100') {
      return $this->getEgreso('h:i A')." [S]";
    }
    elseif ($this->getStatus() >= '10') {
      return $this->getIngreso('h:i A')." [I]";
    }
    elseif ($this->getStatus() == '-50') {
      return "Diferida";
    }
    else {
      return $this->getHora('h:i A');
    }
  }

  public function esDiferido() {
    return $this->getStatus() == '-50' ? true: false;
  }

  public function esEmpalmado()
  {
    return 0;
  }

  protected function getIntervaloAtraso() # @todo Revisar este metodo porque esta muy mal hecho
  {
    $hora = $this->getHora('H');
    $min = $this->getHora('i');
    $dia = $this->getProgramacion('d');
    $mes = $this->getProgramacion('m');
    $ano = $this->getProgramacion('y');

    return date('U') - mktime($hora, $min, 0, $mes, $dia, $ano);
  }

  public function getTiempoDiferido($useUnits = true)
  {
    # $time = $this->getIntervaloAtraso();
    $time = $this->calculaRetrasoInicio();

    if ($time > 0) {
      if ($useUnits) {
        if ($time >= 86400) {
          $time /= 86400;
          $unit = $time <= 2 ? 'Dia': 'Dias';
        }
        elseif ($time >= 3600) {
          $time /= 3600;
          $unit = $time <= 2 ? 'Hora': 'Horas';
        }
        else {
          $time /= 60;
          $unit = $time <= 2 ? 'Minuto': 'Minutos';
        }
      }
      else {
        if ($time >= 3600) {
          $time /= 3600;
        }
      }

      $time = round($time);
      return  $useUnits ? $time.' '.$unit : $time;
    }

    return 'A tiempo';
  }

  public function estaSolicitado()
  {
    return $this->getSolicitado() ? true : false;
  }

  protected $objPrograma;

  public function getMedicoPrograma()
  {
    if ($this->objPrograma == null && $this->getPersonalcirugias() != null ) {
      foreach ($this->getPersonalcirugias() as $personal) {
        if ($personal->getTipo() == 'cirujano' && $personal->getprograma() == true  && $personal->getStatus() == 0){
          $this->objPrograma = $personal;
          break;
        }
      }
    }

    return $this->objPrograma ? $this->objPrograma : new Personalcirugia();
  }

  public function getPrograma() {
    return $this->getMedicoPrograma()->getPersonalNombre();
  }

  protected $transPersonal;

  public function getPersonalTransoperatorio() {
    if ($this->transPersonal === null && $this->getPersonalcirugias() != null ) {
      $this->transPersonal = new PropelCollection();
      foreach ($this->getPersonalcirugias() as $personal ) {
        if ($personal->getTransoperatorio()) {
          $this->transPersonal->set('Personalcirugia_'.$personal->getId(), $personal);
        }

      }
    }

    return $this->transPersonal ? $this->transPersonal : null;
  }

  protected $cxInicia;

  public function getCirujanoInicial() {
    if ($this->cxInicia == null && $this->getPersonalcirugias() != null ) {
      foreach ($this->getPersonalcirugias() as $personal) {
        if ($personal->getTipo() === 'cirujano' && $personal->getInicia() == 1  && $personal->getStatus() == 0) {
          $this->cxInicia = $personal;
          break;
        }
      }
    }

    return $this->cxInicia ? $this->cxInicia : new Personalcirugia();
  }

  protected $anesInicia;

  public function getAnestesiologoInicial() {
    if ($this->anesInicia == null && $this->getPersonalcirugias() != null ) {
      foreach ($this->getPersonalcirugias() as $personal) {
        if ($personal->getTipo() == 'anestesista' && $personal->getInicia() == true && $personal->getStatus() == 0) {
          $this->anesInicia = $personal;
          break;
        }
      }
    }

    return $this->anesInicia ? $this->anesInicia : new Personalcirugia();
  }

  protected $cxSupInicia;

  public function getCirujanoSupInicial() {
    if ($this->cxSupInicia == null  && $this->getPersonalcirugias() != null ) {
      foreach ($this->getPersonalcirugias() as $personal) {
        if ($personal->getTipo() == 'cirujano' && $personal->getInicia() == true && $personal->getStatus() == 1) {
          $this->cxSupInicia = $personal;
          break;
        }
      }
    }

    return $this->cxSupInicia ? $this->cxSupInicia : new Personalcirugia() ;
  }

  protected $anesSupInicia;

  public function getAnestesiologoSupInicial() {
    if ($this->anesSupInicia == null && $this->getPersonalcirugias() != null ) {
      foreach ($this->getPersonalcirugias() as $personal) {
        if ($personal->getTipo() == 'anestesista' && $personal->getInicia() == true && $personal->getStatus() == 1) {
          $this->anesSupInicia = $personal;
          break;
        }
      }
    }

    return $this->anesSupInicia ? $this->anesSupInicia : new Personalcirugia();
  }

  protected $instrumentistaInicial;

  public function getInstrumentistaInicial() {
    if ($this->instrumentistaInicial == null && $this->getPersonalcirugias() != null ) {
      foreach ($this->getPersonalcirugias() as $personal) {
        if ($personal->getTipo() == 'enfermeria' && $personal->getInicia() == true && $personal->getStatus() == 2) {
          $this->instrumentistaInicial = $personal;
          break;
        }
      }
    }

    return $this->instrumentistaInicial ? $this->instrumentistaInicial : new Personalcirugia();
  }

  protected $circulanteInicial;

  public function getCirculanteInicial() {
    if ($this->circulanteInicial == null && $this->getPersonalcirugias() != null ) {
      foreach ($this->getPersonalcirugias() as $personal) {
        if ($personal->getTipo() == 'enfermeria' && $personal->getInicia() == true && $personal->getStatus() == 3) {
          $this->circulanteInicial = $personal;
          break;
        }
      }
    }

    return $this->circulanteInicial ? $this->circulanteInicial : new Personalcirugia();
  }

  public function getPaciente(PropelPDO $con = null)
  {
    /* Se comentan todas las lineas porque no hay tabla de pacientes disponible
     * en un futuro cuando exista se actualizara la logica del metodo */
    //~ if (parent::getPaciente()) {
      //~ return parent::getPaciente();
    //~ }
    //~ else {
      return $this->getPacienteName();
    //~ }
  }

  public function getVerboseStatus()
  {
    $status = AgendaPeer::getStatus();

    return ucfirst($status[$this->getStatus()]);
  }

  public function getempalmado()
  {
    foreach ($this as $cirugia) {
    }
    return null;
  }

  public function getInicioTimestamp($format = 'U') {
    if (parent::getHora() != '00:00:00') {
      return date($format, strtotime(sprintf('%s %s', $this->getProgramacion('Y-m-d'), $this->getHora())));
    }
    return $this->getProgramacion('U');
  }

 /**
  * @flag Retorna una lista de procedimientos
  */
  public function writeProcedimientos() {
    $result = '';  $i = 1;
    foreach ($this->getProcedimientocirugias() as $procedimiento) {
            //$result .= $i++ ? '<br/>'.$procedimiento: $procedimiento;
      $result .=  ' |||procedimiento: ' .$i++;
      $result .=' id =  '.$procedimiento->getId();
      $result .=' cie9mc = '.$procedimiento->getcie9mc();
      $result .=' region = '.$procedimiento->getregion();
      $result .=' detalles = '.$procedimiento->getdetalles();
      $result .=' Servicio = '.$procedimiento->getservicioId();
      $result .=' ||| ';

          }
    return $result;
  }

 /* resetTransoperatorio
  * Elimina los valores guardados en el transoperatorio y regresa al paciente al estado de programado
  * @autor: Antonio Sanchez Uresti
  * @date:  2014-05-27
  */
  public function resetTransoperatorio()
  {
    $this->removePersonalcirugia($this->getCirujanoInicial());
    $this->removePersonalcirugia($this->getCirujanoSupInicial());
    $this->removePersonalcirugia($this->getAnestesiologoInicial());
    $this->removePersonalcirugia($this->getAnestesiologoSupInicial());
    $this->removePersonalcirugia($this->getCirculanteInicial());
    $this->removePersonalcirugia($this->getInstrumentistaInicial());
    //~ $this->cxInicia = null;
    //~ $this->cxSupInicia = null;

    return $this
      ->setInicio(null)
      ->setRetrasoInicial(null)
      ->setTiempoFuera(null)
      ->setStatus(AgendaPeer::PROGRAMADA_STATUS)
      ;
  }


 /**
  * @flag Retorna una lista de procedimientos
  */
  public function getListaProcedimientos() {
    $lista = '<ol>';
    foreach ($this->getProcedimientocirugias() as $p) {
      $lista .= sprintf('<li>%s</li>', $p->getcie9mc() ?: 'No esta definido' );
    }
    return $lista.= '</ol>';
  }

 /* getProtocoloText
  * @autor: Antonio Sánchez Uresti
  * @date:  2014-04-05
  */
  public function getProtocoloText()
  {
    return $this->getProtocolo() ? 'Sí' : 'No';
  }

 /* getReintervencionText
  * @autor: Antonio Sánchez Uresti
  * @date:  2014-04-05
  */
  public function getReintervencionText()
  {
    return $this->getReintervencion() ? 'Sí' : 'No';
  }

  public function getTiempoFueraText()
  {
    return $this->getTiempoFuera() ? 'Sí' : 'No';
  }

  public function getReqHemoderiv()
  {
    return parent::getReqHemoderiv() ? parent::getReqHemoderiv() : null;
  }

  public function getReqLaboratorio()
  {
    return parent::getReqLaboratorio() ? parent::getReqLaboratorio() : null;
  }

  public function getRequerimiento()
  {
    return parent::getRequerimiento() ? parent::getRequerimiento() : null;
  }

  public function getProcedencia()
  {
    return parent::getProcedencia() ? parent::getProcedencia() : null;
  }

  public function getDestinoPxText() {
    $values = AgendaPeer::getDestinoPx();
    return $values[$this->getDestinoPx()];
  }

} // Agenda
