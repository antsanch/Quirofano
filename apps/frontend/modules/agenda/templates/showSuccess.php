<?php use_stylesheet('global/styleAgenda.css') ?>
<?php use_helper('agenda') ?>

<?php slot('titulo') ?>
  <title>Agenda de <?php echo $Quirofano['Nombre'] ?> | SIGA-HU </title>
<?php end_slot() ?>

<script type="text/javascript"> <!--Script para mostrar alertas-->
function saludo() {alert('Programación Exitosa')}
function verificar() {alert('Verificar la hora')}
</script>

<?php if ($sf_user->hasFlash('notice')): ?> <!--Mostrar alertas-->
<?php if ($sf_user->getFlash('notice') == 'Verificar la hora' ):?>

<script type="text/javascript">
function start() {verificar()}
window.onload = start;
</script>

<?php else: ?>
   <!-- <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>-->

<script type="text/javascript">
function start() {saludo()}

window.onload = start;
</script>

<?php endif; ?>
<?php endif; ?>

<h3 class="page-title">Agenda de procedimientos en <?php echo $Quirofano['Nombre'] ?></h3>
<?php include_partial('qbreadcrumb', array('locacion' => $Quirofano['Nombre'])) ?>
<?php include_partial('menuShow', array('Cirugias' => $Cirugias, 'Quirofano' => $Quirofano, "date" => $date)) ?>

<div class="table-responsive">
  <?php $currentStatus = null?>
  <table id="agenda" class="table table-hover">
    <tbody>
    <?php foreach($Cirugias as $c): ?>
    <?php
      if($currentStatus != $c->getStatus()) {
        echo print_head($c->getVerboseStatus());
        $currentStatus = $c->getStatus();
      }
    ?>
    <?php
              switch ($c->getStatus()) {
              case AgendaPeer::DIFERIDA_STATUS:
                echo renderDiferida($c);
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

<script type="text/javascript">
jQuery(document).ready(function() {
  $('[data-toggle="popover"]').popover({
    trigger: 'hover',
    html: true, 
    delay: { "show": 0, "hide": 1 },
    placement: 'auto top'
  });

  $('[data-toggle="tooltip"]').tooltip();

  $('.datepicker').datepicker({
    format: 'dd-mm-yyyy',
    todayBtn: 'linked',
    todayHighlight: true,
  });
});
</script>
