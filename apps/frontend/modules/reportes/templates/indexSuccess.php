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
  <div id="reporte">
    <div class="alert alert-info">
      <p><strong>Desde <?php echo "{$fechas['desde']} hasta {$fechas['hasta']}" ?></strong></p>
    </div>
    <table class="table table-bordered text-center">
      <thead>
        <tr>
          <th class="text-center">Id</th>
          <th class="text-center">Quirofano</th>
          <th class="text-center">Sala</th>
          <th class="text-center">Médico que programa</th>
          <th class="text-center">Especialidad</th>
          <th class="text-center">Contaminacion</th>
          <th class="text-center">Procedimiento</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($cirugias as $result): ?>
          <tr>
            <td><?php echo $result->getId() ?></td>
            <td><?php echo $result->getQuirofano() ?></td>
            <td><?php echo $result->getSalaquirurgica() ?></td>
            <td><?php echo $result->getPrograma() ?></td>
            <td><?php echo $result->getEspecialidad() ?></td>
            <td><?php echo $result->getContaminacionqx() ?></td>
            <td><?php echo $result->getProcedimiento() ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
    <input type="button" class="btn btn-primary btn-block" value="Exportar" id="exportarBtn">
    <a id="downloadLink"></a>
  <?php endif; ?>
</div>

<script type="text/javascript">

  function descargarPDF(jsonData, status, jqXHR) {
    /*
       El atributo download no es compatible con varios navegadores.
       http://caniuse.com/#feat=download.
       Esto no significa que el script tronara, si no que en navegadores como
       Safari e IE habra una redirección mientras que en Chrome un cuadro de
       diálogo nos preguntara alegremente donde queremos guardar nuestro pdf.
    */
    var uri = "/reportes/descargarReporte?pdfTimestamp=" + jsonData.pdfTimestamp;
    $("#downloadLink").attr({href: uri, download: 'reporte.pdf'})[0].click();
  }

  function exportarHTML() {
    var tablaHTML = $("#reporte").html();
    $.ajax({
      type: "post",
      url: "reportes/generarReporte",
      data: ({"html": tablaHTML}),
      dataType: "json",
      success: descargarPDF
    });
  }
</script>

<script type="text/javascript">
jQuery(document).ready(function() {
  $('.datepicker').datepicker({
    format: 'dd-mm-yyyy',
    todayBtn: 'linked',
    todayHighlight: true,
  });

  $('#exportarBtn').click(function(){
    exportarHTML();
  });
});
</script>
