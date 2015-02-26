<?php use_stylesheet('global/styleAgenda.css')?>

<?php slot('titulo') ?>
  <title>Detalles de la cirugia de <?php echo $cirugia->getPacienteName() ?> | SIGA-HU </title>
<?php end_slot() ?>

<style>
  .detail {
    border: 1px solid black;
    margin: 0 0 5px 0;
    padding: 3px;
  }

  .terminada {
    background: lightblue;
  }

  .trans {
    background: lightred;
  }
  .label {
    font-weight: bold;
    /* border-bottom: 1px dashed darkgray; /**/
  }
  .head {
    border-bottom: 1px solid black;
    font-size: large;
    text-align: center;
    border-color: #DDD;
  }
</style>

<h3 class="page-title">Detalles de la cirugía</h3>
<?php include_partial('qbreadcrumb', array('locacion' => 'Detalles de la cirugía')) ?>

<div class="tab-content">
<?php
  switch ($cirugia->getStatus()) {
      // Datos a mostrar cuando la cirugia esta finalizada
      case AgendaPeer::REALIZADA_STATUS:
        include_partial("detailsFinalizada", array('cirugia' => $cirugia));

      // Datos a mostrar cuando la cirugia este en transoperatorio
      case AgendaPeer::TRANSOPERATORIO_STATUS:
        include_partial("detailsTransoperatorio", array('cirugia' => $cirugia));

      // Datos a mostrar cuando la cirugia esta programada o diferida
      case -50:
        // pass
      case 1:
        include_partial("detailsProgramacion", array('cirugia' => $cirugia));
  }
?>
</div>