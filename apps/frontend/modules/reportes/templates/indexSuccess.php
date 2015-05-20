<?php slot('titulo') ?>
  <title>Reportes | SIGA-HU </title>
<?php end_slot() ?>

<h3 class="page-title">Reportes</h3>
<?php include_partial('qbreadcrumb', array('locacion' => 'Reportes')) ?>

<div class="panel-group accordion" id="acordFiltros">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#acordFiltros" href="#collapseFiltros" aria-expanded="false">
      <i class="fa fa-plus"></i>
      Filtros</a>
      </h4>
    </div>
    <div id="collapseFiltros" class="panel-collapse collapse" aria-expanded="false">
      <div class="panel-body">
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <?php include_partial('form', array('filter' => $filter)) ?>
            </div>

            <div class="col-sm-6 col-md-6">

              <div class="portlet paddingless tasks-widget">
                <div class="portlet-title">
                  <div class="caption">
                    <i class="fa fa-file"></i>Filtros guardados
                  </div>
                </div>

              <div class="portlet-body">
                <ul class="list-unstyled">
                  <?php foreach($reportes as $reporte): ?>
                    <li>
                      <a href="<?php echo url_for('reportes/stored?slug='.$reporte->getSlug()) ?>">
                        <?php echo $reporte->getNombre() ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div>
  <?php if(isset($cirugias)): ?>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Id</th>
          <th>Quirofano</th>
          <th>Sala</th>
          <th>Médico</th>
          <th>Servicio</th>
          <th>Contaminacion</th>
          <th>Procedimiento</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($cirugias as $result): ?>
          <tr>
            <td><?php echo $result->getId() ?></td>
            <td><?php echo $result->getQuirofano() ?></td>
            <td><?php echo $result->getSalaquirurgica() ?></td>
            <td><?php echo $result->getMedicoName() ?></td>
            <td><?php echo $result->getEspecialidad() ?></td>
            <td><?php echo $result->getContaminacionqx() ?></td>
            <td><?php echo $result->getProcedimiento() ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <input type="button" class="btn btn-primary btn-block" value="Exportar a PDF">
  <?php endif; ?>
</div>
