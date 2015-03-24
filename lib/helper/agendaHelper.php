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
        <th colspan="2">Iconos</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Sala</th>
        <th>Registro</th>
        <th>Paciente</th>
        <th>Diagnóstico</th>
        <th>Procedimiento / Cirugía</th>
        <th>Médico que programó</th>
        <th>Acciones</th>
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
    <tr class="{$c->getClasses()}">
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
        <td><button type="button" class="btn btn-link" data-toggle="popover" title="Procedimientos" data-content="{$procedimientos}">Procedimientos</button></td>
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

    return sprintf('
      <tr class="%s" cellspacing="0">
        <td style="width: 42px">
          <div class="icons clearfix">
            <div class="tipocx" title="%s"></div>
            <div class="convenio" title="%s"></div>
          </div>
        </td>
        <td>%s</td>
        <td nowrap>%s</td>
        <td nowrap>%s</td>
        <td nowrap>%s</td>
        <td nowrap>%s</td>
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
        <td nowrap>%s %s %s %s</td>
      </tr>',
      $c->getClasses(),
      $c->getTipoProcId(),
      $c->getatencion(),
      html_entity_decode($c->getCaratulaReloj()),
      $c->getIngreso('d-m-Y'),
      $c->getIngreso('H:i'),
      $c->getSalaquirurgica(),
      $c->getRegistro(),
      $c->getPacienteName(),
      $c->getDiagnostico(),
      html_entity_decode($c->getListaProcedimientos()),
      $c->getPrograma(),
      link_to('<div class="detalles"></div>', 'agenda/details?id='.$c->getId(), array('title' => 'Ver detalles')),
      link_to('<div class="cambio"></div>', 'agenda/agregarpersonal?id='.$c->getId(), array('title' => 'Agregar personal a la cirugia')),
      link_to('<div class="realizada"></div>', 'agenda/postoperatorio?id='.$c->getId(), array('title' => 'Terminar Cirugía')),
      link_to('[Revertir]', 'agenda/falsoinicio?id='.$c->getId(), array('title' => 'Terminar Cirugía'))
    );
  }

/**
 * Retorna un renglon de la tabla de resultados, formateado de acuerdo al status de la cirugia
 */
  function renderRealizada($c) {

    return sprintf('
      <tr class="%s" cellspacing="0">
        <td style="width: 42px">
          <div class="icons clearfix">
            <div class="tipocx" title="%s"></div>
            <div class="convenio" title="%s"></div>
          </div>
        </td>
        <td>%s</td>
        <td nowrap>%s</td>
        <td nowrap>%s</td>
        <td nowrap>%s</td>
        <td nowrap>%s</td>
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
        <td nowrap>%s</td>
      </tr>',
      $c->getClasses(),
      $c->getTipoProcId(),
      $c->getatencion(),
      html_entity_decode($c->getCaratulaReloj()),
      $c->getProgramacion('d-m-Y'),
      $c->getProgramacion('H:i'),
      $c->getSalaquirurgica(),
      $c->getRegistro(),
      $c->getPacienteName(),
      $c->getDiagnostico(),
      html_entity_decode($c->getListaProcedimientos()),
      $c->getPrograma(),
      link_to('<div class="detalles"></div>', 'agenda/details?id='.$c->getId(), array('title' => 'Ver detalles'))
    );
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