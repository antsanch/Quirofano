<?php

/**
 * agenda actions.
 *
 * @package    Quirofano
 * @subpackage agenda
 * @author     Your name here
 */
class agendaActions extends sfActions
{
  /* actualiza todas las cirugias al formato actual de la base de datos */
  public function executeUpgrade() {
    $cirugias = AgendaQuery::create()->find();

    foreach ($cirugias as $cx) {
      AgendaPeer::disableVersioning();
      $cx->save();
    }
  }

  public function executeTest () {
    $param = array(
      'programacion' => '2014-04-21',
      'hora' => '07:00:00',
      'quirofano_id' => 1,
      'sala_id' => 8
    );
    $this->Quirofano = $this->getQuirofano();
    $this->date = time();
    $this->Cirugias = AgendaPeer::getCirugiasSolapadas($param);
    $this->setTemplate('show');
  }

  /*Actión para el index inicial, filtra por quirofanos activos*/
  public function executeIndex(sfWebRequest $request)
  {
    $this->Quirofanos = QuirofanoQuery::create()
      ->filterByactivo(1)
      ->filterByambulatorio(0)
      ->find();
    $quirofano_id = $request->getParameter('quirofano');
    $date = $request->getParameter('date', 'today');
  }

/*Actión para mostrar quirofanos ambulatorios y activos*/
  public function executeAmbulatorio(sfWebRequest $request)
  {
    $this->Quirofanos = QuirofanoQuery::create()
      ->filterByactivo(1)
      ->filterByambulatorio(1)
      ->find();
    $quirofano_id = $request->getParameter('quirofano');
    $date = $request->getParameter('date', 'today');
  }
/*Actión para mostrar quirofanos ambulatorios y activos*/

/*Actión para mostrar la totalidad de los quirofanos*/
 public function executeTquirofanos(sfWebRequest $request)
  {
    $this->Quirofanos = QuirofanoQuery::create()->find(); //datos para los quirofanos
    $quirofano_id = $request->getParameter('quirofano');
    $date = $request->getParameter('date', 'today');
  }
/*Actión para mostrar la totalidad de los quirofanos*/

  // Actión de prueba
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AgendaForm();
  } // Actión de prueba

  /* executeValidar Valida los datos antes de iniciar la captura de una nueva cirugia
  * @autor: Antonio Sanchez Uresti
  * @date:  2014-04-09
  */
  public function executeValidar(sfWebRequest $request)
  {
    $this->search = $request->getParameter('search');
    if ($request->getParameter('search') != null) {
      $this->cirugias = AgendaQuery::create()
        ->filterBySumary('%'.$request->getParameter('search').'%')
        ->orderByStatus('Desc')
        //->filterByStatus(array('1', '100', '-50'))
        ->joinWith('Especialidad', Criteria::LEFT_JOIN)
        ->find();
    }
  }

 /* executeReporte
  * @autor: Antonio Sanchez Uresti
  * @date:  2014-04-09
  */
  public function executeReporte(sfWebRequest $request)
  {
    //~ $this->filter = new AgendaFormFilter();
    $this->filter = new reporteForm();
    $this->cirugias = AgendaQuery::create()
      //->filterByArray(array($request->getParameters()->getArray()))
      ->find();

    //~ echo "<pre>";
    //~ //print_r (get_class_methods($request));
    //~ print_r (get_class_methods($this->filter));
    //~ print_r ($request->getGetParameters());
    //~ echo "</pre>";

  } // executeReporte


