<?php use_stylesheet('global/styleAgenda.css') ?>
<?php use_helper('agenda') ?>

<h3 class="page-title">Agenda de procedimientos en <?php echo $Quirofano['Nombre'] ?></h3>
<?php include_partial('qbreadcrumb', array('locacion' => 'Cirugías canceladas')) ?>
<?php include_partial('menuShow', array('Cirugias' => $Cirugias, 'Quirofano' => $Quirofano, "date" => $date)) ?>

<!--
<table id="agenda" border="0" width="100%" cellspacing="0">

    Script para mostrar alertas
    <script type="text/javascript">
    function saludo() {alert('Programación Exitosa')}
    function verificar() {alert('Verificar la hora')}
    </script>

    Mostrar alertas
    <?php if ($sf_user->hasFlash('notice')): ?>
    <?php if ($sf_user->getFlash('notice') == 'Verificar la hora' ):?>

    <script type="text/javascript">
    function start() {verificar()}
    window.onload = start;
    </script>

    <?php else: ?>
      <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>

    <script type="text/javascript">
    function start() {saludo()}

    window.onload = start();
    </script>
    <?php endif; ?>
    <?php endif; ?>
    </table>
-->

<div class="table-responsive">
  <?php $currentStatus = null?>
  <table id="agenda" class="table table-hover">
    <tbody>
    <?php foreach($Cirugias as $c): ?>
    <?php
        echo renderCancelada($c);
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