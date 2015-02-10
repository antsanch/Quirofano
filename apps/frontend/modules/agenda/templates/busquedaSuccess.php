<?php
  /*use_stylesheet('/css/global/styleAgenda.css');
  use_stylesheet('/css/global/facebox.css');
  use_stylesheet('/css/global/widescreen.css');
  use_javascript('/js/global/facebox.js');*/
  use_helper('agenda');

  $term = $sf_request->getParameter('term')
?>

<?php slot('titulo') ?>
  <title>Resultados de la búsqueda: <?php echo $term ?> | SIGA-HU </title>
<?php end_slot() ?>

<h3 class="page-title">Resultados de la búsqueda</h3>

<ul class="page-breadcrumb breadcrumb">
    <li class="btn-group">
    </li>
    <li>
      <i class="fa fa-home"></i>
      <a href="/index.php/ ">Inicio</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li>
      <a href="/index.php/ ">Quirofanos</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li>Busqueda</li>
</ul>

<div class="row">
<form action="<?php echo url_for('agenda/busqueda') ?>" style="display:inline; float:right;">
  <div class="form-group">
        <div class="input-group">
          <div class="input-icon">
            <i class="icon-magnifier"></i>
            <input class="form-control" type="text" id="busqueda" name="term" placeholder="Nombre o Registro">
          </div>
          <span class="input-group-btn">
            <input class="btn btn-primary" type="submit" value="Buscar">
          </span>
        </div>
      </div>
</form>
</div>

<?php if( count($cirugias) > 0 ): ?>

<!-- @flag Inicio de la nueva tabla de resultados -->

<div id="camasPanel">
  <?php $currentStatus = null?>
  <table id='agenda' border="0" width="100%" cellspacing="0">
    <thead>
     <tr>
      <th colspan="2">Iconos</th>
      <th>Fecha</th>
      <th>Hora</th>
      <!-- <th>Quirofano</th> -->
      <th>Sala</th>
      <th>Registro</th>
      <th>Paciente</th>
      <th>Diagnóstico</th>
      <th>Procedimiento / Cirugía</th>
      <th>Médico que programo</th>
      <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
<?php foreach($cirugias as $c): ?>
        <?php
          switch ($c->getStatus()) {
          case AgendaPeer::DIFERIDA_STATUS:
            echo renderProgramada($c);
            break;
          case AgendaPeer::PROGRAMADA_STATUS:
            echo renderProgramada($c);
            break;
          case AgendaPeer::TRANSOPERATORIO_STATUS:
            echo renderTransoperatorio($c);
            break;
          case AgendaPeer::REALIZADA_STATUS:
            echo renderRealizada($c);
            break;
          default:
            # No default
          }
        ?>
<?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php else: ?>
<div class="row">
  <div class="alert alert-danger">
    <p>No se encontraron coincidencias para <strong><?php echo $term?></strong>, verifica los datos y vuelve a intentarlo.</p>
  </div>
</div>
<?php endif; ?>