/*Actión para programar la cirugía*/
  public function executeProgramar(sfWebRequest $request)
  {
    $this->quirofano = $this->getQuirofano();     //Obtenemos el Quirofano relacionado
    $this->form = new programarCirugiaForm();      //cargamos form
    if ($request->getParameter('cx', null)) $this->form->setDatosPrevios($request->getParameter('cx'));

    if ($request->isMethod('POST')) {
      $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));

      if ($this->form->isValid()) {  //comprobamos si es valido

        /*Tomamos los valores del form enviado
        Esto nos ayudara a evaluar si se empalman con alguna cirugía
        Anteriormente programada*/

        $ide = $this->form->getValue("id");
        $horapropuesta = $this->form->getValue("hora");                               //Tomamos la hora propuesta
        $salaselecc = $this->form->getValue("sala_id");                               //la sala
        $fechaselecc['max'] = $this->form->getValue("programacion");                  //el dia actual de la programación
        $fechaselecc['min'] = date("Y-m-d",strtotime($fechaselecc['max'].' -1 day')); //Un dia antes por si la cirugía de un día antes continua actualmente
        $tiempo_est = $this->form->getValue("tiempo_est");                            //Tiempo estimado de la cirugía

        /* llamamos a la función emHoras, esta función sirve para devolver con que cirugía se empalma o regresa un NULL en caso
        de que no se empalme con niguna, se envian los parametros anteriores, al igual que el id del quirofano.
        Con respecto al NULL es para que no se empalme con sigo misma, en reprogramación se envia el id de esa programación,
        en este caso como es nuevo se va como NULL */

        $control = $this->emHoras($fechaselecc,$horapropuesta,$this->quirofano['Id'],$salaselecc,$tiempo_est,NULL);

        if ($control != NULL) {   //si es diferente a null quiere decir que se empalma con alguna programación anterior
          $text = 'Se empalma con la cirugia: '.$control;
          $this->getUser()->setFlash('notice', sprintf("$text"));
        }
        else {   // si es null lo grabamos como debe ser
          //hay que descomentar las tres lineas de abajo
          $cirugia = $this->form->save();
          //~ $cirugia->setfechaestado($fechaselecc['max'])->sethoraestado($horapropuesta)->save();   //control de fecha para cada estados
          $this->getUser()->setFlash('notice', sprintf('Programación exitosa'));
          $this->redirect('agenda/show?slug='.$request->getParameter('slug'));
        }
      }
    }

    $this->form->setSalaWidget($this->quirofano['Slug']);                                           //ponemos las salas del quirofano
    $this->form->setDefault('quirofano_id', $this->quirofano['Id']);                                //ponemos el id del quirofano
    //$request->hasParameter('sala') ? $this->form->setSalaDefault($request->getParameter('sala')): null;
  } /* Actión para programar la cirugía */


/*Función para saber si se empalma con alguna programación anterior
EL orden de los datos es de la siguiente manera:
Fecha de programacion, La hora propuesta, Id del quirofano, Id de la sala, tiempo estimado, id de la cirugia(si es nueva se pone solo
un NULL) */

public function emHoras($fechaselecc,$horapropuesta,$Quiid,$salaselecc,$tiempo_est,$identificacion)
{
     //Buscamos las posibles cirugias programadas que se pueden empalmar
    $control = NULL;
    $estados = array(
      //~ trans' => 10;
      //~ progr' => 1;
    );
    $agenda = AgendaQuery::create()                //filtramos por programaciones del dia actual y un dia anterior
      ->filterByquirofanoid($Quiid)                //en caso de que continue la cirugia al dia de hoy
      // hay que cambiar este filtro por el del nuevo campo
      //->filterByfechaestado($fechaselecc)
      ->filterBysalaid($salaselecc)
      ->filterByStatus($estados)
      ->filterByCancelada(false)
      ->find();

    //datos de la cirugia que se trata programar
    $tiempo1 = strtotime("".$fechaselecc['max']."".$horapropuesta);
    $hora1 = $this->darhora($tiempo_est);
    $tiempo2 = strtotime("".$fechaselecc['max']."".$horapropuesta."".$hora1); //final
    //datos de la cirugia que se trata programar

    foreach($agenda as $agendas):
     if($identificacion != $agendas->getId())
      {
        //$comp = $this->sumarhoras($agendas->getHora(),$agendas->getTiempoest());
        $hora1 = strtotime($agendas->getHora());
        $hora2 = strtotime($horapropuesta);
        $hora3 = strtotime($comp);

        if (strtotime($fechaselecc) > strtotime($agendas->getProgramacion())) {
          //Verificar entre dia anterior y actual en caso de que la cirugia continue
          if( $hora1 >= $hora2 && $hora2 <= $hora3)
            {
              //$control = $indentificacion;
               $control = $agendas->getId();
              //$control = strtotime($fechaselecc);
            }
        }else{
          //para el mismo dia
          if( $hora1 <= $hora2 && $hora2 <= $hora3)
          {
            // $control = $identificacion;
            //$control = strtotime($fechaselecc);
            $control = $agendas->getId();
          }
        }
     }else
     {
      $identificacion = NULL;
/*
    if($identificacion != $agendas->getId()) //verificamos si no es la misma :P
      {
          ///       datos de la cirugia ya existente
          $tiempo3 = strtotime("".$agendas->getFechaestado()."".$agendas->getHoraestado());  //tiempo inicial de la cirugía a comparar
          $hora2 = $this->darhora($agendas->getTiempoest());
          $tiempo4 = strtotime("".$agendas->getFechaestado()."".$agendas->getHoraestado()."".$hora2);
          /// datos de la cirugia ya eistente

          //comparamos si se empalman
          if($tiempo1 == $tiempo3 and $tiempo2 == $tiempo4)
          {
            $control = $agendas->getId();
          }
          elseif(($tiempo3 < $tiempo1 && $tiempo1 < $tiempo4) or ($tiempo3 < $tiempo2 && $tiempo2 < $tiempo4))
          {
            $control = $agendas->getId();
          }elseif(($tiempo1 < $tiempo3 && $tiempo3 < $tiempo2) or ($tiempo1 < $tiempo4 && $tiempo4 < $tiempo2)) {

            $control = $agendas->getId();
          }
          //comparamos si se empalman
          */
     }
     endforeach;
  return $control;
}

