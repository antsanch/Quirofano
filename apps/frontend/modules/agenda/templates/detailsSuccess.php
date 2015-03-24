<?php use_helper('agenda') ?>
<?php use_stylesheet('global/styleAgenda.css') ?>

<?php slot('titulo') ?>
  <title>Detalles de la cirugia de <?php echo $cirugia->getPacienteName() ?> | SIGA-HU</title>
<?php end_slot() ?>

<h3 class="page-title">Detalles de la cirugía</h3>
<?php include_partial('qbreadcrumb', array('locacion' => 'Detalles de la cirugía')) ?>

<?php
  $avisos = generarAvisos($cirugia);
  if (count($avisos)) {
    echo "<div class='alert alert-danger'>";
    foreach($avisos as $aviso)
      echo "{$aviso}";
    echo "</div>";
  }
?>

<!-- debido al diseño de bootstrap y de la aplicación hay que agregar manualmente los links para
  las tabs utilizando javascript, esto se hace en su respectiva parcial -->

<ul id="detallesTabs" class="nav nav-tabs nav-justified">
  <li id="detallesProg-tab"><a href="#detallesProg" data-toggle="tab">Programación</a></li>
</ul>

<div class="tab-content">
<?php
  // siempre mostrar la programación de la cirugia
  include_partial("detailsProgramacion", array('cirugia' => $cirugia));
  switch ($cirugia->getStatus()) {
      // Datos a mostrar cuando la cirugia este en transoperatorio (status 10)
      case AgendaPeer::TRANSOPERATORIO_STATUS:
        include_partial("detailsTransoperatorio", array('cirugia' => $cirugia));
        break;
      // Datos a mostrar cuando la cirugia esta finalizada (status 100)
      case AgendaPeer::REALIZADA_STATUS:
        include_partial("detailsFinalizada", array('cirugia' => $cirugia));
    }
?>
</div>