<?php
  use_stylesheet('/css/global/styleAgenda.css');
  use_stylesheet('/css/global/facebox.css');
  use_stylesheet('/css/global/widescreen.css');
  use_javascript('/js/global/facebox.js');
  use_helper('agenda');

  $term = $sf_request->getParameter('term')
?>

<?php slot('titulo') ?>
  <title>Resultados de la búsqueda: <?php echo $term ?> | SIGA-HU </title>
<?php end_slot() ?>

<h1>Resultados de la búsqueda: <?php echo $term ?></h1>

<div id="headtable">
<a class="button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" href="<?php echo url_for('agenda/index') ?>">&nbsp;&nbsp;Lista general de quirofanos&nbsp;&nbsp;</a>
<form action="<?php echo url_for('agenda/busqueda') ?>" style="display:inline; float:right;">
  <input type="text" id="busqueda" name="term" placeholder="Buscar" value="<?php echo $term ?>" style="width:120px">
  <input type="submit" value=">>">
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
<?php slot('titulo') ?>
  <title>Sin coincidencias para  <?php echo $term ?> | SIGA-HU </title>
<?php end_slot() ?>
  <p>No se encontraron coincidencias, verifica los datos y vuelve a intentarlo </p>

<?php endif; ?>