/*Función para saber si se empalma con alguna programación anterior
EL orden de los datos es de la siguiente manera:
Fecha de programacion, La hora propuesta, Id del quirofano, Id de la sala, tiempo estimado, id de la cirugia(si es nueva se pone solo
un NULL) */

public function darhora($hor)
{
/*
$h2h = date('H', strtotime($h2));
$h2m = date('i', strtotime($h2));
$h2s = date('s', strtotime($h2));
$hora2 =$h2h." hour ". $h2m ." min ".$h2s ." second";
$horas_sumadas= $h1." + ". $hora2;
$text=date('H:i:s', strtotime($horas_sumadas)) ;
return $text; */

  $hora = date('H', strtotime($hor));           //sumamos la horas que tardaran en finalizar la cirugía
  $minuto = date('i', strtotime($hor));
  $segundo = date('s', strtotime($hor));
  return "+".$hora." hour +". $minuto ." minutes +".$segundo ." second";
}


/*Funciones iniciales de symfony*/
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    $this->form = new AgendaForm();
    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Agenda = AgendaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Agenda, sprintf('Object Agenda does not exist (%s).', $request->getParameter('id')));
    $this->form = new AgendaForm($Agenda);
  }

 /* executeFalsoinicio
  * @autor: Antonio Sanchez Uresti
  * @date:  2014-05-27
  */
  public function executeFalsoinicio(sfWebRequest $request)
  {
    $id = $request->getParameter('id', null);
    $this->cx = isset($id) ? AgendaQuery::create()->joinWith('Personalcirugia')->findPk($id) : null;
    $this->forward404Unless($this->cx, sprintf('No existe una cirugia con id (%s).', $request->getParameter('id')));
    $this->form = new ConfirmacionFrom();
    if ($request->getMethod() == 'POST') {
      if ($request->getParameter('button', null) == 'Aceptar' && $request->getParameter('aceptacion', null) == 'on') {
        $this->cx->resetTransoperatorio()->save();
      }
      $this->redirect('agenda/show?date='.$this->cx->getProgramacion('d-m-Y'));
      //~ else ($request->getParameter('button', null) == 'Cancelar') {
        //~ $this->redirect('agenda/show?date='.$this->cx->getProgramacion('d-m-Y'));
      //~ }
    }
    $this->form->setAceptacionLabel('Selecciona esta casilla y presiona "Aceptar" para eliminar los datos mostrados y regresar esta cirugia
    al estado de programada, para regresar a la lista general sin modificar nada presiona "Cancelar"');
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Agenda = AgendaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Agenda, sprintf('Object Agenda does not exist (%s).', $request->getParameter('id')));
    $this->form = new AgendaForm($Agenda);
    $this->processForm($request, $this->form);
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Agenda = AgendaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Agenda, sprintf('Object Agenda does not exist (%s).', $request->getParameter('id')));
    $Agenda->delete();
    $this->redirect('agenda/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $programarCirugia = $form->save();
      $this->redirect('agenda/edit?id='.$programarCirugia->getId());
    }
  }
