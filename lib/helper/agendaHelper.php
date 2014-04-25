<?php


/**
 * Retorna un renglon de la tabla de resultados, formateado de acuerdo al status de la cirugia
 */
  function renderProgramada($c) {

    return sprintf('
      <tr class="%s">
        <td style="width: 42px">
          <div class="icons clearfix">
            <div class="tipocx" title="%s"></div>
            <div class="convenio" title="%s"></div>
          </div>
        </td>
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
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
      //$c->getProcedimiento()
      $c->getPrograma()
    );
  }
