<?php use_stylesheet('global/styleAgenda.css') ?>
<?php use_helper('agenda') ?>
<?php $term = $sf_request->getParameter('term') ?>

<?php slot('titulo') ?>
  <title>Resultados de la búsqueda: <?php echo $term ?> | SIGA-HU </title>
<?php end_slot() ?>

<h3 class="page-title">Resultados de la búsqueda</h3>

<?php include_partial('qbreadcrumb', array('locacion' => 'Búsqueda')) ?>

<div class="row col-md-12">
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
  <?php $currentStatus = null ?>
  <table id='agenda' class="table table-hover table-striped">
    <tbody>
      <?php foreach($cirugias as $c): ?>
            <?php
            if($currentStatus != $c->getStatus()) {
              echo print_head($c->getVerboseStatus());
              $currentStatus = $c->getStatus();
            }
          ?>
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
<div class="row col-md-12">
  <div class="alert alert-danger">
    <p>No se encontraron coincidencias para <strong><?php echo $term?></strong>, verifica los datos y vuelve a intentarlo.</p>
  </div>
</div>
<?php endif; ?>