/*Funcioens iniciales de symfony*/

/*Mostramos todas las cirugías del mes actual cierto quirofano*/
public function executeTodos(sfWebRequest $request)
{
  $this->Quirofano = $this->getQuirofano();
  //$this->Quirofano = QuirofanoQuery::create()->findOneBySlug($request->getParameter('slug'));


$fechainicial = new DateTime();
$fechainicial->modify('first day of this month');
$mes['min'] =  $fechainicial->format('Y-m-d');

$fechafinal = new DateTime();
$fechafinal->modify('last day of this month');
$mes['max'] = $fechafinal->format("Y-m-d");

 $qui = $this->Quirofano['Id'];
 //$qui = $this->Quirofano->getid();
 $offset = $request->getParameter('offset', 0) * 3600;
 $this->date = strtotime($request->getParameter('date', date('Y-m-d')));
/*
 $hinicio = $request->getParameter('hora');
 $hfinal = $request->getParameter('tiempo_est');
 $date = $this->date;
 $qui = $this->Quirofano->getid();
*/

 //$hinicio = $request->getParameter('hora');
 //$hfinal = $request->getParameter('tiempo_est');
 $date = $this->date;

 $this->Cirugias = AgendaQuery::create()
      ->filterByquirofanoid($qui)
      ->filterByprogramacion($mes)
      ->orderByStatus('asc')
      ->find();
}
/*Mostramos todas las cirugías del mes actual un cierto quirofano*/

// Detalles de una cirugia
  public function executeDetails(sfWebRequest $request) {
    $this->forward404Unless($request->hasParameter('id'));
    $this->cirugia = AgendaQuery::create()
      ->joinWith('Personalcirugia', Criteria::LEFT_JOIN)
      ->findPk($request->getParameter('id'));

    $this->forward404Unless($this->cirugia, sprintf('No existe una cirugia con ese id: (%s).', $request->getParameter('id')));
  } // Detalles de una cirugia

// Mostramos la agenda para el dia actual
  public function executeShow(sfWebRequest $request)
  {
    $this->action = $this->getActionName();
    $this->Quirofano = $this->getQuirofano();
    $this->date = strtotime($request->getParameter('date', date('Y-m-d')));

    $this->Cirugias = AgendaQuery::create()
      ->filterByquirofanoid($this->Quirofano['Id'])
      ->filterByLastTime(array('min' => $this->date, 'max' => strtotime(date('Y-m-d', $this->date).'+ 1 day')))
      ->orderByStatus('asc')
      ->orderBySalaId('asc')
      //~ Joins para minimizar las busquedas
      ->joinWith('Personalcirugia', Criteria::LEFT_JOIN)
      ->joinWith('Salaquirurgica', Criteria::LEFT_JOIN)
      ->joinWith('Procedimientocirugia', Criteria::LEFT_JOIN)
      ->joinWith('Atencion', Criteria::LEFT_JOIN)
      ->find();
  } // Mostramos la agenda para el dia actual

  public function executeClearuser(sfWebRequest $request) {
    $this->getUser()->getAttributeHolder()->clear();
  }

  private function getQuirofano()
  {
    $user = $this->getUser();
    $request = $this->getRequest();
    if ($request->getParameter('slug', null)) {
      $quirofano = QuirofanoQuery::create()->findOneBySlug($request->getParameter('slug'));
      if ($quirofano) {
        $user->setQuirofano($quirofano->toArray());
        return $quirofano->toArray();
      }
    }
    else {
      if ($this->getUser()->getQuirofano(null)) {
        return $user->getQuirofano();
      }
    }
    //~ print_r(get_class_methods($request));
    //~ die($request->getUri());
    $user->setAttribute('referer', $request->getUri(), 'options');
    $this->redirect('quirofano/select');
  }

  /*Mostrar las diferentes salas del quirofano*/
  public function executeInspeccionar(sfWebRequest $request)
  {
        $this->salas = SalaquirurgicaQuery::create()
        ->joinWith('Quirofano')
        ->useQuery('Quirofano')
          ->filterBySlug($request->getParameter('slug'))
        ->endUse()
        ->find();
  }
  /*Mostrar las diferentes salas del quirofano*/


