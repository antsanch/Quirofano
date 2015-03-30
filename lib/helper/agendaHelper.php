<?php
/**
 * Retorna el encabezado de las tablas e imprime el status verbose al
 * que pertenecen las cirugias
 */
  function print_head($status) {
  $head = <<< HEAD
  <thead>
       <tr><td colspan='12'><h3 class='text-center'>{$status}</h3></td></tr>
       <tr>
        <th class="text-center" colspan="2">Iconos</th>
        <th class="text-center">Fecha</th>
        <th class="text-center">Hora</th>
        <th class="text-center">Sala</th>
        <th class="text-center">Registro</th>
        <th class="text-center">Paciente</th>
        <th class="text-center">Diagnóstico</th>
        <th class="text-center">Procedimiento / Cirugía</th>
        <th class="text-center"><span>Médico que programó</span></th>
        <th class="text-center">Acciones</th>
      </tr>
  </thead>
HEAD;
    return $head;
  }

  function renderProgramada($c) {
    $caratula = html_entity_decode($c->getCaratulaReloj());
    $procedimientos = html_entity_decode($c->getListaProcedimientos());
    $linkDetalles = link_to('<span class="detalles"></span>', 'agenda/details?id='.$c->getId(), array('title' => 'Ver detalles'));
    $linkPreoperatorio = link_to('<span class="button"></span>', 'agenda/pxsolicitado?id='.$c->getId(), array('title' => 'Paciente en Preoperatorio'));
    $linkReprogramar = link_to('<span class="modificar"></span>', 'agenda/reprogramar?id='.$c->getId(), array('title' => 'Reprogramar'));
    $linkIniciar = link_to('<span class="iniciar"></span>', 'agenda/transoperatorio?id='.$c->getId(), array('title' => 'Iniciar cirugía'));
    $linkDiferir = link_to('<span class="diferir"></span>', 'agenda/diferir?id='.$c->getId(), array('title' => 'Diferir cirugía'));
    $linkCancelar = link_to('<span class="cancelar"></span>', 'agenda/cancelar?id='.$c->getId(), array('title' => 'Cancelación'));

    $html = <<< HTML
    <tr class="text-center {$c->getClasses()}">
        <td width:"5%">
          <div>
            <div class="tipocx" title="{$c->getTipoProcId()}"></div>
            <div class="convenio" title="{$c->getatencion()}"></div>
          </div>
        </td>
        <td>{$caratula}</td>
        <td>{$c->getProgramacion('d-m-Y')}</td>
        <td>{$c->getProgramacion('H:i')}</td>
        <td>{$c->getSalaquirurgica()}</td>
        <td >{$c->getRegistro()}</td>
        <td><strong>{$c->getPacienteName()}<strong></td>
        <td>{$c->getDiagnostico()}</td>
        <td><a href="#" data-toggle="popover" title="Procedimientos" data-content="{$procedimientos}">Procedimientos</a></td>
        <td>{$c->getPrograma()}</td>
        <td>
          <ul>
            <li>{$linkDetalles}</li>
            <li>{$linkPreoperatorio}</li>
            <li>{$linkReprogramar}</li>
            <li>{$linkIniciar}</li>
            <li>{$linkDiferir}</li>
            <li>{$linkCancelar}</li>
          </ul>
        </td>
    </tr>
HTML;
    return $html;
}

/**
 * Retorna un renglon de la tabla de resultados, formateado de acuerdo al status de la cirugia
 */

  function renderTransoperatorio($c) {
    $caratula = html_entity_decode($c->getCaratulaReloj());
    $procedimientos = html_entity_decode($c->getListaProcedimientos());
    $linkDetalles = link_to('<span class="detalles"></span>', 'agenda/details?id='.$c->getId(), array('title' => 'Ver detalles'));
    $linkPersonal = link_to('<span class="cambio"></span>', 'agenda/agregarpersonal?id='.$c->getId(), array('title' => 'Agregar personal a la cirugia'));
    $linkTerminar = link_to('<span class="realizada"></span>', 'agenda/postoperatorio?id='.$c->getId(), array('title' => 'Terminar Cirugía'));
    $linkRevertir = link_to('[Revertir]', 'agenda/falsoinicio?id='.$c->getId(), array('title' => 'Terminar Cirugía'));

    $html = <<< HTML
    <tr class="text-center {$c->getClasses()}">
      <td width:"5%">
        <div>
          <div class="tipocx" title="{$c->getTipoProcId()}"></div>
          <div class="convenio" title="{$c->getatencion()}"></div>
        </div>
      </td>
      <td>{$caratula}</td>
      <td>{$c->getProgramacion('d-m-Y')}</td>
      <td>{$c->getProgramacion('H:i')}</td>
      <td>{$c->getSalaquirurgica()}</td>
      <td>{$c->getRegistro()}</td>
      <td><strong>{$c->getPacienteName()}</strong></td>
      <td>{$c->getDiagnostico()}</td>
      <td><a href="#" data-toggle='popover' title="Procedimientos" data-content="{$procedimientos}">Procedimientos</a></td>
      <td>{$c->getPrograma()}</td>
      <td>
        <ul>
          <li>{$linkDetalles}</li>
          <li>{$linkPersonal}</li>
          <li>{$linkTerminar}</li>
          <li>{$linkRevertir}</li>
        </ul>
      </td>
    </tr>
HTML;
  return $html;
  }

/**
 * Retorna un renglon de la tabla de resultados, formateado de acuerdo al status de la cirugia
 */
  function renderRealizada($c) {
    $caratula = html_entity_decode($c->getCaratulaReloj());
    $procedimientos = html_entity_decode($c->getListaProcedimientos());
    $linkDetalles = link_to('<span class="detalles"></span>', 'agenda/details?id='.$c->getId(), array('title' => 'Ver detalles'));

    $html = <<< HTML
    <tr class="text-center {$c->getClasses()}">
      <td width:"5%">
        <div>
          <div class="tipocx" title="{$c->getTipoProcId()}"></div>
          <div class="convenio" title="{$c->getatencion()}"></div>
        </div>
      </td>
      <td>{$caratula}</td>
      <td>{$c->getProgramacion('d-m-Y')}</td>
      <td>{$c->getProgramacion('H:i')}</td>
      <td>{$c->getSalaquirurgica()}</td>
      <td>{$c->getRegistro()}</td>
      <td><strong>{$c->getPacienteName()}</strong></td>
      <td>{$c->getDiagnostico()}</td>
      <td><a href="#" data-toggle='popover' title="Procedimientos" data-content="{$procedimientos}">Procedimientos</a></td>
      <td>{$c->getPrograma()}</td>
      <td>
        <ul>
          <li>{$linkDetalles}</li>
        </ul>
      </td>
    </tr>
HTML;
  return $html;
}

/**
 * Regresa un arreglo que contenga todos los avisos que una cirugia pueda tener
 */

  function generarAvisos($cirugia) {
    $avisos = array();
    if ($cirugia->estaSolicitado() && $cirugia->getStatus() == 1) {
      array_push($avisos, "Este paciente <strong>YA</strong> esta en preoperatorio");
    }
    if($cirugia->tieneRetraso()) {
      array_push($avisos, "Esta cirugia tiene {$cirugia->getRetrasoInicial('format')} de retraso");
    }
    if($cirugia->getStatus() == 10) {
      array_push($avisos, "Esta cirugía tiene una duracion de {$cirugia->getTiempoTotal('format')}");
    }
    return $avisos;
  } 