<?php


/**
 * Retorna un renglon de la tabla de resultados, formateado de acuerdo al status de la cirugia
 */
  function renderProgramada($c) {

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
        <td nowrap>%s %s %s %s %s %s</td>
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
      link_to('[D]', 'agenda/details?id='.$c->getId(), array('title' => 'Ver detalles')),
      link_to('<div class="button"></div>', 'agenda/pxsolicitado?id='.$c->getId(), array('title' => 'Paciente en Preoperatorio')),
      link_to('<div class="modificar"></div>', 'agenda/reprogramar?id='.$c->getId(), array('title' => 'Reprogramar')),
      link_to('<div class="iniciar"></div>', 'agenda/transoperatorio?id='.$c->getId(), array('title' => 'Iniciar cirugía')),
      link_to('<div class="diferir"></div>', 'agenda/diferir?id='.$c->getId(), array('title' => 'Diferir cirugía')),
      link_to('<div class="cancelar"></div>', 'agenda/cancelar?id='.$c->getId(), array('title' => 'Cancelación'))
    );
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
        <td nowrap>%s %s %s</td>
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
      link_to('[D]', 'agenda/details?id='.$c->getId(), array('title' => 'Ver detalles')),
      link_to('<div class="realizada"></div>', 'agenda/pxsolicitado?id='.$c->getId(), array('title' => 'Paciente en Preoperatorio')),
      link_to('<div class="cambio"></div>', 'agenda/reprogramar?id='.$c->getId(), array('title' => 'Reprogramar'))
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
      link_to('[D]', 'agenda/details?id='.$c->getId(), array('title' => 'Ver detalles'))
    );
  }