/*Mostrar todas las cirugias diferidas de un quirofano*/
  public function executeDiferidas(sfWebRequest $request)
  {
    //~ $this->Quirofano = QuirofanoQuery::create()
        //~ ->findOneBySlug($request->getParameter('slug'));
    $this->Quirofano = $this->getQuirofano();
    $offset = $request->getParameter('offset', 0) * 3600;
    $this->date = strtotime($request->getParameter('date', date('Y-m-d')));
    /* from HEAD
    $hinicio = $request->getParameter('hora');
    $hfinal = $request->getParameter('tiempo_est');
    $date = $this->date;
    */

    //$hinicio = $request->getParameter('hora');
    //$hfinal = $request->getParameter('tiempo_est');
    $date = $this->date;
    $qui = $this->Quirofano['Id'];
    $this->Cirugias = AgendaQuery::create()
      ->filterByquirofanoid($qui)
      ->filterBystatus(-50)
      ->find();
  }
/*Mostrar todas las cirugias diferidas de un quirofano*/

/*Diferir una cirugía*/
  public function executeDiferir(sfWebRequest $request)
  {
    $this->cirugia = AgendaQuery::create()->joinWith('Quirofano')->findPk($request->getParameter('id'));
    $this->form = New diferirCirugiaForm($this->cirugia);
    if ($request->getMethod() == 'POST') {
      $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
      if ($this->form->isValid()) {
        $agenda = $this->form->save();
        //$this->cirugia->setStatus(3)->save();
        $request->hasParameter('reprogramar') ?
          $this->redirect('agenda/reprogramar?id='.$agenda->getId()) :
          $this->redirect('agenda/show?slug='.$agenda->getQuirofano()->getSlug());
      }
    }
  }
/*Diferir una cirugía*/

/* Iniciar la cirugía*/
  public function executeTransoperatorio(sfWebRequest $request)
  {
    $this->cirugia = AgendaQuery::create()->findPk($request->getParameter('id'));
    $this->form = new TransoperatorioQuirofanoForm($this->cirugia);

    //se guardara con la fecha en que se realize la cirugia
    $fechaactual = date('Y-m-d', strtotime("now"));
    $horaactual = date('H:i:s');
    if ($request->getMethod() == 'POST') {
      $this->form->setDefault('ingreso', $horaactual);
      $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
      if ($this->form->isValid()) {
        $hora = $this->form->getValue("ingreso");
        $cirugia = $this->form->save();
        $cirugia->setStatus(10)->save();
        //~ $cirugia->setfechaestado($fechaactual)->save();
        //~ $cirugia->sethoraestado($hora)->save();
        $this->redirect('agenda/show?slug='.$cirugia->getQuirofano()->getSlug());
      }
    }
    $this->form->setDefault('ingreso', $horaactual);
  }

/* iniciar cirugía */

/*Botón PO, saber si esta listo para la cirugía*/
  public function executePxsolicitado(sfWebRequest $request)
  {
    $this->forward404Unless($request->hasParameter('id'));
    $cirugia = AgendaQuery::create()->findPk($request->getParameter('id'));
    $cirugia->setSolicitado(!$cirugia->getSolicitado())->save();
    $this->redirect($request->getReferer());
  }
/*Botón PO, saber si esta listo para la cirugía*/

// Reprogramar la cirugía*/
  public function executeReprogramar(sfWebRequest $request)
  {
    $this->forward404Unless($request->hasParameter('id'));
    $agenda = AgendaQuery::create()->findPk($request->getParameter('id'));
    $Quirofano = $this->getQuirofano();
    //~ $Quirofano = QuirofanoQuery::create()->findOneById($agenda->getQuirofanoid());

    if ($agenda->estaAtrasado() && !$agenda->esDiferido()) {
      $this->getUser()->setFlash('obligar', 'Esta cirugia tiene más de 24 Horas de atraso por lo que se debe marcar como diferida y especificar
      una causa, antes de poder reprogramarse');
      $this->redirect('agenda/diferir?id='.$agenda->getId().'&reprogramar=1');
    }
    $this->form = new programarCirugiaForm($agenda);
    if ($request->getMethod() == 'POST') {
      $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
      if ($this->form->isValid()) {

             $horapropuesta = $this->form->getValue("hora");
             $salaselecc = $this->form->getValue("sala_id");
             $fechaselecc['max'] = $this->form->getValue("programacion");
             $fechaselecc['min'] = date("Y-m-d",strtotime($fechaselecc['max'].' -1 day'));
             $tiempo_est = $this->form->getValue("tiempo_est");
             $identificacion = $this->form->getValue("id");
             $control = $this->emHoras($fechaselecc,$horapropuesta,$Quirofano['Id'],$salaselecc,$tiempo_est,$identificacion);
             if ($control != NULL)
             {
                $text = 'Se empalma con la cirugia: '.$control;
                $this->getUser()->setFlash('notice', sprintf("$text"));
                //rv$this->redirect('agenda/programar?slug='.$request->getParameter('slug'));
             }else{
             //$this->form->save();
             $cirugia = $this->form->save();
             //~ $cirugia->setfechaestado($fechaselecc['max'])->save();                  //control de fecha para cada estados
             //~ $cirugia->sethoraestado($horapropuesta)->save();                        //control de fecha para cada estados
             $this->getUser()->setFlash('notice', sprintf('Programación exitosa'));
             $this->redirect('agenda/show?slug='.$request->getParameter('slug'));
         }
        //$this->form->save();
        //$this->redirect('agenda/show?slug='.$request->getParameter('slug'));
      }
    }
    //$this->form->setSalaWidget($request->getParameter('slug'));
  } // Reprogramar la cirugía

// Cancelar la cirugía
  public function executeCancelar(sfWebRequest $request)
  {
  $this->forward404unless($request->hasParameter('id'));
  $this->cirugia = AgendaQuery::create()->findPk($request->getParameter('id'));
  $this->Quirofano = QuirofanoQuery::create()
    ->findOneByid($this->cirugia->getquirofanoid());
  if ($request->getMethod() == 'POST') {
      $this->cirugia->setCancelada(true)->save();
      $this->redirect('agenda/show?slug='.$this->Quirofano->getSlug().'&date='.date('Y-m-d', strtotime("now")));
    }
  } // Cancelar la cirugía

/*Busqueda por registro*/
 public function executeBusqueda(sfWebRequest $request) {
    //$this->term = $request->getParameter('term');
    $this->cirugias = AgendaQuery::create()
      ->filterBySumary('%'.$request->getParameter('term').'%')
      ->filterByCancelada(false)
      ->orderByStatus()
      ->orderBySalaId('asc')
      ->joinWith('Atencion')
      ->joinWith('Personalcirugia')
      ->joinWith('Salaquirurgica')
      ->joinWith('Procedimientocirugia')
      ->find();
  }
/*Busqueda por registro*/


/*Mostrar la plantilla de busqueda personalizada*/
 public function executePbusqueda(sfWebrequest $request){
     return sfView::SUCCESS;
  }
/*Mostrar la plantilla de busqueda personalizada*/

/*Realizar la busqueda personalizada*/
public function executeBusquedapersonalisada(sfWebrequest $request)
{
/* HEAD
  $this->quirofano = $request->getParameter('Quirofano');
  $this->sala = $request->getParameter('Sala');
  $this->nombre = $request->getParameter('Nombre');
*/
  $this->quirofano = $request->getParameter('Quirofano');
  $this->sala = $request->getParameter('Sala');
  $this->nombre = $request->getParameter('Nombre');
  $this->año = $request->getParameter("Año");
  $this->mes = $request->getParameter("Mes");


  $fechainicial = new DateTime("01-".$this->mes."-".$this->año."");
  $fecha['min'] =  $fechainicial->format('Y-m-d');

  $fechafinal = new DateTime("01-".$this->mes."-".$this->año."");
  $fechafinal->modify('last day of this month');
  $fecha['max'] = $fechafinal->format("Y-m-d");

  $this->Quirofano = QuirofanoQuery::create()
        ->findOneByNombre("%".$this->quirofano."%");

  $this->Salas = SalaquirurgicaQuery::create()
        ->findOneByNombre("%".$this->sala."%");

/* HEAD
  $this->cirugias = AgendaQuery::create()
  ->filterByquirofanoid($this->existe($this->Quirofano))
  ->filterBysalaid($this->existe($this->Salas))
  ->filterBypacientename("%".$this->nombre."%")
======= */

  $this->cirugias = AgendaQuery::create()
  ->filterByquirofanoid($this->existe($this->Quirofano))
  ->filterBysalaid($this->existe($this->Salas))
  ->filterBypacientename("%".$this->nombre."%")
  ->filterByprogramacion($fecha)
  ->filterByCancelada(false)
  ->find();
}
/*Realiza la busqueda personalizada*/

/* HEAD
  private function existe($variable)
======= */
/*Saber si existe un quirofano o sala en caso de que no regresa 0*/
public function existe($variable)
{
  $regreso = 0;
if (count($variable) > 0)
  {
    $regreso = 0;
    if (count($variable) > 0) {
      $regreso = $variable->getId();
    }
    return $regreso;
  }
return $regreso;
}
/*Saber si existe un quirofano o sala en caso de que no regresa 0*/

/*Agregar personal a la cirugía*/
 public function executeAgregarpersonal(sfWebRequest $request)
  {
    $this->form = new PersonalcirugiaForm();
    $this->form->configureNewPersonal()
      ->setAgendaId($request->getParameter('id'));
    if ($request->getMethod() == 'POST') {
      $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
      if ($this->form->isValid()) {
        $agenda = $this->form->save();
        $this->form = new PersonalcirugiaForm();
        $this->form->configureNewPersonal()
          ->setAgendaId($request->getParameter('id'));
      }
    }
    $this->cirugia = AgendaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($this->cirugia);
  }
/*Agregar personal a la cirugía*/

/*Finalizar la cirugía*/
  public function executePostoperatorio(sfWebRequest $request)
  {
    //AgendaQuery::create()
    //  ->filterByStatus(100)
    //  ->filterByEgreso(array('min' => strtotime('now') - 86400, 'max' => strtotime('now')))
    //  ->update(array('ShowInIndex' => false));
    //   $fechaactual = date('Y-m-d', strtotime("now"));
    $cirugia = AgendaQuery::create()->findPk($request->getParameter('id'));
    $this->form = new PostoperatorioQuirofanoForm($cirugia);
    if ($request->getMethod() == 'POST') {
      $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
      if ($this->form->isValid()) {
        $agenda = $this->form->save();
        $this->redirect('agenda/show?slug='.$agenda->getQuirofano()->getSlug());
      }
    }
    $this->form->setDefault('egreso', date('H:i:s'));

  }
/*Finalizar la cirugía*/

/*Mostrar calendario*/
  public function executeCalendar(sfWebRequest $request)
  {
     return sfView::SUCCESS;

  }
/*Mostrar calendario*/

/* Mostramos todas las cirugías del mes canceladas de  un cierto quirofano*/
  public function executeCanceladas(sfWebRequest $request)
  {
    //~ $this->Quirofano = QuirofanoQuery::create()
      //~ ->findOneBySlug($request->getParameter('slug'));
    $this->Quirofano = $this->getQuirofano();

    $fechainicial = new DateTime();
    $fechainicial->modify('first day of this month');
    $mes['min'] =  $fechainicial->format('Y-m-d');

    $fechafinal = new DateTime();
    $fechafinal->modify('last day of this month');
    $mes['max'] = $fechafinal->format("Y-m-d");

    $qui = $this->Quirofano['Id'];
    $offset = $request->getParameter('offset', 0) * 3600;
    $this->date = strtotime($request->getParameter('date', date('Y-m-d')));

    //$hinicio = $request->getParameter('hora');
    //$hfinal = $request->getParameter('tiempo_est');
    $date = $this->date;

    $this->Cirugias = AgendaQuery::create()
      ->filterByquirofanoid($qui)
      ->filterByprogramacion($mes)
      ->filterByCancelada(true)
      //->orderByStatus('asc')
      ->find();
  } // Mostramos todas las cirugías del mes canceladas de un cierto quirofano



}
